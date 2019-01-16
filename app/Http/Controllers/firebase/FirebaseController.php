<?php

namespace App\Http\Controllers\firebase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Kreait\Firebase;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

// use Illuminate\Notifications\Notifiable;
use NotificationChannels\WebPush\HasPushSubscriptions;

//fcm
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class FirebaseController extends Controller
{
    use HasPushSubscriptions;

    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/kualitas-udara-firebase-adminsdk-7twd9-29417e306f.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $db = $firebase->getDatabase();

            // ----set value to firebase
            // for ($i=1; $i <= 5; $i++) { 
            //     $db->getReference('tes-firebase/user/id_'.$i)->set([
            //         'id' => $i,
            //         'nama' => 'ikhwan'.$i,
            //         'email' => 'yoga@emailcom'
            //     ]);
            // }

            $lukman = $db->getReference('subscriptions')->getSnapshot();
            $cai = $lukman->getValue();
            return $cai;
            
        return 'firebase cont';
    }

    public function send()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/kualitas-udara-firebase-adminsdk-7twd9-29417e306f.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $message = $firebase->getMessaging();

        $title = 'My Notification Title';
        $body = 'My Notification Body';

        $notification = Notification::fromArray([
            'title' => $title,
            'body' => $body
        ]);

        $notification = Notification::create($title, $body);

        $notification = Notification::create()
            ->withTitle($title)
            ->withBody($body);
        
        $message = $message->withNotification($notification);
        // $db->send($message);
    }

    public function fcm()
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('my title');
        $notificationBuilder->setBody('Hello world')
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = "fvoIRNPuarQ:APA91bGoB1cDug8Uslqi-X6emVVhusUU2-Qvy_zhBBSPoahoDQQ1CMf97brlU5M9ZCQ0u5a_30XP621yzFexrPs4qHytjVKaqdgW0hFGy9DZaSfBLejx-qWSsdv-34BpdY2LHeZ3ad63";

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        //return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

        //return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

        //return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

        // return Array (key:token, value:errror) - in production you should remove from your database the tokens
        return 'yes';
    }
}
