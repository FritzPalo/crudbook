@extends('format')
@section('title', 'Create')

@section('content')

    <a href="{{ route('book.view')}}">Back</a><br><br>

    <h1>Add books</h1>
    <form action="{{ route('create') }}" method="POST">
    @csrf
        <label for="Title">Title:</label><br>
        <input type="text" id="Title" name="Title"><br>
        <span>@error('Title') {{ $message }} @enderror</span>
        <label for="Description">Description:</label><br>
        <input type="text" id="Description" name="Description"><br><br>
        <span>@error('Description') {{ $message }} @enderror</span>
        <label for="Author">Author:</label><br>
        <input type="text" id="Author" name="Author"><br><br>
        <span>@error('Author') {{ $message }} @enderror</span>
        <input type="submit" value="Create">
    </form> 

@endsection