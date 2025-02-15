<?php

namespace Sample\Models;

class Book
{
    public function __construct(
        private string $title,
        private string $author
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}
