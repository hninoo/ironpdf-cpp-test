<?php

namespace App\Entities;

enum CardStatus: string
{
    case RELEASED    = 'Released';
    case COMING_SOON = 'Coming Soon';

    public function chipClass(): string
    {
        return match ($this) {
            self::RELEASED    => 'col-6 col-lg-5',
            self::COMING_SOON => 'col-6 col-lg-6',
        };
    }

    public function bodyClass(): string
    {
        return match ($this) {
            self::RELEASED    => 'col-6 col-lg-7',
            self::COMING_SOON => 'col-6 col-lg-6',
        };
    }

    public function chipModifier(): string
    {
        return match ($this) {
            self::RELEASED    => 'lang-card__chip--released',
            self::COMING_SOON => 'lang-card__chip--coming-soon',
        };
    }
}
