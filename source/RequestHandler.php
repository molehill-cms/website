<?php

namespace MolehillCMS\Core;

class RequestHandler
{
    function execute()
    {
        $router = new ContentRouter();
        $content_path = $router->locate($_SERVER['REQUEST_URI']);

        $properties = new PropertyResolver($content_path);

        $markdown = new MarkdownProcessor();
        $content = $markdown->process($content_path, $properties);

        $template = new TemplateContext($content, $properties);
        $template->render();
    }
}
