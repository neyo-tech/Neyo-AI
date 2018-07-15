#!/usr/bin/env php
<?php
declare(strict_types=1);
/**
 * Neyo Artificial Intelligence Assistant.
 *
 * @link <https://github.com/neyo-tech/>.
 */

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

$application->run();
