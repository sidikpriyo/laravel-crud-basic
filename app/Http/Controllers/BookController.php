<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::with('categories')->paginate(3);
        return view('books.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::all();
        return view('books.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreBookRequest $request)
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:155|min:5',
            'total' => 'required',
            'category' => 'required',
        ]);

        $book = new Book;
        $book->name = $request->name;
        $book->total = $request->total;
        $book->save();
        $category = Categories::find($request->category);
        $book->categories()->attach($category);

        return redirect()->route('books.index')->with('message', 'success create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // return view('books.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $category = Categories::all();
        foreach ($book->categories as $key => $value) {
            $categories[] = $value->name;
        }
        return view('books.edit', [
            'data' => $book,
            'category' => $category,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'name' => 'required|string|max:155',
            'total' => 'required',
            'categories' => 'required'
        ]);
        $book->name = $request->name;
        $book->total = $request->total;
        $book->save();
        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with('message', 'success update!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        foreach ($book->categories as $key => $value) {
            $categories[] = $value->id;
        }
        $book->categories()->detach($categories);
        $book->delete();
        return redirect()->route('books.index')->with('message', 'success delete!');
    }
}
