<!DOCTYPE html>
<html lang="en">
<head>
  <title>News List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Author</th>
        <th>Published</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($showNews as $news)
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
        <td><a href="editNews/{{ $news->id }}">Edit</a></td>
        <td><a href="newsDetail/{{ $news->id }}">Show</a></td>
        <td><a href="deleteNews/{{ $news->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>