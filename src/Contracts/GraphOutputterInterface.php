<?php

namespace Maximuspoder\PhraseAnalyser\Contracts;

interface GraphOutputterInterface
{
    /**
     * Convert the result to a graph representation
     * @param $string
     * @return array
     */
    public function toGraph(array $items);
}