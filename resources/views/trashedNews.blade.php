<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed News List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Trashed News List</h2>
  <br>          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Author</th>
        <th>Published</th>
        <th>Restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($trashednews as $news)
      <tr>
        <td>{{ $news->title }}</td>
        <td>{{ $news->content }}</td>
        <td>{{ $news->auther }}</td>
        <td>
            @if($news->published)
            Yes ✔
            @else
            No ❌
            @endif
        </td>
        <td><a href="restoreNews/{{ $news->id }}">Restore</a></td>
        <td><a href="finalDeleteOfNews/{{ $news->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>