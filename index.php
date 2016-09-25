<?php 

$msg = '';
if(isset($_POST['name'])){
	$name = $_POST['name'];
	// Resourse address
	$url = "http://localhost/php-rest/book/$name";
    $apiKey = '32Xhsdf7asd5';
	$headers = array(
	    'Authorization: '.$apiKey
	);

	// Send request to Resourse
	$ch = curl_init($url);

    // To save response in a variable from resourse;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	// Get response to Resourse
	$response = curl_exec($ch);

	// Decode
	$result = json_decode($response);

	if($result->status == '200' and !empty($result->data))
		$msg = 'Price: $'.$result->data;
	else
		$msg = $result->status_message;
}

?>







<html>
	<body>
	  	<div align="center">
			<form action="" method="post">
				<labe><strong>Book:</strong></labe>
				<input type="text" name="name">
				<button type="submit">Get Price</button>
			</form>
			<?= $msg ?>
		</div>
	</body>
</html>