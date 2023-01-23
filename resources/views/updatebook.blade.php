@extends('format')
@section('title', 'Update')

@section('content')
    <a href="{{ route('book.view')}}">Back</a><br><br>

    <h1>Update Book</h1>

    <form action="{{ route('update', $book->id) }}" method="POST">
    @csrf
        <label for="Title">Title:</label><br>
        <input type="text" id="Title" name="Title" value="{{ $book->Title }}"><br>
        <span>@error('Title') {{ $message }} @enderror</span>
        <label for="Description">Description:</label><br>
        <input type="text" id="Description" name="Description" value="{{ $book->Description }}"><br><br>
        <span>@error('Description') {{ $message }} @enderror</span>
        <label for="Author">Author:</label><br>
        <input type="text" id="Author" name="Author" value="{{ $book->Author }}"><br><br>
        <span>@error('Author') {{ $message }} @enderror</span>
        <input type="submit" value="Update">
    </form> 
@endsection
