<?php

namespace Psr\Log;

/**
 * Class AbstractLogger
 * @package Psr\Log
 */
abstract class AbstractLogger implements LoggerInterface
{
    use LoggerTrait;
}
