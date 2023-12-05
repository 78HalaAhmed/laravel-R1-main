<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Detail</title>
</head>
<body>
    Post title: {{ $post->title }}
    <br>
    Post content: {{ $post->content }}
    <br>
    @if($post->published)
        It is published.
    @else
        It is not published.
    @endif
</body>
</html>