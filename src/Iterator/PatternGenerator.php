<?php

namespace KzykHys\MarkdownTestSuite\Iterator;

use KzykHys\MarkdownTestSuite\Pattern;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * @author Kazuyuki Hayashi <hayashi@valnur.net>
 */
class PatternGenerator implements \IteratorAggregate
{

    /**
     * @var Finder|SplFileInfo[]
     */
    private $finder;

    /**
     * @param $directory
     */
    public function __construct($directory)
    {
        $this->finder = Finder::create()
            ->in($directory)
            ->ignoreDotFiles(true)
            ->ignoreVCS(true)
            ->files()
            ->name('*.md');
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        foreach ($this->finder as $file) {
            yield new Pattern(
                $file->getRealPath(),
                str_replace('.md', '.out', $file->getRealPath()),
                str_replace('.md', '', $file->getFilename())
            );
        }
    }

}