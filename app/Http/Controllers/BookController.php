<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\BookServices;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    protected $bookServices;

    public function __construct(BookServices $bookServices)
    {
        $this->middleware('auth');
        $this->bookServices = $bookServices;
    }

    public function index()
    {
        $books = $this->bookServices->getAllBooks();

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(CreateBookRequest $request)
    {
        $this->bookServices->storeBook($request->all());

        return to_route('books.index')->with('store', 'success');
    }

    public function show($id)
    {
        return view('books.show', [
            'book' => $this->bookServices->getProductById($id),
        ]);
    }

    public function edit($id)
    {
        return view('books.edit', [
            'book' => $this->bookServices->getProductById($id),
        ]);
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $this->bookServices->updateBook($request->all(), $id);

        return to_route('books.index')->with('update', 'success');
    }

    public function destroy($id)
    {
        $this->bookServices->destroyBook($id);
        return to_route('books.index')->with('destroy', 'success');
    }
}
