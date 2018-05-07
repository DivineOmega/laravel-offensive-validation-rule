# 🤬🤭 Laravel Offensive Validation Rule

This package provides a Laravel validation rule that checks if a string is offensive. It can be useful
to check user supplied data that may be publicly displayed, such as usernames or comments. 

<p align="center"><img src="assets/images/laravel-offensive-validation-rule-usage.png" alt="Laravel Offensive Validation Rule usage"></p>

<p align="center">
    <a href="https://travis-ci.org/DivineOmega/laravel-offensive-validation-rule">
        <img src="https://travis-ci.org/DivineOmega/laravel-offensive-validation-rule.svg?branch=master)">
    </a>
    <a href='https://coveralls.io/github/DivineOmega/laravel-offensive-validation-rule?branch=master'>
        <img src='https://coveralls.io/repos/github/DivineOmega/laravel-offensive-validation-rule/badge.svg?branch=master' alt='Coverage Status' />
    </a>
    <a href="https://styleci.io/repos/132460621">
        <img src="https://styleci.io/repos/132460621/shield?branch=master" alt="StyleCI">
    </a>
</p>

## Installation

To install, just run the following Composer command.

```
composer require divineomega/laravel-password-exposed-validation-rule
```

Please note that this package requires Laravel 5.1 or above.

## Usage

The following code snippet shows an example of how to use the offensive validation rule.

```php
use DivineOmega\LaravelOffensiveValidationRule\Offensive;

$request->validate([
    'username' => ['required', new Offensive],
]);
```
