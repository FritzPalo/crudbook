@extends('format')
@section('title', 'View')

@section('content')

    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#AddbookModal">Add book</button>
    <h1>View Book</h1>
    <div id="success_message"></div>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Show Details</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    {{-- Add Modal --}}
    <div class="modal fade" id="AddbookModal" tabindex="-1" aria-labelledby="AddbookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddbookModalLabel">Add book Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" required class="Title form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Description</label>
                        <input type="text" required class="Description form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Author</label>
                        <input type="text" required class="Author form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onClick="addButton()" class="btn btn-primary ">Save</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End Add Modal --}}

    {{-- show Modal --}}
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update book Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <label>Title</label>
                    <h3 id="showTitle"></h3>
                    <label>Description</label>
                    <h3 id="showDescription"></h3>
                    <label>Author</label>
                    <h3 id="showAuthor"></h3>

                    
                </div>

            </div>
        </div>
    </div>
    {{-- End show Modal --}}

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update book Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="update_msgList"></ul>

                    <input type="hidden" id="book_id" />

                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" id="Title" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Description</label>
                        <input type="text" id="Description" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Author</label>
                        <input type="text" id="Author" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onClick="updateButton()" class="btn btn-primary">Update</button>
                </div>

            </div>
        </div>
    </div>
    {{-- End Edit Modal --}}


    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete book Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onClick="deletedata()" class="btn btn-primary">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script>

        fetchbooks();

        function fetchbooks() {
            $.ajax({
                type: "GET",
                url: "/fetchbooks",
                dataType: "json",
                success: function (response) {
                        $('tbody').html("");
                        $.each(response.books, function (key, book) {
                            $('tbody').append( `<tr>
                                <td> ${book.Title} </td>\
                                <td><button type="button" onClick="editButton(${book.id})" class="btn btn-primary btn-sm">Edit</button></td>
                                <td><button type="button" onClick="deleteButton(${book.id})" class="btn btn-danger btn-sm">Delete</button></td>
                                <td><button type="button" onClick="showButton(${book.id})" class="btn btn-primary btn-sm">Show</button></td>
                            </tr>`);
                        });
                }
            });
        }

        function showButton(bookid){

            $.ajax({
                type: "GET",
                url: "/edit/" + bookid,
                success: function (response) {
                    if (response.status == 404) {
                        $('#editModal').modal('hide');
                    } else {
                        $('#showModal').modal('show');
                        $('#showTitle').text(response.book.Title)
                        $('#showDescription').text(response.book.Description)
                        $('#showAuthor').text(response.book.Author)
                    }
                }
            });
            $('.btn-close').find('input').val('');
        
        };

        function addButton(){

            var data = {
                'Title': $('.Title').val(),
                'Description': $('.Description').val(),
                'Author': $('.Author').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/create",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                    } else {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddbookModal').modal('hide');
                        fetchbooks();
                    }
                }
            });

        };

        function editButton(bookid){
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit/" + bookid,
                success: function (response) {
                    if (response.status == 404) {
                        $('#editModal').modal('hide');
                    } else {
                        $('#update_msgList').html("");
                        $('#update_msgList').removeClass('alert alert-danger');
                        $('#Title').val(response.book.Title);
                        $('#Description').val(response.book.Description);
                        $('#Author').val(response.book.Author);
                        $('#book_id').val(bookid);
                    }
                }
            });
            $('.btn-close').find('input').val('');
        
        };


        function updateButton() {

            var id = $('#book_id').val();
            console.log($('#book_id').val());
            var data = {
                'Title': $('#Title').val(),
                'Description': $('#Description').val(),
                'Author': $('#Author').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update/" + id,
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                    } else {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                        fetchbooks();
                    }
                }
            });

        };

        function deleteButton(bookid){
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(bookid);
        };

        function deletedata(){

            var id = $('#deleteing_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete/" + id,
                dataType: "json",
                success: function (response) {
                    if (response.status == 404) {
                        $('.delete_book').text('Yes Delete');
                    } else {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_book').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        fetchbooks();
                    }
                }
            });
        };

    </script>

@endsection
