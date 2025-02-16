<?php

namespace App\Models;

class CharacterType
{
    public const TYPES = [
        'male' => '男性',
        'female' => '女性'
    ];

    private string $type;

    public function __construct(string $type = 'male')
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        if (array_key_exists($type, self::TYPES)) {
            $this->type = $type;
        }
    }

    public function getTypeLabel(): string
    {
        return self::TYPES[$this->type];
    }
}
