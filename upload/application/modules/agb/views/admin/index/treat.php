<h1>
    <?php if ($this->get('agb') != '') {
        echo $this->getTrans('edit');
    } else {
        echo $this->getTrans('add');
    }
    ?>
</h1>
<form class="form-horizontal" method="POST" action="">
    <?=$this->getTokenField() ?>
    <div class="form-group <?=$this->validation()->hasError('show') ? 'has-error' : '' ?>">
        <div class="col-lg-2 control-label">
            <?=$this->getTrans('show') ?>
        </div>
        <div class="col-lg-4">
            <div class="flipswitch">
                <input type="radio" class="flipswitch-input" id="show-on" name="show" value="1" 
                    <?php if ($this->get('agb') != '' AND $this->get('agb')->getShow() == 1): ?>
                        checked="checked"
                    <?php else: ?>
                        checked="checked"
                    <?php endif; ?> />
                <label for="show-on" class="flipswitch-label flipswitch-label-on"><?=$this->getTrans('yes') ?></label>
                <input type="radio" class="flipswitch-input" id="show-off" name="show" value="0" 
                    <?php if ($this->get('agb') != '' AND $this->get('agb')->getShow() == 0): ?>
                        checked="checked"
                    <?php endif; ?> />
                <label for="show-off" class="flipswitch-label flipswitch-label-off"><?=$this->getTrans('no') ?></label>
                <span class="flipswitch-selection"></span>
            </div>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('title') ? 'has-error' : '' ?>">
        <label for="title" class="col-lg-2 control-label">
            <?=$this->getTrans('title') ?>
        </label>
        <div class="col-lg-4">
            <input type="text"
                   class="form-control"
                   id="title"
                   name="title"
                   value="<?=($this->get('agb') != '') ? $this->escape($this->get('agb')->getTitle()) : $this->originalInput('title') ?>" />
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('text') ? 'has-error' : '' ?>">
        <label for="ck_1" class="col-lg-2 control-label">
            <?=$this->getTrans('text') ?>
        </label>
        <div class="col-lg-10">
            <textarea class="form-control ckeditor"
                      id="ck_1"
                      name="text"
                      toolbar="ilch_html"
                      rows="5"><?=($this->get('agb') != '') ? $this->escape($this->get('agb')->getText()) : $this->originalInput('text') ?></textarea>
        </div>
    </div>
    <?=($this->get('agb') != '') ? $this->getSaveBar('edit') : $this->getSaveBar('add') ?>
</form>
