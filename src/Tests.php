<?php

namespace KzykHys\MarkdownTestSuite;

use KzykHys\MarkdownTestSuite\Iterator\PatternGenerator;
use KzykHys\MarkdownTestSuite\Iterator\PatternIterator;

/**
 * @author Kazuyuki Hayashi <hayashi@valnur.net>
 */
class Tests implements \IteratorAggregate
{

    /**
     * @var \Traversable
     */
    private $iterator;

    /**
     * @param string $directory
     */
    public function __construct($directory = null)
    {
        if (!$directory) {
            $directory = __DIR__ . '/Resources/markdown';
        }

        if (PHP_MINOR_VERSION >= 5) {
            $this->iterator = new PatternGenerator($directory);
        } else {
            $this->iterator = new PatternIterator($directory);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return $this->iterator;
    }

}