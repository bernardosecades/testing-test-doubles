<?php
declare(strict_types=1);

namespace BernardoSecades\Testing\Domain\Repository;

use BernardoSecades\Testing\Domain\Entity\EmployersCollection;
use Exception;

interface ExporterRepository
{
    /**
     * @param EmployersCollection $employers
     * @throws Exception
     */
    public function export(EmployersCollection $employers): void;
}
