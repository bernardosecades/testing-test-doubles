<?php

namespace BernardoSecades\Testing\Translator;

class Translator
{
    const URL = 'http://www.wordreference.com/es/translation.asp?tranword=';

    public function anotherMethod()
    {
        /* ... */
    }

    /**
     * @return string
     */
    public function fetch($searchTerm)
    {
        $url = self::URL . $searchTerm;

        return file_get_contents($url);
    }
}
