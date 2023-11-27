<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel_vue</title>
    <script src="{{ asset('js/app.js')}}" defer></script>
</head>
<body>
    <div id="app">
        <App-Component :laravel-Data="{{ $data }}"></App-Component>
    </div>
</body>
</html>