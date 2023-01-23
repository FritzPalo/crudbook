<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use Session;

class bookcontroller extends Controller
{
    public function view(){

        $book = books::all();

        return view("viewbook", compact('book'));
    }

    public function createview(){
        return view("createbook");
    }

    public function create(Request $request){
        $request->validate([
            'Title' => 'required',
            'Description' => 'required',
            'Author' => 'required'
          ]);


          $book = new books();

          $book->Title = $request->Title;
          $book->Description = $request->Description;
          $book->Author = $request->Author;

          $book->save();
    
        return redirect()->route('book.view');
    }

    public function updateview($id){

        $book = books::find($id);

        return view('updatebook', compact('book'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'Title' => 'required',
            'Description' => 'required',
            'Author' => 'required'
          ]);


          $book = books::find($id);

          $book->Title = $request->Title;
          $book->Description = $request->Description;
          $book->Author = $request->Author;

          $book->save();
    
        return redirect()->route('book.view');
        
    }

    public function delete($id)
    {
        $book = books::find($id);

        $book->delete();
    
        return redirect()->route('book.view');
    
    }


}
