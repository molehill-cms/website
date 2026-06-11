<?php

namespace MolehillCMS\Kernel;

use FastVolt\Helper\Markdown;

class MarkdownProcessor
{
    public function process(string $markdown_file, PropertyResolver $properties): array
    {
        $content = [];
        $markdown = file_get_contents($markdown_file);

        foreach (preg_split('#(<!--.*?-->)#s', $markdown, -1, PREG_SPLIT_DELIM_CAPTURE) as $markdown) {
            if ($markdown = trim($markdown)) {
                $markdown = preg_replace_callback('#@\{([^\}]+)\}#', fn($x) => $properties->getProperty($x[1]), $markdown);
                if (preg_match('#^<!--(.*?)-->#s', $markdown, $matches1)) {
                    if (preg_match_all('#@([^:]+):\s*(.*)#', $matches1[1], $matches2)) {
                        foreach ($matches2[1] as $index => $propertyName) {
                            $propertyValue = trim($matches2[2][$index]);
                            $properties->setProperty($propertyName, $propertyValue);
                        }
                    }
                }

                if (!str_starts_with($markdown, '<!--')) {
                    $markdown = preg_replace('#(\[.*?\]\(.*?).md\s*(\))#', '$1/$2', $markdown);

                    // Process the content.
                    $converter = new Markdown();
                    $converter->setContent($markdown);
                    $content[$properties->getProperty('section')] .= $converter->getHtml();
                }
            }
        }
        return $content;
    }
}
