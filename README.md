## Foundry issue reproducer

### Steps to reproduce
 - composer install
 - vendor/bin/phpunit
 - see test faile
 - change the ProductFactory::default() to call oneToOneAfterOneToMany()
 - vendor/bin/phpunit
 - see test pass
 - the order of keys in the array returned by default() matters
