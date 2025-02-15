<?php

namespace App\Models;

class FirstClass
{
    private string $text;

    public function __construct(string $text = '')
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
