# Typed Collections

You like Laravel Collections, but you don't use Laravel? 
You've used the Collections, but you feel like something missing? Like type hints? It's your package!

### The problem

From PHP 7.0 you can typehint many things in php functions. Like:

```php 
function hello(string $name): string {
   return sprintf('Hello %s!', $name); 
}
```

But what if you want a string list? 
You can't typehint the content of arrays, you can only hint the array:
```php
function hello(array $names): array; 
```

And not like this:
```php
function hello(array[string] $names): array[string]; 
```

It's sad. 


### The solution

If you use this package, you can use type hinted Collections instead of simple arrays. Like this:

```php
$names = new StringCollection(['Pete', 'Steve', 'John']);

function hello(StringCollection $names): StringCollection {
 ...
}
```

It's so simple!

### Types

You can use these default types:
- ArrayCollection
- BooleanCollection
- CallableCollection
- ClassCollection
- FloatCollection
- IntegerCollection
- NullCollection
- ObjectCollection
- ResourceCollection
- StringCollection

### ClassCollection

There is a simple way to specify an 'instance of' typed collection:

```php
$photo1 = new Photo();
$photo2 = new Photo();
 
$photoCollection = new ClassCollection(Photo::class, [$photo1, $photo2])
```

### Create your own typed collection

If you want create your own typed collection, just create a new Collection file, and extend the AbstractTypedCollection. 
After this your only task is to fill the isValid function. 
It will check every added value, and if you try to add a value that is not allowed, the AbstractTypedCollection will automatically throw an InvalidTypedException.

```php
/// PostCollection.php:

<?php

declare(strict_types=1);

namespace Esemve\Collection;

use Entity\Post;

class CallableCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return $element instanceof Post;
    }
}

```

That's it. If you want to add your exception message, just add a getErrorMessage method to your class:

```php
    protected function getErrorMessage(): ?string
    {
        return 'It\'s my own error message';
    }
    
```

### Use the Factory

If you want to, you can use the CollectionFactory. 
It helps you to create a collection if you don't want to hardcode the types to your code.
If you use the CollectionFactory, you can use this methods from it:

- createBooleanCollection(array $array): BooleanCollection;
- createCallableCollection(array $array): CallableCollection;
- createClassCollection(string $classname, array $array): ClassCollection;
- createFloatCollection(array $array): FloatCollection;
- createIntegerCollection(array $array): IntegerCollection;
- createNullCollection(array $array): NullCollection;
- createObjectCollection(array $array): ObjectCollection;
- createResourceCollection(array $array): ResourceCollection;
- createStringCollection(array $array): StringCollection;
- create(array $array): Collection;


### Modifications

I've disabled the combine method from the original Collection class, because if you use that, your collection type can get mixed up.


### External package

You can use this package without Laravel, thanks to the "tightenco/collect" package that I've used.  
If you use this package with Laravel, the tightenco package will automatically disable itself, and the TypedCollection will use the default Laravel Collection package.

### License

This package is open source software licensed under the MIT License.
 