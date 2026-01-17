# NepotismFree DI - Event Notification Example

This repository demonstrates the correct implementation of an event-driven notification system using the `nepotismfree-di` library. It focuses on maintaining strict architectural boundaries and clean Dependency Injection principles.

## The Problem
In an event-driven system, a single event (e.g., `UserRegistered`) often needs to trigger multiple actions (Email, Discord, Logging). Manually instantiating every channel inside an `EventDispatcher` creates tight coupling and violates the Single Responsibility Principle.

## Why DI is Required
Dependency Injection allows the `EventDispatcher` to be agnostic of the specific notification channels being used. By injecting a collection of channels, the application remains extensible: adding a new channel (e.g., Slack) only requires a new class and a container binding, with zero changes to the dispatcher logic.

## Usage

### Installation
```bash
composer install
```

### Running the Example
```bash
php example.php
```

## Design Boundaries & Compromises
- **Explicit Aggregate**: This example uses a `NotificationChannelCollection` to group channels. While the DI container supports tags, we intentionally avoid closure-based tag resolution in the configuration to ensure the dependency graph remains statically analyzable and the application remains container-unaware.
- **Concrete Resolution**: The collection depends on concrete channel implementations (`EmailChannel`, `DiscordChannel`) to comply with the library's current constructor injection capabilities without resorting to service locator patterns.
- **Immutability**: The container is built once at bootstrap and is not accessible within the application services.

## License
MIT

