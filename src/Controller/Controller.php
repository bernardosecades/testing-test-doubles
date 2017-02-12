<?php

namespace BernardoSecades\Testing\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class Controller
{
    /** @var  LoggerInterface */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger  = $logger;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function myAction(Request $request)
    {
        $q = $request->get('q');

        if ($q) {
            $this->logger->info(sprintf('Request = %', $request));

            return true;
        }

        $this->logger->error('NO Received parameter q');

        return false;
    }
}
