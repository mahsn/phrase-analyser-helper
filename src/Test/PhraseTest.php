<?php

use PHPUnit\Framework\TestCase;

use Maximuspoder\PhraseAnalyser\PhraseProcessor;
use Maximuspoder\PhraseAnalyser\GraphOutputter;

class PhraseTest extends TestCase
{
	public function getPhrase()
    {
        $phraseProcessor = new PhraseProcessor();
        $phrase = $phraseProcessor->processor('football vs soccer');

        return $phrase;
    }

    /**
     * Validate if text is converted to array
     */
    public function testPhraseIsConvertedToArray()
    {
        $this->assertIsArray($this->getPhrase(), 'Validate if phrase returned as array');
    }

    /**
     * Validate if occurrence key exists
     */
    public function testHasOccurence()
    {
        foreach ($this->getPhrase() as $occurrences) {
            $this->assertArrayHasKey('occurrences', $occurrences);
        }
    }

    /**
     * Validate if distance key exists
     */
    public function testHasDistance()
    {
        foreach ($this->getPhrase() as $occurrences) {
            $this->assertArrayHasKey('distance', $occurrences);
        }
    }

    /**
     * Validate if before key exists
     */
    public function testHasBefore()
    {
        foreach ($this->getPhrase() as $occurrences) {
            $this->assertArrayHasKey('before', $occurrences);
        }
    }

    /**
     * Validate if after key exists
     */
    public function testHasAfter()
    {
        foreach ($this->getPhrase() as $occurrences) {
            $this->assertArrayHasKey('after', $occurrences);
        }
    }
}