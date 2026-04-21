<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CardEntity extends Entity
{
    protected $attributes = [
        'label'    => null,
        'href'     => null,
        'status'   => null,
        'platform' => null,
    ];

    public function getStatusEnum(): ?CardStatus
    {
        return $this->status === null ? null : CardStatus::tryFrom($this->status);
    }

    public function getColumnClass(string $side = 'chip'): string
    {
        $status = $this->getStatusEnum() ?? CardStatus::COMING_SOON;

        return $side === 'body' ? $status->bodyClass() : $status->chipClass();
    }

    public function getChipModifier(): string
    {
        return ($this->getStatusEnum() ?? CardStatus::COMING_SOON)->chipModifier();
    }
}
