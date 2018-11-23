<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>tes</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="">
</head>
<body>
	<div>
		<h1>tes nilai sensor1</h1>
		<div>suhu : 
			<div id="suhu"></div>
		</div>

		<div>kelembapan : 
			<div id="kelembapan"></div>
		</div>

		<div>asap : 
			<div id="asap"></div>
		</div>

		<div>co : 
			<div id="co"></div>
		</div>

		<div>pm10 : 
			<div id="pm10"></div>
		</div>

		<h1>tes nilai sensor2</h1>
		<div>suhu : 
			<div id="suhu2"></div>
		</div>

		<div>kelembapan : 
			<div id="kelembapan2"></div>
		</div>

		<div>asap : 
			<div id="asap2"></div>
		</div>

		<div>co : 
			<div id="co_2"></div>
		</div>

		<div>pm10 : 
			<div id="pm10_2"></div>
		</div>
	</div>

	<script src="{{ asset('/js/app.js') }}" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript" src="{{ url('/jquery/jquery.min.js') }}"></script>
	<script>
		console.log('ha');
		$(document).ready(function () {
			function baca() {
				$.get('{{ url('node1') }}', function (val) {
					console.log(val);
					$('#suhu').html(val.suhu);
					$('#kelembapan').html(val.kelembapan);
					$('#asap').html(val.asap);
					$('#co').html(val.co);
					$('#pm10').html(val.pm10);
				});

				$.get('{{ url('node2') }}', function (val2) {
					console.log(val2);
					$('#suhu2').html(val2.suhu);
					$('#kelembapan2').html(val2.kelembapan);
					$('#asap2').html(val2.asap);
					$('#co_2').html(val2.co);
					$('#pm10_2').html(val2.pm10);
				});
			}
			setInterval(baca, 1000);
		});
	</script>

</body>
</html>