<?php
declare(strict_types=1);

namespace BernardoSecades\Testing\Legacy\Service;


use BernardoSecades\Testing\Domain\Entity\Employed;

class CalculateSalaries
{
    /**
     * @param EmployersCollection $collection
     * @return int
     */
    public function calculateTotalSalaries(EmployersCollection $collection)
    {
        $this->logInactiveEmployees($collection);
        return $this->sumActiveEmployeesSalaries($collection);
    }

    protected function logInactiveEmployees($collection)
    {
        $inactiveEmployees = array_filter($collection, function ($employee) {
            /**
             * @var Employed $employee
             */
            return !$employee->isActive();
        });
        array_walk($inactiveEmployees, function ($employee) {
            $this->log(sprintf('Employed %s is deactivated',
                $employee->getName()));
        });
    }

    protected function log($message)
    {
        echo $message . PHP_EOL;
    }

    private function sumActiveEmployeesSalaries($collection)
    {
        $activeEmployees = array_filter($collection, function ($employee) {
                return $employee->isActive();
            });
        $salaries = array_map(function($employee){
            return $employee->getSalary();
        }, $activeEmployees);

        return array_sum($salaries);
    }
}
