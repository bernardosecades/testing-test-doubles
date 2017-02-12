<?php

namespace Tests\Unit\Stubs;

use BernardoSecades\Testing\Controller\Controller;
use Prophecy\Argument;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class ControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Are doubles that return output defined
     *
     * @test
     */
    public function myAction()
    {
        /** @var LoggerInterface $logger */
        $loggerPro = $this->prophesize(LoggerInterface::class);
        /** @var Request $request */
        $requestPro = $this->prophesize(Request::class);

        //$requestPro->get('something')->willReturn('query string');
        $requestPro->get(Argument::any())->willReturn('query string');

        $controller = new Controller($loggerPro->reveal());

        $this->assertTrue($controller->myAction($requestPro->reveal()));
    }
}
