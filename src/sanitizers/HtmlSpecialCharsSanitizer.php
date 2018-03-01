<?php

namespace Sanitizers;

use DI\Annotation\Inject;

/**
 * Преобразует специальные символы в HTML-сущности
 *
 * @package Sanitizers
 */
class HtmlSpecialCharsSanitizer implements SanitizerInterface
{
    /** @var int */
    protected $flags;

    /** @var string */
    protected $encoding;

    /** @var bool */
    protected $doubleEncode;

    /**
     * HtmlSpecialCharsSanitizer constructor.
     *
     * @Inject({"htmlspecialchars.flags", "htmlspecialchars.encoding", "htmlspecialchars.doubleEncode"})
     * @param int $flags
     * @param string $encoding
     * @param bool $doubleEncode
     */
    public function __construct(int $flags = ENT_COMPAT, string $encoding = 'UTF-8', bool $doubleEncode = true)
    {
        $this->flags = $flags;
        $this->encoding = $encoding;
        $this->doubleEncode = $doubleEncode;
    }

    /**
     * @param string $input
     * @return string
     */
    public function run(string $input): string
    {
        return htmlspecialchars($input, $this->flags, $this->encoding, $this->doubleEncode);
    }
}