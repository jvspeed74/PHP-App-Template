<?php

declare(strict_types=1);


use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use App\RandomStringGenerator;


#[CoversClass(RandomStringGenerator::class)]
#[UsesClass(RandomStringGenerator::class)]
class RandomStringGeneratorTest extends TestCase
{
    protected RandomStringGenerator $generator;

    protected function setUp(): void
    {
        $this->generator = new RandomStringGenerator();
    }

    public function testGenerateReturnsStringOfGivenLength(): void
    {
        $length = 12;
        $result = $this->generator->generate($length);
        $this->assertIsString($result);
        $this->assertEquals($length, strlen($result));
    }

    public function testGenerateThrowsExceptionForNegativeLength(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->generator->generate(-5);
    }

    public function testGenerateReturnsRandomString(): void
    {
        $result1 = $this->generator->generate(10);
        $result2 = $this->generator->generate(10);

        $this->assertNotEquals($result1, $result2, "Two generated strings should not be the same.");
    }

    public function testGenerateDefaultLength(): void
    {
        $result = $this->generator->generate();
        $this->assertEquals(10, strlen($result), "Default string length should be 10.");
    }
}
