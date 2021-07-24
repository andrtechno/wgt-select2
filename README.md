Select2
=================

[![Latest Stable Version](https://poser.pugx.org/panix/wgt-select2/v/stable)](https://packagist.org/packages/panix/wgt-select2)
[![Total Downloads](https://poser.pugx.org/panix/wgt-select2/downloads)](https://packagist.org/packages/panix/wgt-select2)
[![Monthly Downloads](https://poser.pugx.org/panix/wgt-select2/d/monthly)](https://packagist.org/packages/panix/wgt-select2)
[![Daily Downloads](https://poser.pugx.org/panix/wgt-select2/d/daily)](https://packagist.org/packages/panix/wgt-select2)
[![Latest Unstable Version](https://poser.pugx.org/panix/wgt-select2/v/unstable)](https://packagist.org/packages/panix/wgt-select2)
[![License](https://poser.pugx.org/panix/wgt-select2/license)](https://packagist.org/packages/panix/wgt-select2)



## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/).

Either run

``` php composer require panix/wgt-select2 "dev-master" ```

or add

``` "panix/wgt-select2": "dev-master"```

to the `require` section of your `composer.json` file.



## Usage

Just pass the ScrollPager class name to the ListView `pager` configuration.
Make sure that items in your list have some classes that can be used as JavaScript selectors.



```php
echo Select2::widget([

]);
```

