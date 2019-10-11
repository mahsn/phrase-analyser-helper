<?php

namespace Maximuspoder\PhraseAnalyser\Contracts;

interface PhraseProcessorInterface
{
    /**
     * Phrase processor
     * @param  string $phrase
     * @return array
     */
    public function processor($phrase);

    /**
     * Get the count of all ocurrence of the character
     * @return void
     */
    public function getOccurenceByCharacter();

    /**
     * Take the neighboring characters, that is,
     * what comes before and after.
     * @return void
     */
    public function getCharactersBeforeAndAfter();

    /**
     * Get the distance between characters until next
     * occurrence of the same character.
     *
     * If the character has more than 2 occurrence, the distance
     * will be setted to 10.
     *
     * @return void
     */
    public function getCharactersDistance();
}