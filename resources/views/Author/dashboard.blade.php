<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard -- Blogo</title>
</head>

<body>

    @if (session()->has('author'))
        <h1>Welcome Author</h1>
    @else
        <h1>Session Not Exist</h1>
    @endif

</body>

</html>
