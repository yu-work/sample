<?php

namespace App\Models;

class Character
{
    public const EMOTIONS = [
        'joy' => '喜',
        'anger' => '怒',
        'sorrow' => '哀',
        'pleasure' => '楽'
    ];

    private string $emotion;

    public function __construct(string $emotion = 'joy')
    {
        $this->emotion = $emotion;
    }

    public function getEmotion(): string
    {
        return $this->emotion;
    }

    public function setEmotion(string $emotion): void
    {
        if (array_key_exists($emotion, self::EMOTIONS)) {
            $this->emotion = $emotion;
        }
    }

    public function getEmotionLabel(): string
    {
        return self::EMOTIONS[$this->emotion];
    }
}
