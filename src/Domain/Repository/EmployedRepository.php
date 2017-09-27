<?php
declare(strict_types=1);

namespace BernardoSecades\Testing\Domain\Repository;

use BernardoSecades\Testing\Domain\Entity\Employed;

interface EmployedRepository
{
    /**
     * @param int $employedId
     * @return null|Employed
     */
    public function getEmployed(int $employedId);
}
