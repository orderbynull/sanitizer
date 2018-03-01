<?php

namespace Sanitizers;

/**
 * Удаляет все служебные символы.
 *
 * @package Sanitizers
 */
class RemoveSymbolsSanitizer implements SanitizerInterface
{
    /**
     * @param string $input
     * @return string
     */
    public function run(string $input): string
    {
        return preg_replace("/[[\[.,\/!@#$%&*()\]]]*/", "", $input);
    }
}