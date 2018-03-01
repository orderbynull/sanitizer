<?php

namespace Fake;

/**
 * Class Io.
 *
 * @package Fake
 */
class Io
{
    /**
     * @return \stdClass
     */
    public static function readFromQueue(): \stdClass
    {
        $job = '{"job": {"text": "Привет, мне на <a href=\"test@test.ru\">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!","methods": ["stripTags", "removeSpaces", "replaceSpacesToEol", "htmlspecialchars", "removeSymbols", "toNumber"]}}';
        sleep(1);
        $parsed = json_decode($job);
        return $parsed->job;
    }

    /**
     * @param string $filtered
     */
    public static function reportJobDone(string $filtered): void
    {
        printf("%s \n", $filtered);
    }
}