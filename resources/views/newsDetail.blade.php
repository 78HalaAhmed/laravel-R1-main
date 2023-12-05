<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Detail</title>
</head>
<body>
    News title: {{ $news->title }}
    <br>
    News content: {{ $news->content }}
    <br>
    Author: {{ $news->auther }}
    <br>
    @if($news->published)
    It is published.
    @else
    It is not published.
    @endif
</body>
</html>