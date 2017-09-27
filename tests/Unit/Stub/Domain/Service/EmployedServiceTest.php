<?php
declare(strict_types=1);

namespace Tests\Unit\Stub\Domain\Service;

use BernardoSecades\Testing\Domain\Entity\Employed;
use BernardoSecades\Testing\Domain\Repository\EmployedRepository;
use BernardoSecades\Testing\Domain\Service\EmployedService;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

/**
 * Doubles: Stub
 */
class EmployedServiceTest extends TestCase
{
    /** @var  ObjectProphecy */
    protected $employedRepositoryPro;

    /** @var  EmployedService */
    protected $employedService;

    /** @var  int */
    protected $employedId;

    protected function setUp()
    {
        parent::setUp();
        $this->employedId = 1;
        $this->employedRepositoryPro = $this->prophesize(EmployedRepository::class);
        $this->employedService = new EmployedService($this->employedRepositoryPro->reveal());
    }

    /**
     * @expectedException \BernardoSecades\Testing\Domain\Service\Exception\EmployedNotFoundException
     * @test
     */
    public function user_not_exist_when_call_is_active()
    {
        $this->employedRepositoryPro->getEmployed($this->employedId)->willReturn(null);

        $this->employedService->isActive($this->employedId);
    }

    /**
     * @test
     */
    public function user_exist_and_is_active()
    {
        $this->employedRepositoryPro->getEmployed($this->employedId)->willReturn($this->getEmployed());

        $this->assertTrue($this->employedService->isActive($this->employedId));
    }

    /**
     * If you want to get isolation 100% from entities you can use something like this:
     *
     *   $employedPro = $this->prophesize(Employed::class);
     *   $employedPro->isActive()->willReturn(true);
     *   return $employedPro->reveal();
     *
     * @return Employed
     */
    private function getEmployed(): Employed
    {
        return Employed::create('Peter', 10000);
    }
}
