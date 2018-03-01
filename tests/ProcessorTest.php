<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Processor\Processor;

/**
 * Class ProcessorTest
 */
final class ProcessorTest extends TestCase
{
    public function testEmptyProcessorWorks(): void
    {
        $processor = new Processor();
        $this->assertEmpty($processor->run());

        $input = 'some_input';
        $processor->setInput($input);
        $this->assertEquals($input, $processor->run());
    }

    public function testNonEmptyProcessorWorks(): void
    {
        $processor = new Processor();
        $processor->setInput('<div>&* 156');
        $processor->chainSanitizer(new Sanitizers\SpacesSanitizer());
        $processor->chainSanitizer(new \Sanitizers\StripTagsSanitizer());
        $processor->chainSanitizer(new \Sanitizers\RemoveSymbolsSanitizer());
        $processor->chainSanitizer(new \Sanitizers\ToNumberSanitizer());
        $this->assertEquals(156, $processor->run());
    }
}