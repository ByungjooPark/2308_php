<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
</head>
<body>
	<h1>HOME!!!!</h1>
	<br>
	<br>
	<form action="/home" method="POST">
		@csrf
		<button type="submit">POST</button>
	</form>
	<br>
	<br>
	<form action="/home" method="POST">
		@csrf
		@method('PUT')
		<button type="submit">PUT</button>
	</form>
	<br>
	<br>
	<form action="/home" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit">DELETE</button>
	</form>

</body>
</html>