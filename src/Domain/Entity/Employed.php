<?php
declare(strict_types=1);

namespace BernardoSecades\Testing\Domain\Entity;

class Employed
{
    /** @var  string */
    protected $name;

    /** @var  float */
    protected $salary;

    /** @var  bool */
    protected $active;

    /**
     * @param string $name
     * @param int    $salary
     */
    public function __construct(string $name, int $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->activate();
    }

    /**
     * @param string $name
     * @param int    $salary
     * @return Employed
     */
    static public function create(string $name, int $salary): self
    {
        return new self($name, $salary);
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Employed
     */
    public function activate(): self
    {
        $this->active = true;

        return $this;
    }

    /**
     * @return Employed
     */
    public function deactivate(): self
    {
        $this->active = false;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}
