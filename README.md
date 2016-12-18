![](https://lithiumhosting.com/images/logo_new_black.png)

# Laravel 5+ Tag Cloud Generator
**from Lithium Hosting**  
We're always open to pull requests, feel free to make this your own or help us make it better.

### Copyright
(c) Lithium Hosting, llc

### License
This library is licensed under the GNU GPL license; you can find a full copy of the license itself in the file /LICENSE

### Requirements
- Laravel 5.2+
- php 5.5.9+
- Knowledge of Laravel and php

### Description

A Laravel package that aids in generation of tag clouds

* * *

### Installation

Install this package through Composer. To your composer.json file, add:

```js
    "lithiumdev/laravel-tagcloud": "~1.0"
```

Next, run the Composer update comand

    $ composer update

Add the service provider to app/config/app.php, within the providers array.

```php
    'providers' => array(
        // ...
        LithiumDev\TagCloud\ServiceProvider::class,
    ),
```

### Usage

```php
use LithiumDev\TagCloud\TagCloud;

$cloud = new TagCloud();
$cloud->addTag("tag-cloud");
$cloud->addTag("programming");

echo $cloud->render();
```

Or:  

```php
// Assumes use of Facade "TagCloud"
$cloud = \TagCloud::addTags(['tag_1', 'tag_2', 'tag_3']);

echo $cloud->render();
```

#### Convert a string

```php
$cloud->addString("This is a tag-cloud script!");
```

#### Adding multiple tags

```php
$cloud->addTags(array('laravel', 'laravel-tagcloud','php','github'));
```

#### Removing a tag

```php
$cloud->setRemoveTag('github');
```

#### Removing multiple tags

```php
$cloud->setRemoveTags(array('tag','cloud'));
```

#### More complex adding

```php
$cloud->addTag(array('tag' => 'php', 'url' => 'http://www.php.net', 'colour' => 1));
$cloud->addTag(array('tag' => 'ajax', 'url' => 'http://www.php.net', 'colour' => 2));
$cloud->addTag(array('tag' => 'css', 'url' => 'http://www.php.net', 'colour' => 3));
```

#### Set the minimum length required

```php
$cloud->setMinLength(3);
```

#### Limiting the output

```php
$cloud->setLimit(10);
```

#### Set the order

```php
$cloud->setOrder('colour','DESC');
```

#### Set a custom HTML output

```php
$cloud->setHtmlizeTagFunction(function($tag, $size) use ($baseUrl) {
  $link = '<a href="'.$baseUrl.'/'.$tag['url'].'">'.$tag['tag'].'</a>';
  return "<span class='tag size{$size} colour-{$tag['colour']}'>{$link}</span> ";
});
```

#### Outputting the cloud (shown above)

```php
echo $cloud->render();
```

#### Transliteration

By default, all accented characters will be converted into their non-accented equivalent,
this is to circumvent duplicate similar tags in the same cloud, to disable this functionality
and display the UTF-8 characters you can do the following:

```php
$tagCloud->setOption('transliterate', false);
```