<?php

namespace KzykHys\MarkdownTestSuite\Iterator;

use KzykHys\MarkdownTestSuite\Pattern;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * @author Kazuyuki Hayashi <hayashi@valnur.net>
 */
class PatternIterator implements \Iterator
{

    private $iterator;

    /**
     * @param $directory
     */
    public function __construct($directory)
    {
        $this->iterator = Finder::create()
            ->in($directory)
            ->ignoreDotFiles(true)
            ->ignoreVCS(true)
            ->files()
            ->name('*.md')
            ->getIterator();

        $this->iterator->next();
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        /* @var SplFileInfo $file */
        $file = $this->iterator->current();

        return new Pattern(
            $file->getRealPath(),
            str_replace('.md', '.out', $file->getRealPath()),
            str_replace('.md', '', $file->getFilename())
        );
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->iterator->next();
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->iterator->key();
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->iterator->valid();
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->iterator->rewind();
    }

}