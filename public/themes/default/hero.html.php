<?php 

use MolehillCMS\Core\TemplateContext;

/** @var TemplateContext $this */ 

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title><?= $this->property('meta.title') ?></title>
    <meta name="description" content="<?= $this->property('meta.description') ?>" />
    <meta name="keywords" content="<?= $this->property('meta.keywords') ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= $this->href('../../thirdparty/picocss/css/pico.min.css') ?>" />
    <link rel="stylesheet" href="<?= $this->href('./css/styles.css') ?>" />
    <meta name="color-scheme" content="light dark">

</head>

<body class="hero">

    <header id="page-header" class="container">
        <nav>
            <ul>
                <li><a href="/"><strong><?= $this->property('site.title') ?></strong></a></li>
            </ul>
            <ul>
                <li>v1.0 - Coming Soon!</li>
            </ul>
        </nav>
    </header>

    <main id="page-main">

        <?php if ($content = $this->content('hero')): ?>
        <section class="hero">
            <div class="container">
                <?= $content ?>
            </div>
        </section>
        <?php endif; ?>

        <?php if ($content = $this->content('main')): ?>
        <section class="main">
            <div class="container">
                <?= $content ?>
            </div>
        </section>
        <?php endif; ?>

    </main>

    <footer id="page-footer" class="container"></footer>

</body>

</html>