<!DOCTYPE html>
<html>
    <head>
        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>
    </head>

    <body>
        <h2>Movie List</h2>

        <a href="{{ route('movie.create') }}">
            <button type="button">Create</button>
        </a>

        <br><br>

        <form action="{{ route('movie.index') }}" method="GET">
            @csrf
            @method('POST')

            <label for="search_movie">Search Movie:</label>
            <input type="search" id="search_movie" name="search_movie" value="{{ $searchMovieInput ?? '' }}">

            <input type="submit" value="Search">
        </form>

        <br><br>

        <table>
            <tr>
                <th>No.</th>
                <th>Movie Name</th>
                <th>Movie Genre</th>
                <th>Movie Duration (Minutes)</th>
                <th>Action</th>
            </tr>

            @forelse($movies as $movie)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ $movie->name_movie }}</th>
                    <th>{{ $movie->genre_movie }}</th>
                    <th>{{ $movie->duration_movie }}</th>
                    <th>
                        <a href="{{ route('movie.show', $movie->id) }}">
                            <button type="button">View</button>
                        </a>

                        <br>

                        <a href="{{ route('movie.edit', $movie->id) }}">
                            <button type="button">Edit</button>
                        </a>

                        <br>

                        <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button 
                                type="submit" 
                                onclick="return confirm('Are you sure to delete this movie?')"
                            >
                                Delete
                            </button>
                        </form>          
                    </th>
                </tr>

            @empty
                <tr>
                    <td colspan="5">No data found for "{{ $searchMovieInput }}".</td>
                </tr>

            @endforelse
        </table>
    </body>
</html>