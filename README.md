## Easy Array

### Overview

`\UnknownRori\EasyArray\EasyArray` is a lightweight helper class that can make your array manipulation logic readable.

### Feature

- find
- last
- length
- get
- key
- isNull
- pop
- map
- split
- remove
- push
- merge
- mergeRecursive
- fill
- filter
- reverse
- unique
- exist
- insertKey
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