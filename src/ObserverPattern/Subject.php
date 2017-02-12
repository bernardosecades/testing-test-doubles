<?php

namespace BernardoSecades\Testing\ObserverPattern;

class Subject
{
    /** @var array  */
    protected $observers = [];

    /** @var string */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Observer $observer
     */
    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * @return int
     */
    public function numObservers()
    {
        // Do something.
        // Notify observers that we did something.
        $this->notify('something');

        return count($this->observers);

    }

    /**
     * @param mixed $argument
     */
    protected function notify($argument)
    {
        foreach ($this->observers as $observer) {
            $observer->update($argument);
        }
    }
}