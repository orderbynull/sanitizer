<?php

namespace Sanitizers;

/**
 * Заменяет пробелы на \n.
 *
 * @package Sanitizers
 */
class SpacesToEolSanitizer implements SanitizerInterface
{
    /**
     * @param string $input
     * @return string
     */
    public function run(string $input): string
    {
        return str_replace(' ', PHP_EOL, $input);
    }
}