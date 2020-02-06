<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Your Email</title>
</head>
<body>
    <a href="{{ route('mentor.confirm',['id' => $id, 'hash' => $hash]) }}">Click Here To Confirm Your Email</a>
</body>
</html>