<?php

namespace App\Tests;

use App\Entity\Product;
use App\Factory\CategoryFactory;
use App\Factory\ProductFactory;
use App\Factory\StockFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class ProductTest extends KernelTestCase
{
    use Factories;
    use ResetDatabase;

    public function orderMattersTest(): void
    {
        $product = ProductFactory::createOne();

        self::assertInstanceOf(Product::class, $product);
    }

    public function orderDoesntMatterHere(): void
    {
        $product = ProductFactory::createOne([
            'productName' => 'Product 1',
            'stock' => StockFactory::new(['stockAvailable' => 10]),
            'category' => CategoryFactory::new(['categoryName' => 'Category 1']),
        ]);

        self::assertInstanceOf(Product::class, $product);
    }
}
