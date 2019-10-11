<?php

namespace Maximuspoder\PhraseAnalyser;

use Maximuspoder\PhraseAnalyser\AbstractObject;
use Maximuspoder\PhraseAnalyser\Contracts\PhraseProcessorInterface;

class PhraseProcessor extends AbstractObject implements PhraseProcessorInterface
{
    /** @var string */
    const KEY_BEFORE = 'before';

    /** @var string */
    const KEY_AFTER = 'after';

    /** @var string */
    const KEY_DISTANCE = 'distance';

    /** @var string */
    const KEY_OCCURRENCES = 'occurrences';

	/** @var array $processor */
	protected $processor;

	/** @var array $graph */
	protected $graph;

	/**
     * Phrase processor
	 * @param  string $phrase
	 * @return array
	 */
	public function processor($phrase)
	{
	    $this->setData('phrase', $phrase);

		$this->getOccurenceByCharacter();
        $this->getCharactersBeforeAndAfter();
        $this->getCharactersDistance();

        return $this->processor;
	}

	/**
     * Get the count of all ocurrence of the character
	 * @return void
	 */
	public function getOccurenceByCharacter()
	{
		$array = (array)str_split($this->getData('phrase'));
        $array = array_filter($array, function($value) { return $value != ' '; });
		$count = array_count_values($array);
		foreach($count as $key => $value) {
		    if ($key != '')
			    $this->processor[$key][self::KEY_OCCURRENCES] = $value;
		}
	}

	/**
	 * Take the neighboring characters, that is,
     * what comes before and after.
	 * @return void
	 */
    public function getCharactersBeforeAndAfter()
    {
        $phrase = $this->getData('phrase');
    	$count = strlen($this->getData('phrase'));
    	$x = 0;
		while($x < $count) {
		    if ($phrase[$x] != ' ') {
                $this->processor[$phrase[$x]][self::KEY_BEFORE][] = ($x == 0) ? 'none' : $phrase[($x - 1)];
                $this->processor[$phrase[$x]][self::KEY_AFTER][] = (!isset($phrase[$x + 1])) ? 'none' : $phrase[($x + 1)];
            }
			$x++;
		}
    }

    /**
     * Get the distance between characters until next
     * occurrence of the same character.
     *
     * If the character has more than 2 occurrence, the distance
     * will be setted to 10.
     *
     * @return void
     */
    public function getCharactersDistance()
    {
        $phrase = $this->getData('phrase');
    	// Fix spaces between entire string
    	$newString = preg_replace('/[\s\W]+/', '#', $phrase);
    	$arrayItems = (array)str_split($phrase);
    	foreach ($arrayItems as $value) {
    	    if ($value == ' ')
    	        continue;

    		// Set value to 10 if character > 2
    		if (substr_count($phrase, $value) > 2){
    			$this->processor[$value][self::KEY_DISTANCE] = 10;
    			continue;
    		}
    		// Calculate distance between 2 characters
    		if (substr_count($phrase, $value) === 2 && $value != ' ') {
    			$distance1 = (int)strpos($newString, $value, 0);
    			$distance2 = (int)strpos($newString, $value, $distance1 + 1);
    			$this->processor[$value][self::KEY_DISTANCE] = abs($distance1 - $distance2);
    			continue;
    		}
            $this->processor[$value][self::KEY_DISTANCE] =  'N/A';
    	}
    }
}