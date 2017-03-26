PIS Provider
====================

[![Build Status](https://travis-ci.org/amandiobm/fake-pis-provider.svg?branch=master)](https://travis-ci.org/amandiobm/fake-pis-provider)
[![Coverage Status](https://coveralls.io/repos/github/amandiobm/fake-pis-provider/badge.svg)](https://coveralls.io/github/amandiobm/fake-pis-provider)
[![Total Downloads](https://img.shields.io/packagist/dt/amandiobm/faker-pis-provider.svg?style=flat)](https://packagist.org/packages/amandiobm/faker-pis-provider)

[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/69e8550a-69ff-4968-ae5f-da6c32364f8f.svg?style=flat)](https://insight.sensiolabs.com/projects/69e8550a-69ff-4968-ae5f-da6c32364f8f)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/EmanueleMinotto/PlaceholdItProvider.svg?style=flat)](https://scrutinizer-ci.com/g/EmanueleMinotto/PlaceholdItProvider/)

PIS provider for [Faker](https://github.com/fzaninotto/Faker).

## Install
Install the PisProvider adding `amandiobm/faker-pis-provider` to your composer.json or from CLI:

```
$ composer require amandiobm/faker-pis-provider
```

## Usage

```php
$faker = Faker\Factory::create();
$faker->addProvider(new AmandioMagalhaes\Faker\PisProvider($faker));

// PIS
$pis = $faker->pis(); // 57182789660
$formattedPis = $faker->pis(true); // 571.82789.66-0
```
