<?php
declare(strict_types=1);

namespace Tests\Unit\Fake\Legacy;

use BernardoSecades\Testing\Domain\Entity\Employed;
use BernardoSecades\Testing\Domain\Entity\EmployersCollection;
use BernardoSecades\Testing\Legacy\Service\CalculateSalaries;
use PHPUnit\Framework\TestCase;

class FakeCalculateSalaries extends CalculateSalaries
{
    protected function log($message){}
}
/**
 * Doubles: Dummy
 */
class CalculateSalariesServiceTest extends TestCase
{
    /**
     * @test
     */
    public function calculate_total_salaries()
    {
        $sut = new FakeCalculateSalaries();
        $this->assertEquals(30000, $sut->calculateTotalSalaries($this->getEmployersCollection()));
    }

    /**
     * @return EmployersCollection
     */
    private function getEmployersCollection(): EmployersCollection
    {
        $employers = new EmployersCollection();
        $employers->add(Employed::create('John', 20000));
        $employers->add(Employed::create('John', 10000));
        $employers->add(Employed::create('John', 25000)->deactivate());

        return $employers;
    }
}
