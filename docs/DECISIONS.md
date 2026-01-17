# Architectural Decisions

## ADR 1: Use of Explicit Aggregate over Tag Injection

### Context
The `pedhot-dev/nepotismfree-di` library supports tagging, but resolving tags into a constructor typically requires a closure binding (e.g., `$container->getTagged('tag')`). 

### Decision
We have chosen to avoid closure bindings and instead use a concrete `NotificationChannelCollection` class.

### Consequences
- **Pro**: The application code is 100% unaware of the DI container.
- **Pro**: No service locator behavior in the container configuration.
- **Con**: Adding a new channel requires updating the `NotificationChannelCollection` constructor. 

We prioritize **architectural honesty** and **static safety** over the convenience of automatic tag discovery, as the latter would leak container concerns into the bootstrap process.

## ADR 2: Constructor Injection Only

### Context
The application must remain decoupled from the infrastructure layer.

### Decision
Setter or property injection is forbidden. All dependencies must be provided at instantiation time.

### Consequences
- Ensures that services are never in an invalid state.
- Makes unit testing straightforward as dependencies are explicitly defined in the constructor.
