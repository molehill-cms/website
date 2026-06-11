<?php 

use MolehillCMS\Kernel\TemplateContext;

/** @var TemplateContext $this */ 

?>
<header id="page-header" class="container">
    <nav>
        <ul>
            <li><a href="/"><strong><?= $this->property('site.title') ?></strong></a></li>
        </ul>
        <ul>
            <li><a href="/changelog/">v1.0</a> - Coming Soon!</li>
        </ul>
    </nav>
</header>
