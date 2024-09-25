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
                    <div class="card-header">{{ __('Book Details') }}</div>

                    <div class="card-body">
                        <h2>{{ $book->title }}</h2>
                        <p>Author: {{ $book->author }}</p>
                        <p>Rating: {{ $book->rating }}/5</p>

                        <h4>Comments:</h4>

                        @if($comments->count() > 0)
                            <ul>
                                @foreach($comments as $comment)
                                    <li>
                                        {{ $comment->comment }} ({{ $comment->user->name }})
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No comments yet.</p>
                        @endif

                        @auth
                            <form method="POST" action="{{ route('comments.store') }}">
                                @csrf

                                <input type="hidden" name="book_id" value="{{ $book->id }}">

                                <div class="form-group">
                                    <label for="comment">Leave a comment:</label>
                                    <textarea name="comment" class="form-control" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Comment</button>
                            </form>
                        @endauth
                    </div>
                </div>
</body>
</html>