<?php
$res = '';
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];

	$url = 'http://localhost/MMADapps/insertRecord.php';
	$data = array("name" => $name, "mobile" => $mobile, "address"=>$address);

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
	//print_r($result);
	$result = json_decode($result);
	if ($result->value == 1) {
		$res = '<div class="alert alert-success">
			  <strong>Success!</strong> '.$result->success.'
			</div>';
	}
	else{
		$res = '<div class="alert alert-danger">
			  <strong>Danger!</strong> '.$result->error.'
			</div>';
	}
}
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
  <?php echo $res; ?>
  <h2>Form Details</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="name">Enter name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="number" class="form-control" name="mobile" placeholder="Enter mobile" required="">
    </div>
    <div class="form-group">
      <label for="address">Mobile:</label>
      <textarea rows="5" class="form-control" name="address" placeholder="Address..." required=""></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="submit">
    <a href="fetchAllData.php">
    	<button type="button" class="btn">All Data</button>
    </a>
  </form>
</div>
<!-- <form action="" method="post">
	<input type="text" class="form-control" name="name" placeholder="Enter name" required="">
	<input type="text" class="form-control" name="mobile" placeholder="Enter mobile" required="">
	<textarea rows="5" class="form-control" name="address" required=""></textarea>
	<input type="submit" class="btn btn-primary" name="submit">
</form> -->
</body>
</html>
