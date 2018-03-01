<?php

namespace Sanitizers;

/**
 * Выделяет первое число из строки
 *
 * @package Sanitizers
 */
class ToNumberSanitizer implements SanitizerInterface
{
    /**
     * @param string $input
     * @return string
     */
    public function run(string $input): string
    {
        preg_match('/\d+/', $input, $matches);
        return $matches[0] ?? $input;
    }
}