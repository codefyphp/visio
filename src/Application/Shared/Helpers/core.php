<?php

declare(strict_types=1);

namespace Application\Shared\Helpers;

use Qubus\Exception\Data\TypeException;

use function phpb_pages;
use function Qubus\Support\Helpers\collect;

/**
 * @throws TypeException
 */
function nav_links(string $type): array
{
    $navLinks = collect(phpb_pages())
        ->where('show_in_nav', '=', 'yes')
        ->where('nav_type', '=', $type)
        ->sort(function ($item1, $item2) {
            return $item1['nav_position'] <=> $item2['nav_position'];
        });

    return $navLinks->all();
}
