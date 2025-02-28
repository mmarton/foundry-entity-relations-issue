<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Product;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Product>
 */
final class ProductFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return Product::class;
    }

    protected function defaults(): array
    {
        return $this->oneToOneBeforeOneToMany();
//        return $this->oneToOneAfterOneToMany();
    }

    /**
     * This works as the one-to-one relationship is after the one-to-many relationship.
     */
    private function oneToOneAfterOneToMany(): array
    {
        return [
            'productName' => self::faker()->text(),
            'category' => CategoryFactory::new(),
            'stock' => StockFactory::new(),
        ];
    }

    /**
     * This doesn't work
     */
    private function oneToOneBeforeOneToMany(): array
    {
        return [
            'productName' => self::faker()->text(),
            'stock' => StockFactory::new(),
            'category' => CategoryFactory::new(),
        ];
    }


}
