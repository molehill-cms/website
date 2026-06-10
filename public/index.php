<?php

use FastVolt\Helper\Markdown;
use MolehillCMS\Core\ContentRouter;
use MolehillCMS\Core\MarkdownProcessor;
use MolehillCMS\Core\RequestHandler;
use MolehillCMS\Core\TemplateContext;

require_once __DIR__ . '/../vendor/autoload.php';

$requestHandler = new RequestHandler();
$requestHandler->execute();