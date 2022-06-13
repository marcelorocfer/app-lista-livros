<?php

namespace App\Http\Services;

use App\Repositories\BookRepositoryEloquent;

class BookServices
{
    protected $bookRepository;

    public function __construct(BookRepositoryEloquent $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks()
    {
        $this->bookRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $books = $this->bookRepository->paginate(10);
    }

    public function storeBook(array $book)
    {
        return $this->bookRepository->create($book);
    }

    public function getProductById(int $id)
    {
        return $this->bookRepository->find($id);
    }

    public function updateBook(array $book, $id)
    {
        return $this->bookRepository->update($book, $id);
    }

    public function destroyBook(int $id)
    {
        $this->bookRepository->delete($id);
    }
}

