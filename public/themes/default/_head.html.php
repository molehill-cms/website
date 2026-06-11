<?php 

use MolehillCMS\Kernel\TemplateContext;

/** @var TemplateContext $this */ 

?>
<meta charset="utf-8">

<title><?= $this->property('meta.title') ?></title>
<meta name="description" content="<?= $this->property('meta.description') ?>" />
<meta name="keywords" content="<?= $this->property('meta.keywords') ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?= $this->href('../../thirdparty/picocss/css/pico.min.css') ?>" />
<link rel="stylesheet" href="<?= $this->href('./css/styles.css') ?>" />
<meta name="color-scheme" content="light dark">
