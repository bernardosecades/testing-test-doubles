<?php
declare(strict_types=1);

namespace BernardoSecades\Testing\Legacy\Service;

use BernardoSecades\Testing\Domain\Entity\Employed;
use BernardoSecades\Testing\Domain\Entity\EmployersCollection;

class CalculateSalaries
{
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
                $this->log(sprintf('Employed %s is deactivated', $employed->getName()));
                continue;
            }
            $total += $employed->getSalary();
        }

        return $total;

    }

    protected function log($message)
    {
        echo $message . PHP_EOL;
    }
}
