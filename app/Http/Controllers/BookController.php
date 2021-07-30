<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function list_book(){
//        $search = $request->get("title");
        $books = Book::all();
        return view("admin.book.books",[
            "books" => $books
        ]);
    }

    public function create_book(){
        return view("admin.book.create_book");
    }
    public function save_book(Request $request){
        try{
            Book::create([
                "author_id" => $request->get("author_id"),
                "title"=> $request->get("title"),
                "isbn" => $request->get("isbn"),
                "pub_year" => $request->get("pub_year"),
                "available" => $request->get("available"),
            ]);
            return redirect()->to("admin/books");
        }catch (\Exception $e){
            abort(404);
        }
    }
}
