<?php

namespace BernardoSecades\Testing\ObserverPattern;

class Observer
{
    /**
     * @param mixed $argument
     */
    public function update($argument)
    {
        /* ... */
    }

    /**
     * @param int     $errorCode
     * @param string  $errorMessage
     * @param Subject $subject
     */
    public function reportError($errorCode, $errorMessage, Subject $subject)
    {
        /* ... */
    }
}