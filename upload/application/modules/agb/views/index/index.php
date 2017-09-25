<?php if ($this->get('agb') != ''): ?>
    <?php foreach ($this->get('agb') as $agb): ?>
        <h1><b><?=$this->escape($agb->getTitle()) ?></b></h1>
        <p><?=$agb->getText() ?><br /></p>
    <?php endforeach; ?>
<?php else: ?>
    <?=$this->getTrans('noAgb') ?>
<?php endif; ?>
