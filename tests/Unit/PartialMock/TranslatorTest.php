<?php

namespace Tests\Unit\PartialMock;

use BernardoSecades\Testing\Translator\Translator;
use Mockery as m;

class TranslatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Frameworks like Mockery and Phake allow create partial mocks. Means call
     * real method if is not especified in the mock.
     * Important: In new code is not recommended use partail mock (Single Responsability)
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
