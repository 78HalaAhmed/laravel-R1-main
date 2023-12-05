<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Detail</title>
</head>
<body>
    Car title: {{ $car->carTitle }}
    <br>
    Car description: {{ $car->description }}
    <br>
    @if($car->published)
    It is published.
    @else
    It is not published.
    @endif
</body>
</html>