<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use Session;
use Illuminate\Support\Facades\Validator;

class bookcontroller extends Controller
{
    public function view(){

        $books = books::all();

        return view("viewbook", compact('books'));
    }

    public function fetchbooks()
    {
        $books = books::all();
        return response()->json([
            'books'=> $books
        ]);
    }

    public function show($id)
    {
        $book = books::find($id);
        if($book)
        {
            return response()->json([
                'status'=>200,
                'book'=> $book,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Book Found.'
            ]);
        }

    }

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'Title'=> 'required|max:191',
            'Description'=>'required|max:191',
            'Author'=>'required|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $book = new books;
            $book->Title = $request->input('Title');
            $book->Description = $request->input('Description');
            $book->Author = $request->input('Author');
            $book->save();
            return response()->json([
                'status'=>200,
                'message'=>'Book Added Successfully.'
            ]);
        }
    }

    public function edit($id)
    {
        $book = books::find($id);
        if($book)
        {
            return response()->json([
                'status'=>200,
                'book'=> $book,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Book Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Title'=> 'required|max:191',
            'Description'=>'required|max:191',
            'Author'=>'required|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $book = books::find($id);
            if($book)
            {
                $book->Title = $request->input('Title');
                $book->Description = $request->input('Description');
                $book->Author = $request->input('Author');
                $book->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Book Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Book Found.'
                ]);
            }

        }
    }

    public function delete($id)
    {
        $book = books::find($id);
        if($book)
        {
            $book->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Book Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Book Found.'
            ]);
        }
    }


}
