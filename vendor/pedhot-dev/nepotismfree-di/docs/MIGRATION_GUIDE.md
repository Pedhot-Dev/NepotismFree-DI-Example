# Migration Guide: NepotismFree DI V1 to V2

## Overview
V2 introduces **Modules**, **Contextual Bindings**, and **Strict Boundaries**. While cores remain compatible, some signatures and behaviors have changed.

## Breaking Changes

### 1. `ContainerInterface::get()` Signature
**V1:** `public function get(string $id): mixed;`
**V2:** `public function get(string $id, bool $internal = false): mixed;`

If you have custom implementations of `ContainerInterface`, you must update the method signature. The `$internal` flag is used by the resolver to bypass module boundary checks during dependency injection.

### 2. Module Boundaries
In V2, if you use `addModule()`, module strictness is enabled. 
- You must explicitly list services in `getExposedServices()` if you want to access them directly via `$container->get()`.
- Internal services are only accessible to other services within the container (autowiring).

## New Features

### Contextual Bindings
If you previously used manual factory closures to handle different implementations of the same interface, you can now use `bindContext`:
```php
// Old V1 way
$builder->bind(Service::class, function($c) {
    return new Service(new SpecialLogger());
});

// New V2 way
$builder->bindContext(LoggerInterface::class, SpecialLogger::class, Service::class);
```

### Parameter Objects
You can now bind whole objects as "parameters":
```php
$builder->bindParameterObject(AppConfig::class, $configInstance);
```

### Tags
Group resolution is now first-class:
```php
$builder->tag('subscribers', MySubscriber::class);
$subscribers = $container->getTagged('subscribers');
```
