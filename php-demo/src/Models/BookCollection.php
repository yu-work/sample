<?php

namespace Sample\Models;

class BookCollection
{
    /** @var Book[] */
    private array $books = [];

    public function add(Book $book): void
    {
        $this->books[] = $book;
    }

    /** @return Book[] */
    public function getAll(): array
    {
        return $this->books;
    }
}
