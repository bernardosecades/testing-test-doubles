<?php
declare(strict_types=1);

namespace BernardoSecades\Testing\Domain\Service;

use BernardoSecades\Testing\Domain\Entity\Employed;
use BernardoSecades\Testing\Domain\Entity\EmployersCollection;
use Psr\Log\LoggerInterface;

class CalculateSalariesService
{
    /** @var  LoggerInterface */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param EmployersCollection $collection
     * @return int
     */
    public function calculateTotalSalaries(EmployersCollection $collection)
    {
        $total = 0;
        /** @var Employed $employed */
        foreach ($collection as $employed) {
            if (!$employed->isActive()) {
                $this->logger->warning(sprintf('Employed %s is deactivated', $employed->getName()));
                continue;
            }
            $total += $employed->getSalary();
        }

        return $total;
    }
}
