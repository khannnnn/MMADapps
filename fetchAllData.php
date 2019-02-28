<?php
require 'control.php';
$obj = new Control();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1>All Table Data</h1>
	<div class="well">
		<table class="table table-hover">
			<thead>
				<tr>
					<td>Name</td>
					<td>Mobile</td>
					<td>Address</td>
				</tr>
			</thead>
			<tbody>
				<?php
				$url = 'http://localhost/MMADapps/getRecord.php';
				$data = array();

				$postdata = json_encode($data);
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				$result = curl_exec($ch);
				curl_close($ch);
				$data = json_decode($result);

				foreach ($data as $value) {
					?>
					<tr>
						<td><?php echo $value->name; ?></td>
						<td><?php echo $value->mobile; ?></td>
						<td><?php echo $value->address; ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>