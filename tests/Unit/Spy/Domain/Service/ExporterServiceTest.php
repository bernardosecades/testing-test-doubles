<?php
declare(strict_types=1);

namespace Tests\Unit\Spy\Domain\Service;

use BernardoSecades\Testing\Domain\Entity\Employed;
use BernardoSecades\Testing\Domain\Entity\EmployersCollection;
use BernardoSecades\Testing\Domain\Repository\ExporterRepository;
use BernardoSecades\Testing\Domain\Service\ExporterService;
use Prophecy\Prophecy\ObjectProphecy;
use PHPUnit\Framework\TestCase;

/**
 * Doubles: Mock
 */
class ExporterServiceTest extends TestCase
{
    /** @var  ExporterService */
    protected $exporterService;

    /** @var  ObjectProphecy */
    protected $exporterRepositoryPro;

    protected function setUp()
    {
        parent::setUp();

        $this->exporterRepositoryPro = $this->prophesize(ExporterRepository::class);
        $this->exporterService = new ExporterService($this->exporterRepositoryPro->reveal());

    }

    /**
     * @test
     * @expectedException \BernardoSecades\Testing\Domain\Service\Exception\CanNotExportEmptyEmployersException
     */
    public function export_with_empty_employers()
    {
        $this->exporterService->export(new EmployersCollection());
    }

    /**
     * @see http://www.ifdattic.com/mock-test-double-using-prophecy/
     * @see https://github.com/phpspec/prophecy
     * @test
     */
    public function export_employers()
    {
        $employers = $this->getNotEmptyEmployersCollection();

        $this->exporterService->export($employers);

        $this->exporterRepositoryPro->export($employers)->shouldHaveBeenCalled();

        $this->assertEmpty($this->exporterRepositoryPro->checkProphecyMethodsPredictions());
    }

    /**
     * @return EmployersCollection
     */
    private function getNotEmptyEmployersCollection(): EmployersCollection
    {
        $employers = new EmployersCollection();
        $employers->add(Employed::create('John', 20000));

        return $employers;
    }
}
