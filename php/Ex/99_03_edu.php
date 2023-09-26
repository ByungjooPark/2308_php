<?php
	// print_r($_SERVER);
	print_r($_GET);
	print_r($_POST);
	$name = "php에서 선언";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="/99_03_edu.php" method="post">
		<label for="id">ID : </label>
		<input type="text" name="id" id="id" minlength="6">
		<br>
		<label for="pw">PW : </label>
		<input type="password" name="pw" id="pw">
		<input type="hidden" name="name" value="<?php echo $name ?>">
		<button type="submit">post</button>
	</form>
</body>
</html>