<?php

use PHPUnit\Framework\TestCase;

use Mahsn\PhraseAnalyser\PhraseProcessor;
use Mahsn\PhraseAnalyser\GraphOutputter;

class GraphTest extends TestCase
{
    public function getGraph()
    {
        $phraseProcessor = new PhraseProcessor();
        $phrase = $phraseProcessor->processor('lorem ipsum dolor sit amet');

        $graphOutputter = new GraphOutputter();
        $graph = $graphOutputter->toGraph($phrase);

        return $graph;
    }


    /**
     * Phrase is converted to graph,
     * then validates if an array, then runs through all its values
     *
     */
    public function testTraverseGraph()
    {
        $graph = $this->getGraph();

        /**
         * First validate if is array
         */
        $this->assertIsArray($graph, 'Validate if graph is array');

        /**
         *  Run through the graph array
         */
        foreach ($graph as $key => $value) {
            foreach ($value as $characters) {
                $this->assertIsString($characters, 'The character must be a string');
            }
        }
    }
}