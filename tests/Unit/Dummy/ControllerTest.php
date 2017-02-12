<?php

namespace Tests\Unit\Dummy;

use BernardoSecades\Testing\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

class ControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Dummies are doubles with no behaviour.
     *
     * @test
     */
    public function myAction()
    {
        /** @var LoggerInterface $logger */
        $logger  = $this->prophesize(LoggerInterface::class);
        /** @var Request $request */
        $request = $this->prophesize(Request::class);

        $controller = new Controller($logger->reveal());

        $this->assertFalse($controller->myAction($request->reveal()));
    }
}