<?php
declare(strict_types=1);

namespace BernardoSecades\Testing\Domain\Service;

use BernardoSecades\Testing\Domain\Entity\EmployersCollection;
use BernardoSecades\Testing\Domain\Repository\ExporterRepository;
use BernardoSecades\Testing\Domain\Service\Exception\CanNotExportEmptyEmployersException;

class ExporterService
{
    /** @var  ExporterRepository */
    protected $exporterRepository;

    /**
     * @param ExporterRepository $exporterRepository
     */
    public function __construct(ExporterRepository $exporterRepository)
    {
        $this->exporterRepository = $exporterRepository;
    }

    /**
     * @param EmployersCollection $employers
     * @return void
     * @throws CanNotExportEmptyEmployersException
     */
    public function export(EmployersCollection $employers): void
    {
        if ($employers->isEmpty()) {
            throw new CanNotExportEmptyEmployersException('Empty collection dude, WTF!');
        }

        $this->exporterRepository->export($employers);
    }
}
