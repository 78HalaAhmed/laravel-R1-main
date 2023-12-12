<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Detail</title>
</head>
<body>
    place title: {{ $places->title }}
    <br>
    place descrption: {{ $places->description }}
    <br>
    place priceFrom: {{ $places->priceFrom}}
    <br>
    place priceTo: {{ $places->priceTo}}
    <br>
    place image: {{  $places->image }}
</body>
</html>