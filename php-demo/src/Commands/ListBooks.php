<?php

namespace Sample\Commands;

use Sample\Models\Book;
use Sample\Models\BookCollection;

class ListBooks
{
    public function execute(): void
    {
        $collection = new BookCollection();
        
        // Add sample data
        $collection->add(new Book("PHP入門", "山田太郎"));
        $collection->add(new Book("プログラミング実践", "鈴木次郎"));
        
        // Display books
        foreach ($collection->getAll() as $book) {
            echo sprintf(
                "タイトル: %s, 著者: %s\n",
                $book->getTitle(),
                $book->getAuthor()
            );
        }
    }
}
