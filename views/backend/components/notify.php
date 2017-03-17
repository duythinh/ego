<!-- bof: dashboard stats -->
<div class="row-fluid">
    <div class="span12 responsive">
        <?php if (! isset($language)): ?>
        <div class="alert alert-block alert-error fade in">
            <button type="button" class="close" data-dismiss="alert"></button>
            <h4 class="alert-heading"><?php echo $this->lang->line('error'); ?>!</h4>
            <p><?php echo $this->lang->line('invalid_input'); ?></p>
            <p class="pull-right">
                <a class="btn green" href="<?php echo site_url('language/add'); ?>"><?php echo $this->lang->line('add_new_language'); ?></a>
                <a class="btn blue" href="<?php echo site_url('language'); ?>"><?php echo $this->lang->line('language_manager'); ?></a>
            </p>

            <div class="clearfix"></div>
        </div>
        <?php else: ?>
        <div class="alert alert-block alert-success fade in">
            <button type="button" class="close" data-dismiss="alert"></button>
            <h4 class="alert-heading"><?php echo $this->lang->line('success'); ?>!</h4>
            <p><?php echo sprintf($this->lang->line('success_message'), $language->name); ?></p>
            <p class="pull-right">
                <a class="btn green" href="<?php echo site_url('language/add'); ?>"><?php echo $this->lang->line('add_new_language'); ?></a>
                <a class="btn blue" href="<?php echo site_url('language'); ?>"><?php echo $this->lang->line('language_manager'); ?></a>
            </p>

            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- eof: dashboard stats -->