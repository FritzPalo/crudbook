@extends('format')
@section('title', 'View')

@section('content')

    {{-- <a href="{{ route('create.view') }}">Add Books</a><br><br> --}}
    <button id="myBtn" onclick="addModal()">Add Books</button>
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
                <td><button id="myBtn" onclick="updateModal({{ $book }})">Update</button></td>
                <td><a href="{{ route('delete', $book->id ) }}">Delete</a></td>
                <td> <button id="myBtn" onclick="showModal({{ $book }})">Show</button></td>

            </tr>
        @endforeach
    </table>
        <div id="myModal" class="modal">

            <div class="modal-content">
                <span onclick="closeModal()" class="close">&times;</span>
                <h1 id="title"></h1>
                <p id="description"></p>
                <p id="author"></p>
            </div>

        </div>

        <div id="addBookModal" class="modal">

            <div class="modal-content">
                <span onclick="closeModal()" class="close">&times;</span>

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


            </div>

        </div>

        <div id="updateBookModal" class="modal">

            <div class="modal-content">
                <span onclick="closeModal()" class="close">&times;</span>

                <form action="{{ route('update', $book->id) }}" method="POST">
                    @csrf
                        <label for="updateTitle">Title:</label><br>
                        <input type="text" id="updateTitle" name="Title" ><br>
                        <span>@error('Title') {{ $message }} @enderror</span>
                        <label for="updateDescription">Description:</label><br>
                        <input type="text" id="updateDescription" name="Description" ><br><br>
                        <span>@error('Description') {{ $message }} @enderror</span>
                        <label for="updateAuthor">Author:</label><br>
                        <input type="text" id="updateAuthor" name="Author"><br><br>
                        <span>@error('Author') {{ $message }} @enderror</span>
                        <input type="submit" value="Update">
                    </form> 


            </div>

        </div>

    <script>
        
        function showModal(book) {
            document.getElementById("title").innerHTML = "Title: " + book.Title;
            document.getElementById("description").innerHTML = "Description: " + book.Description;
            document.getElementById("author").innerHTML = "Author: " + book.Author;
            myModal.style.display = "block";
        }

        function addModal() {
            addBookModal.style.display = "block";
        }

        function updateModal(book) {
            updateBookModal.style.display = "block";
            document.getElementById("updateTitle").value = book.Title;
            document.getElementById("updateDescription").value = book.Description;
            document.getElementById("updateAuthor").value = book.Author;
            
        }

        function closeModal() {
            myModal.style.display = "none";
            addBookModal.style.display = "none";
            updateBookModal.style.display = "none";
        }

        // window.onclick = function(event) {
        //     if (event.target == myModal || event.target == addBookModal || event.target == updateBookModal) {
        //         myModal.style.display = "none";
        //         addBookModal.style.display = "none";
        //         updateBookModal.style.display = "none";
        // }
        // }

    </script>

@endsection
