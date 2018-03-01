<?php

use Processor\Processor;
use Fake\Io;

$container = require 'app/bootstrap.php';

$processor = new Processor();

// Т.к предполагается что это будет демон, то приблизительно это может выглядеть так
while (true) {
    // Ожидание данных из очереди. Блокирующий вызов.
    $job = Io::readFromQueue();

    // Передача текста на обработку в цепочку фильтров
    $processor->setInput($job->text);

    // Построение цепочки фильтров
    foreach ($job->methods as $method) {
        $container->has($method) && $processor->chainSanitizer($container->get($method));
    }

    $processor->run();

    // Куда-то как-то сообщаем о результате
    Io::reportJobDone($processor->getJobResult());
}