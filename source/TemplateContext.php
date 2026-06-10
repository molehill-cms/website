<?php

namespace MolehillCMS\Core;

class TemplateContext
{
    public function __construct(
        private array $content,
        private PropertyResolver $properties
    ) {}

    public function render()
    {
        chdir($themeDir = $_SERVER['DOCUMENT_ROOT'] . '/themes/' . $this->properties->getProperty('theme'));
        require ($themeDir . '/' . $this->properties->getProperty('template') . '.html.php');
    }

    public function property(?string $propertyName)
    {
        return htmlentities($this->properties->getProperty($propertyName));
    }

    public function href(string $path)
    {
        $path = '/themes/' . $this->properties->getProperty('theme') . '/' . $path;
        while (preg_match('#^(.*?)/[^/]+/\.\./(.*)$#', $path, $matches)) {
            $path = "{$matches[1]}/{$matches[2]}";
        }
        if ($ts = filemtime($_SERVER['DOCUMENT_ROOT'] . $path)) {
            $path = $path . "?ts={$ts}";
        }
        return $path;
    }

    public function content($section = 'main')
    {
        return @$this->content[$section];
    }
};
