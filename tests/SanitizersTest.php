<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class SanitizersTest
 */
final class SanitizersTest extends TestCase
{
    public function testToNumberSanitizerWorks(): void
    {
        $sanitizer = new \Sanitizers\ToNumberSanitizer();

        $input = 'no_digits';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = '';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = 'has_digits_888';
        $this->assertEquals(888, $sanitizer->run($input));

        $input = 'has_123_few_digits_345';
        $this->assertEquals(123, $sanitizer->run($input));
    }

    public function testSpacesSanitizerWorks(): void
    {
        $sanitizer = new \Sanitizers\SpacesSanitizer();

        $input = 'no_spaces';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = '';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = 'has few spaces';
        $this->assertEquals('hasfewspaces', $sanitizer->run($input));

        $input = 'has    a   lot of      spaces';
        $this->assertEquals('hasalotofspaces', $sanitizer->run($input));

        $input = "\nhas few spaces\n\n";
        $this->assertEquals("\nhasfewspaces\n\n", $sanitizer->run($input));
    }

    public function testStripTagsSanitizerWorks(): void
    {
        $sanitizer = new \Sanitizers\StripTagsSanitizer();

        $input = 'no_tags';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = '';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = '<head>';
        $this->assertEquals('', $sanitizer->run($input));

        $input = '<head>test<?php ?> me';
        $this->assertEquals('test me', $sanitizer->run($input));
    }

    public function testRemoveSymbolsSanitizer(): void
    {
        $sanitizer = new \Sanitizers\RemoveSymbolsSanitizer();

        $input = 'no_symbols';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = '[.,/!@#$%&*()]';
        $this->assertEquals('', $sanitizer->run($input));

        $input = '[test_me]';
        $this->assertEquals('test_me', $sanitizer->run($input));
    }

    public function testHtmlSpecialCHarsSanitizer(): void
    {
        $sanitizer = new \Sanitizers\HtmlSpecialCharsSanitizer();

        $input = 'no_specials';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = '';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = '<>';
        $this->assertEquals('&lt;&gt;', $sanitizer->run($input));
    }

    public function testSpacesToEolSanitizers(): void
    {
        $sanitizer = new \Sanitizers\SpacesToEolSanitizer();

        $input = 'no_spaces';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = '';
        $this->assertEquals($input, $sanitizer->run($input));

        $input = 'one two three';
        $this->assertEquals("one\ntwo\nthree", $sanitizer->run($input));

        $input = "\n\n\n";
        $this->assertEquals($input, $sanitizer->run($input));
    }
}