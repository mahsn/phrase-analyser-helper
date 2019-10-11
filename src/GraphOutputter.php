<?php

namespace Mahsn\PhraseAnalyser;

use Mahsn\PhraseAnalyser\Contracts\GraphOutputterInterface;

class GraphOutputter implements GraphOutputterInterface
{

    const KEY_BEFORE = 'before';

    const KEY_AFTER = 'after';

    /**
     * Convert the result to a graph representation
     * @param array $items
     * @return array
     */
    public function toGraph($items)
    {
        $graph = [];
        foreach ($items as $key => $value) {
            $graph[$key] = array_merge($value[self::KEY_BEFORE], $value[self::KEY_AFTER]);
        }

        return $graph;
    }
}