## Easy Array

### Overview

`\UnknownRori\EasyArray\EasyArray` is a lightweight helper class that can make your array manipulation logic readable.

### Feature

- first
- last
- find
- get
- key
- map
- filter
- split
- getData
- push
- pop
- merge
- remove
- reverse
- unique
- exist
- save

### Installation

`Composer require unknownrori/easyarray`

### Usage

Creating new Collection

    $array = new EasyArray([1, 2, 3])

Map the collection

    $article = new EasyArray([
        "article" => "Lorem ipsum",
        "slug" => "Lorem",
        "timestamp" => date_timestamp_get(date_create()),
    ]);

    $article->map(function ($name) {
        return strtoupper($name);
    });

    $modifiedArticle = $article->getData();

or using helper function

    $array = EasyArr([1, 2, 3]);