<?php

namespace MolehillCMS\Kernel;

use MaxBeckers\YamlParser\YamlParser;

class PropertyResolver
{
    public function __construct(
        private string $content_path,
        private array $properties = []
    ) {}

    public function setProperty($name, $value): void
    {
        $this->properties[$name] = $value;
    }

    public function getProperty($name)
    {
        if ($value = @$this->properties[$name]) {
            return $value;
        }

        $name_split = explode('.', $name);

        $yaml = new YamlParser();
        if ($data = $yaml->parseFile(realpath(dirname($this->content_path) . '/_properties.yml'))[0]) {
            while ($data && $name_split) {
                $data = @$data[array_shift($name_split)] ?? '';
            }
            $this->properties[$name] = (string) $data;
            return $data;
        }
    }
}
