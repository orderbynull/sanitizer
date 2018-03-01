<?php

namespace Sanitizers;

use DI\Annotation\Inject;

/**
 * Удаляет теги HTML и PHP.
 *
 * @package Sanitizers
 */
class StripTagsSanitizer implements SanitizerInterface
{
    /** @var string */
    protected $allowedTags;

    /**
     * StripTagsSanitizer constructor.
     *
     * @Inject({"stripTags.allowedTags"})
     * @param null|string $allowedTags
     */
    public function __construct(?string $allowedTags = null)
    {
        $this->allowedTags = $allowedTags;
    }

    /**
     * @param string $input
     * @return string
     */
    public function run(string $input): string
    {
        return strip_tags($input, $this->allowedTags);
    }
}