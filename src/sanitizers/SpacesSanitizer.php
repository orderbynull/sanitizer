<?php

namespace Sanitizers;

/**
 * Удаляет все пробелы.
 *
 * @package Sanitizers
 */
class SpacesSanitizer implements SanitizerInterface
{
    /**
     * @param string $input
     * @return string
     */
    public function run(string $input): string
    {
        return str_replace(' ', '', $input);
    }
}