<h1><?=$this->getTrans('manage') ?></h1>
<?php if ($this->get('agbs') != ''): ?>
    <form class="form-horizontal" method="POST" action="">
        <?=$this->getTokenField() ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <colgroup>
                    <col class="icon_width" />
                    <col class="icon_width" />
                    <col class="icon_width" />
                    <col class="icon_width" />
                    <col class="icon_width" />
                    <col />
                </colgroup>
                <thead>
                    <tr>
                        <th><?=$this->getCheckAllCheckbox('check_agbs') ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?=$this->getTrans('title') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->get('agbs') as $agb): ?>
                        <tr>
                            <input type="hidden" name="items[]" value="<?=$agb->getId() ?>" />
                            <td><?=$this->getDeleteCheckbox('check_agbs', $agb->getId()) ?></td>
                            <td><?=$this->getEditIcon(['action' => 'treat', 'id' => $agb->getId()]) ?></td>
                            <td><?=$this->getDeleteIcon(['action' => 'del', 'id' => $agb->getId()]) ?></td>
                            <td>
                                <?php if ($agb->getShow() == 1): ?>
                                    <a href="<?=$this->getUrl(['action' => 'update', 'id' => $agb->getId()], null, true) ?>">
                                        <span class="fa fa-check-square-o text-info"></span>
                                    </a>
                                <?php else: ?>
                                    <a href="<?=$this->getUrl(['action' => 'update', 'id' => $agb->getId()], null, true) ?>">
                                        <span class="fa fa-square-o text-info"></span>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td><i class="fa fa-sort"></i></td>
                            <td><?=$this->escape($agb->getTitle()) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="content_savebox">
            <input type="hidden" class="content_savebox_hidden" name="action" value="" />
            <div class="btn-group dropup">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <?=$this->getTrans('selected') ?> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu listChooser" role="menu">
                    <li><a href="#" data-hiddenkey="delete"><?=$this->getTrans('delete') ?></a></li>
                </ul>
            </div>
            <button type="submit" class="save_button btn btn-default" name="saveAgbs" value="save">
                <?=$this->getTrans('saveButton') ?>
            </button>
        </div>
    </form>
<?php else: ?>
    <?=$this->getTrans('noAgb') ?>
<?php endif; ?>

<script>
    $('table tbody').sortable({
        handle: 'td',
        cursorAt: { left: 15 },
        placeholder: "table-sort-drop",
        forcePlaceholderSize: true,
        'start': function (event, ui) {
            ui.placeholder.html("<td colspan='6'></td>");
            ui.placeholder.height(ui.item.height());
        }
    }).disableSelection();
</script>
