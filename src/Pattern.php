<?php

namespace KzykHys\MarkdownTestSuite;

/**
 * @author Kazuyuki Hayashi <hayashi@valnur.net>
 */
class Pattern
{

    /**
     * @var string
     */
    private $markdown;

    /**
     * @var string
     */
    private $output;

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $markdown The path to *.md
     * @param string $output   The path to *.out
     * @param string $name     The name of the test
     */
    public function __construct($markdown, $output, $name)
    {
        $this->markdown = $markdown;
        $this->output = $output;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMarkdown()
    {
        return file_get_contents($this->markdown);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return file_get_contents($this->output);
    }

} 