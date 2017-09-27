<?php
declare(strict_types=1);

namespace BernardoSecades\Testing\Domain\Service;

use BernardoSecades\Testing\Domain\Repository\EmployedRepository;
use BernardoSecades\Testing\Domain\Service\Exception\EmployedNotFoundException;

class EmployedService
{
    /** @var  EmployedRepository */
    protected $employedRepository;

    /**
     * @param EmployedRepository  $userRepository
     */
    public function __construct(EmployedRepository $userRepository)
    {
        $this->employedRepository = $userRepository;
    }

    /**
     * @param int $employedId
     * @return bool
     * @throws EmployedNotFoundException
     */
    public function isActive(int $employedId): bool
    {
        $user = $this->employedRepository->getEmployed($employedId);

        if (null === $user) {
            throw new EmployedNotFoundException(sprintf('EmployedId = %d does not exist', $employedId));
        }

        return $user->isActive();
    }
}
