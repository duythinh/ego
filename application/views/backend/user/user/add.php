<!-- bof: page header -->
<div class="row-fluid">
    <div class="span12">
        <?php $this->load->view('components/style_customize'); ?>
        <!-- bof: page heading -->
        <h3 class="page-title"><?php echo $this->lang->line('heading_title'); ?> <small><?php echo $this->lang->line('heading_description'); ?></small></h3>
        <!-- eof: page heading -->
    </div>
</div>
<!-- eof: page header -->

<!-- bof: dashboard -->
<div id="dashboard">
<!-- bof: dashboard stats -->
<div class="row-fluid">
<div class="span12 responsive">
<div class="portlet box blue">
<div class="portlet-title">
    <h4><i class="icon-plus"></i><?php echo $this->lang->line('heading_title'); ?></h4>
</div>

<div class="portlet-body form">
<!-- <h3 class="block">Basic validation states</h3> -->
<form id="add_new_language" action="" method="post" class="form-horizontal">
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <button class="close" data-dismiss="alert"></button>
        <span><?php echo $this->lang->line('validation_error'); ?></span>

        <ul>
            <?php echo validation_errors('<li>', '</li>'); ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" name="id" />
<input type="hidden" name="salt" value="<?php echo rand_string(); ?>" />
<div class="control-group<?php echo (form_error('name') ? ' error' : ''); ?>">
    <label class="control-label"><?php echo $this->lang->line('name'); ?></label>
    <div class="controls input-icon">
        <input type="text" name="name" class="span6 m-wrap" value="<?php echo set_value('name'); ?>" />
        <span class="help-block"><?php echo $this->lang->line('name_desc'); ?></span>
    </div>
</div>

<div class="control-group<?php echo (form_error('email') ? ' error' : ''); ?>">
    <label class="control-label"><?php echo $this->lang->line('email'); ?></label>
    <div class="controls input-icon">
        <input type="text" name="email" class="span6 m-wrap" value="<?php echo set_value('email'); ?>" />
        <span class="help-block"><?php echo $this->lang->line('email_desc'); ?></span>
    </div>
</div>
<div class="control-group<?php echo (form_error('password') ? ' error' : ''); ?>">
    <label class="control-label"><?php echo $this->lang->line('password'); ?></label>
    <div class="controls input-icon">
        <input type="password" name="password" class="span6 m-wrap" value="<?php echo set_value('password'); ?>" />
        <span class="help-block"><?php echo $this->lang->line('password_desc'); ?></span>
    </div>
</div>

<div class="control-group<?php echo (form_error('password_confirm') ? ' error' : ''); ?>">
    <label class="control-label"><?php echo $this->lang->line('password_confirm'); ?></label>
    <div class="controls input-icon">
        <input type="password" name="password_confirm" class="span6 m-wrap" value="<?php echo set_value('password_confirm'); ?>" />
        <span class="help-block"><?php echo $this->lang->line('password_confirm_desc'); ?></span>
    </div>
</div>

<div class="control-group<?php echo (form_error('news_letter ') ? ' error' : ''); ?>">
    <label class="control-label"><?php echo $this->lang->line('news_letter '); ?></label>
    <div class="controls">
        <label class="radio"><input type="radio" name="news_letter " value="1"<?php echo set_radio('news_letter ', '1', false); ?> /> Yes</label>
        <label class="radio"><input type="radio" name="news_letter " value="0"<?php echo set_radio('news_letter ', '0', true); ?> /> No</label>
        <span class="help-block"><?php echo $this->lang->line('news_letter _desc'); ?></span>
    </div>
</div>
<div class="control-group<?php echo (form_error('user_group[id]') ? ' error' : ''); ?>">
    <label class="control-label">User Group</label>
    <div class="controls">
        <select name="user_group[]" id="user_group" class="span6 select2" multiple>
            <option value=""></option>
            <option value="1">Admin</option>
            <option value="2">Mod</option>
            <option value="3">Member</option>
            <option value="4">Guest</option>
        </select>
        <span class="help-block">help block</span>
    </div>
</div>
<div class="control-group<?php echo (form_error('status') ? ' error' : ''); ?>">
    <label class="control-label"><?php echo $this->lang->line('status'); ?></label>
    <div class="controls">
        <?php echo form_multiselect('status[]', config_item('status'), $this->input->post('status'), 'id="status" class="span6 select2"'); ?>
        <span class="help-block" style="clear: both;"><?php echo $this->lang->line('status_desc'); ?></span>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn blue"><?php echo $this->lang->line('add'); ?></button>
    <button type="reset" class="btn"><?php echo $this->lang->line('reset'); ?></button>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- eof: dashboard stats -->
</div>
<!-- eof: dashboard -->