<?php

namespace Processor;

use Sanitizers\SanitizerInterface;

/**
 * Class Processor.
 *
 * @package Processor
 */
class Processor
{
    const RESULT_KEY_TEXT = 'text';

    /** @var array */
    protected $sanitizers;

    /** @var string */
    protected $data;

    /**
     * Processor constructor.
     */
    public function __construct()
    {
        $this->sanitizers = [];
        $this->data = '';
    }

    /**
     * @param string $input
     */
    public function setInput(string $input): void
    {
        $this->data = $input;
    }

    /**
     * @param SanitizerInterface $sanitizer
     */
    public function chainSanitizer(SanitizerInterface $sanitizer): void
    {
        $this->sanitizers[] = $sanitizer;
    }

    /**
     * @return string
     */
    public function run(): string
    {
        /** @var SanitizerInterface $sanitizer */
        foreach ($this->sanitizers as $sanitizer) {
            $this->data = $sanitizer->run($this->data);
        }

        return $this->data;
    }

    /**
     * @return string
     */
    public function getJobResult(): string
    {
        return json_encode([self::RESULT_KEY_TEXT => $this->data]);
    }
}