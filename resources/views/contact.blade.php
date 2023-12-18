<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Contact us</h2>
  <form action="{{ route('contact us') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="title">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      @error('title')
      <div class='alert alert-warning'>
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="price">Your age:</label>
      <input type="number" class="form-control" id="age" placeholder="Enter age" name="age">
      @error('age')
      <div class='alert alert-warning'>
                {{ $message }}
                </div>
            @enderror
    </div>
    
    <div class="form-group">
      <label for="price">PhoneNumber:</label>
      <input type="number" class="form-control" id="PhoneNumber" placeholder="Enter PhoneNumber" name="PhoneNumber">
      @error('PhoneNumber')
      <div class='alert alert-warning'>
                {{ $message }}
                </div>
            @enderror
    </div>
    <div class="form-group">
        <label for="description">Message:</label>
        <textarea class="form-control" rows="5" id="message" name="message"></textarea>
        @error('message')
        <div class='alert alert-warning'>
          {{ $message }}
        </div>
        @enderror
      </div> 
     
      <button type="submit" class="btn btn-default">submit</button>
    </form>
</div>
</body>
</html>
