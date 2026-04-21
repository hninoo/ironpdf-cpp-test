<?php

namespace App\Repositories;

use App\Entities\CardEntity;
use App\Libraries\ContentLoader;

class PageContentRepository
{
    public function __construct(private readonly ContentLoader $loader)
    {
    }

    public function loadHomeContent(string $filename = 'content.json'): array
    {
        $content = $this->loader->load($filename);

        $content['earlyAccess']['cards'] = array_map(
            static fn (array $card): CardEntity => new CardEntity($card),
            $content['earlyAccess']['cards'] ?? []
        );

        return $content;
    }
}
