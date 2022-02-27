<?php

namespace UnknownRori\EasyArray;

interface IEasyArray
{
    public function first();
    public function last();
    public function find($needle);
    public function length();
    public function get($key);
    public function key();
    public function isNull();
    public function pop();
    public function map(callable $callback);
    public function split(int $length);
    public function remove(array $key);
    public function push(string|int $val);
    public function merge(array $array);
    public function mergeRecursive(array $array);
    public function fill(array $array);
    public function filter(callable $callback, $mode = ARRAY_FILTER_USE_KEY);
    public function reverse();
    public function unique($flags = SORT_STRING);
    public function insertKey(array $key);
    public function limit(int $limit);
    public function exist($key);
    public function save();
}