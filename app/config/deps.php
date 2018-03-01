<?php

return [
    'stripTags' => DI\autowire(\Sanitizers\StripTagsSanitizer::class),
    'removeSpaces' => DI\autowire(\Sanitizers\SpacesSanitizer::class),
    'replaceSpacesToEol' => DI\autowire(\Sanitizers\SpacesToEolSanitizer::class),
    'htmlspecialchars' => DI\autowire(\Sanitizers\HtmlSpecialCharsSanitizer::class),
    'removeSymbols' => DI\autowire(\Sanitizers\RemoveSymbolsSanitizer::class),
    'toNumber' => DI\autowire(\Sanitizers\ToNumberSanitizer::class)
];