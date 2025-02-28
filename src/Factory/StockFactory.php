<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Stock;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Stock>
 */
final class StockFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return Stock::class;
    }

    protected function defaults(): array
    {
        return [
            'stockAvailable' => self::faker()->randomNumber(),
        ];
    }
}
