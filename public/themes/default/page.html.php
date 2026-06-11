<?php 

use MolehillCMS\Kernel\TemplateContext;

/** @var TemplateContext $this */ 

?>
<!DOCTYPE html>
<html>

<head>

<?php require('./_head.html.php') ?>

</head>

<body class="page">

    <?php require('./_page.header.html.php') ?>

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