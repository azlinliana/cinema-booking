<!DOCTYPE html>
<html>
  <body>

  <h2>Edit Movie</h2>

  <form action="{{ route('movie.update', $getMovie->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name_movie">Movie Name:</label><br>
    <input type="text" id="name_movie" name="name_movie" value="{{ $getMovie->name_movie }}"><br>

    <label for="genre_movie">Movie Genre:</label><br>
    <input type="text" id="genre_movie" name="genre_movie" value="{{ $getMovie->genre_movie }}"><br>

    <label for="duration_movie">Movie Duration:</label><br>
    <input type="integer" id="duration_movie" name="duration_movie" value="{{ $getMovie->duration_movie }}"><br>
    
    <br>

    <input type="submit" value="Edit">

    <a href="{{ route('movie.index') }}">
      <button type="button">Back</button>
    </a> 
  </form> 

  </body>
</html>