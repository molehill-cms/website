<?php

use FastVolt\Helper\Markdown;
use MolehillCMS\Kernel\ContentRouter;
use MolehillCMS\Kernel\MarkdownProcessor;
use MolehillCMS\Kernel\RequestHandler;
use MolehillCMS\Kernel\TemplateContext;

require_once __DIR__ . '/../vendor/autoload.php';

$requestHandler = new RequestHandler();
$requestHandler->execute();