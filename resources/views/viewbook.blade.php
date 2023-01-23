@extends('format')
@section('title', 'View')

@section('content')

    <a href="{{ route('create.view') }}">Add Books</a><br><br>
    <h1>View Book</h1>
    <table>
        
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Update</th>
            <th>Delete</th>
            
        </tr>
            
        @foreach($book as $books)
            <tr>
                <td>{{ $books->Title }}</td>
                <td>{{ $books->Description }}</td>
                <td>{{ $books->Author }}</td>
                <td><a href="{{ route('update.view', $books->id ) }}">Update</td>
                <td><a href="{{ route('delete', $books->id ) }}">Delete</a></td>

            </tr>
        @endforeach
    </table>

@endsection
