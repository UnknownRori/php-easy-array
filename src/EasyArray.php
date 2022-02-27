<?php

namespace UnknownRori\EasyArray;

use Exception;

class EasyArray implements IEasyArray
{
    protected $original;
    public $data;

    /**
     * Initialize EasyArray Instance
     * @param  mixed $data
     * @return $this
     */
    public function __construct($data)
    {
        if(!is_array($data)) $data = array($data);
        $this->original = $data;
        $this->data = $data;

        return $this;
    }

    /**
     * Getting EasyArray Original Data
     */

    /**
     * Get the first original EasyArray value
     * @return mixed
     */
    public function first()
    {
        return $this->original[0];
    }

    /**
     * Get the last original EasyArray value
     * @return mixed
     */
    public function last()
    {
        return $this->original[count($this->original) - 1];
    }

    /**
     * Find value in the EasyArray and return the key
     * @return int|string|false
     */
    public function find($needle)
    {
        return array_search($needle, $this->original);
    }

    /**
     * return length result the data EasyArray
     * @return int
     */
    public function length()
    {
        return count($this->data);
    }

    /**
     * Fetch the key inside the EasyArray Original Data
     * @return array
     */
    public function key()
    {
        return array_keys($this->original);
    }

    /**
     * Check if original EasyArray is null or not
     * @return boolean
     */
    public function isNull()
    {
        return is_null($this->original);
    }

    /**
     * EasyArray Manipulation
     */

    /**
     * Pop the data property
     * @return $this
     */
    public function pop()
    {
        array_pop($this->data);
        return $this;
    }

    /**
     * Map the Original Value of EasyArray
     * @param  callable @callback
     * @return $this
     */
    public function map(callable $callback)
    {
        $this->data = array_map($callback, $this->data);
        return $this;
    }

    /**
     * Split the Original Value of EasyArray into smaller array
     * @param  int $length
     * @return $this
     */
    public function split(int $length)
    {
        $this->data = array_chunk($this->data, $length);
        return $this;
    }

    /**
     * Remove specific key in the EasyArray
     * @param  array $key
     * @return this
     */
    public function remove(array $key)
    {
        for ($j = 0; $j < count($key); $j++) {
            if (array_key_exists($key[$j], $this->data)) {
                unset($this->data[$key[$j]]);
            }
        }
        return $this;
    }

    /**
     * Fetch current manipulated data
     * @param  mixed $key
     * @return mixed
     */
    public function get($key = null)
    {
        if (!is_null($key)) {
            if (is_array($key)) {
                return array_map(function ($key) {
                    return $this->data[$key];
                }, $key);
            } else {
                return $this->data[$key];
            }
        };

        return $this->data;
    }

    /**
     * Push the value inside the EasyArray
     * @param  string|int $val
     * @return $this
     */
    public function push(string|int $val)
    {
        array_push($this->data, $val);
        return $this;
    }

    /** 
     * Merge the input array into EasyArray
     * @param  array $array
     * @return $this
     */
    public function merge(array $array)
    {
        $this->data = array_merge_recursive($this->data, $array);
        return $this;
    }

    /** 
     * Recursive Merge the input array into EasyArray
     * @param  array $array
     * @return $this
     */
    public function mergeRecursive(array $array)
    {
        $this->data = array_merge_recursive($this->data, $array);
        return $this;
    }

    /**
     * Fill the EasyArray
     * @param  array $array
     * @return $this
     */
    public function fill(array $array)
    {
        $data_key = array_keys($this->data);
        $array_keys = array_keys($array);

        for ($i = 0; $i < count($this->data); $i++) {
            for ($j = 0; $j < count($array); $j++) {
                if ($data_key[$i] == $array_keys[$j]) {
                    $this->data[$data_key[$i]] = $array[$array_keys[$j]];
                }
            }
        }

        return $this;
    }

    /**
     * Filter original data EasyArray
     * @param  callable $callback
     * @param  int      $mode
     * @return $this
     */
    public function filter(callable $callback, $mode = ARRAY_FILTER_USE_KEY)
    {
        $this->data = array_filter($this->data, $callback, $mode);
        return $this;
    }

    /** 
     * Return a reversed array
     * @return array
     */
    public function reverse()
    {
        return array_reverse($this->data);
    }

    /**
     * Combine 2 array, one array for key another one from the EasyArray for the value
     * @param  array $key
     * @return $this
     */
    public function insertKey(array $key)
    {
        if(count($key) == count($this->data)){
            $this->data = array_combine($key, $this->data);
            return $this;
        }
        throw new Exception("Key and the value inside the EasyArray must be same");
    }

    /**
     * Remove Duplication inside EasyArray
     * @return $this
     */
    public function unique($flags = SORT_STRING)
    {
        $this->data = array_unique($this->data, $flags);
        return $this;
    }

    /**
     * Check if the key exist inside EasyArray data
     * @return boolean
     */
    public function exist($key)
    {
        if(is_array($key)) {
            $length = count($key);
            $data = [];

            for($i = 0; $i < $length; $i++) {
                array_push($data, array_key_exists($key[$i], $this->data));
            }
            $data = count(array_filter($data));
            
            if($data == $length) return true;
            return false;
        }
        return array_key_exists($key, $this->data);
    }

    /**
     * Persist the change
     * @return $this
     */
    public function save()
    {
        $this->original = $this->data;
        return $this;
    }
}
