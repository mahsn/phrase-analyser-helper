<?php

namespace Mahsn\PhraseAnalyser;

abstract class AbstractObject
{
    /**
     * @var array $data
     */
    protected $data;

    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * Return defined key or entire array
     * @param $key
     * @return mixed
     */
    public function getData($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : $data;
    }
}