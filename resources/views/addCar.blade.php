<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ __('messages.AddCar') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en') }}">English <span class="sr-only">(current)</span></a>
<a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">Arabic</a>
  <h2>{{ __('messages.AddCar') }}</h2>
  <form action="{{ route('carInfo') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">{{ __('messages.Title') }}</label>
      <input type="text" class="form-control" id="title" placeholder="{{ __('messages.Entertitle') }}" name="carTitle" value="{{ old('carTitle') }}">
      @error('carTitle')
      <div class='alert alert-warning'>
    
        {{ __('messages.carTitleValidate')}} 
      </div>
      @enderror
    </div>
    <div class="form-group">
        <label for="description">{{ __('messages.Description') }}</label>
        <textarea class="form-control" rows="5" id="description" name="description">{{ old('description') }}</textarea>
        @error('description')
        <div class='alert alert-warning'>
        {{ __('messages.descriptionValidate')}}
        </div>
        @enderror
      </div> 
      <div class="form-group">
            <label for="image">{{ __('messages.Image')}}</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            @error('image')
            <div class='alert alert-warning'>
            {{ __('messages.imageValidate')}}
                </div>
            @enderror
        </div>
        <div>
        <select name="category_id" id="">
              <option value="">{{ __('messages.SelectCategory')}}</option>

              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
              @endforeach
            </select>
        </div>
      <div class="checkbox">
      <label><input type="checkbox" name="published"> {{ __('messages.Published')}}</label>
      </div>
      <button type="submit" class="btn btn-default">{{ __('messages.Add')}}</button>
    </form>
</div>

</body>
</html>
