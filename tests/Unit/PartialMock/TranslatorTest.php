<?php
declare(strict_types=1);

namespace Tests\Unit\PartialMock;

use BernardoSecades\Testing\Translator\Translator;
use PHPUnit\Framework\TestCase;

use Mockery as m;

class TranslatorTest extends TestCase
{
    /**
     * Frameworks like Mockery and Fake allow create partial mocks. Means call
     * real method if is not specified in the mock.
     * Important: In new code is not recommended use partial mock (Single Responsibility)
     *
     * @test
     */
    public function realMethod()
    {
        $mock = m::mock(Translator::class)->makePartial();
        $mock->fetch('dude'); // Call real method
    }

    /**
     * @test
     */
    public function overwriteRealMethod()
    {
        $mock = m::mock(Translator::class)->makePartial();

        // Overwrite real method
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn('This is a test');

        $this->assertEquals('This is a test', $mock->fetch('dude'));
    }
}
