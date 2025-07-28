<!DOCTYPE html>
<html>
  <body>

  <h2>Create Movie</h2>

  <form action="{{ route('movie.store') }}" method="POST">
    @csrf

    <label for="name_movie">Movie Name:</label><br>
    <input type="text" id="name_movie" name="name_movie"><br>

    <label for="genre_movie">Movie Genre:</label><br>
    <input type="text" id="genre_movie" name="genre_movie"><br>

    <label for="duration_movie">Movie Duration:</label><br>
    <input type="integer" id="duration_movie" name="duration_movie"><br>
    
    <br>

    <input type="submit" value="Create">

    <a href="{{ route('movie.index') }}">
      <button type="button">Back</button>
    </a> 
  </form> 

  </body>
</html>