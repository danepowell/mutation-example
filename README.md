# PHP mutation testing example

This repo demonstrates how to perform mutation testing with Infection in PHP.

The example class implements a [game of War](https://en.wikipedia.org/wiki/War_(card_game))

The `main` branch contains the working mutation testing example with 100% code
coverage and 100% mutation score index (MSI).

The `coverage-only` branch has 100% code coverage and 40% MSI, demonstrating the importance of mutation testing.

The `errors` branch has code that will cause timeouts and syntax errors in
mutation tests.
