<?php

namespace Sanitizers;

/**
 * Interface SanitizerInterface
 *
 * @package Sanitizers
 */
interface SanitizerInterface
{
    /**
     * @param string $input
     * @return string
     */
    public function run(string $input): string;
}