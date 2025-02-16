<?php

namespace App\Models;

class Scene
{
    public const TYPES = [
        'indoor' => '屋内',
        'outdoor' => '屋外'
    ];

    private string $type;

    public function __construct(string $type = 'indoor')
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
