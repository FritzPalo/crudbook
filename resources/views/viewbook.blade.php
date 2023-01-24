@extends('format')
@section('title', 'View')

@section('content')

    <a href="{{ route('create.view') }}">Add Books</a><br><br>
    <h1>View Book</h1>
    <table>
        
        <tr>
            <th>Title</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Show Details</th>
            
        </tr>
            
        @foreach($books as $book)
            <tr>
                <td>{{ $book->Title }}</td>
                <td><a href="{{ route('update.view', $book->id ) }}">Update</td>
                <td><a href="{{ route('delete', $book->id ) }}">Delete</a></td>
                <td> <button id="myBtn" onclick="showModal({{ $book }})">Show</button></td>

            </tr>
        @endforeach
    </table>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <div class="modal-content">
            <span onclick="closeModal()" class="close">&times;</span>
            <h1 id="title"></h1>
            <p id="description"></p>
            <p id="author"></p>
        </div>

    </div>

    <script>
        
        // When the user clicks the button, open the modal 
        function showModal(book) {
            console.log(book);
            document.getElementById("title").innerHTML = "Title: " + book.Title;
            document.getElementById("description").innerHTML = "Description: " + book.Description;
            document.getElementById("author").innerHTML = "Author: " + book.Author;
            myModal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        function closeModal() {
            myModal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == myModal) {
            myModal.style.display = "none";
        }
        }

    </script>

@endsection
