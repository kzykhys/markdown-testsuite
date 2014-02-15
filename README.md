markdown-testsuite
==================

[![Latest Stable Version](https://poser.pugx.org/kzykhys/markdown-testsuite/v/stable.png)](https://packagist.org/packages/kzykhys/markdown-testsuite)
[![Latest Unstable Version](https://poser.pugx.org/kzykhys/markdown-testsuite/v/unstable.png)](https://packagist.org/packages/kzykhys/markdown-testsuite)

After starting the [W3C Community Group about Markdown](http://www.w3.org/community/markdown), a question has been raised a few times about a test suite for the markdown syntax.

I decided to put together a list of individual files isolating some constructs of the markdown syntax. Some features might be missing, you know the deal. Pull Requests are welcome.

Modification by @kzykhys
------------------------

### Helper class for PHP

``` php
<?php

class MarkdownTest extends PHPUnit_Framework_TestCase
{
    public function testParser()
    {
        $parser = new YourParser();

        // test suite based on karlcow/markdown-testsuite
        $tests = new KzykHys\MarkdownTestSuite\Tests();

        foreach ($tests as $pattern) {
            $this->assertEquals(
                $pattern->getOutput(),                   // expected
                $parser->parse($pattern->getMarkdown()), // actual
                $pattern->getName() . ' failed'          // message
            );
        }
    }

    public function testYourPatterns()
    {
        $parser = new YourParser();

        // {name}.md for input and {name}.out for output
        $tests = new KzykHys\MarkdownTestSuite\Tests('/path/to/patterns');

        foreach ($tests as $pattern) {
            $this->assertEquals(
                $pattern->getOutput(),                   // expected
                $parser->parse($pattern->getMarkdown()), // actual
                $pattern->getName() . ' failed'          // message
            );
        }
    }
}
```

composer.json example

``` json
{
    "require-dev": {
        "kzykhys/markdown-testsuite": "dev-master"
    }
}
```
