<?php

namespace App\Http\Controllers\Api\Public\Bookstore;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $model = Book::class;

    public function alwaysIncludes(): array
    {
        return [
            'authors',
            'publisher',
            'bookTypes',
            'countries',
            'genres',
            'languages',
            'orders'
        ];
    }
}
