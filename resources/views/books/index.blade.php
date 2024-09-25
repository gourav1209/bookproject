<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Book List') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('books.index') }}">
                            <div class="form-group">
                                <input type="text" name="search" placeholder="Search by title or author" value="{{ request()->search }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>

                        @if($books->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Rating</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->rating }}/5</td>
                                            <td>
                                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $books->links() }}
                        @else
                            <p>No books found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>