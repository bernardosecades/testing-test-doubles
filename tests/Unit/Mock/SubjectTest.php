<?php

namespace Tests\Unit\Stubs;

use BernardoSecades\Testing\ObserverPattern\Observer;
use BernardoSecades\Testing\ObserverPattern\Subject;
use Prophecy\Argument;

class SubjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Are doubles pre-programmed with expectations which form a specification of the
     * calls they are expected to receive.
     *
     * @test
     */
    public function observersAreUpdated()
    {
        $subject = new Subject('My subject');

        /** @var Observer$observerPro */
        $observerPro = $this->prophesize(Observer::class);

        // Spies: shouldBeCalledTimes(n)
        $observerPro->update('something')->shouldBeCalledTimes(1);

        $subject->attach($observerPro->reveal());

        $subject->numObservers();

    }
}
