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
<div class="control-group<?php echo form_detect_error('name', true); ?>">
    <label class="control-label required"><?php echo $this->lang->line('name'); ?></label>
    <div class="controls">
        <div class="tabbable tabbable-custom">
            <ul class="nav nav-tabs">
                <?php foreach ($this->lang->get() as $language): ?>
                    <li<?php echo ($this->session->get('language')->id == $language->id ? ' class="active"' : null); ?>><a href="#tab_category_type_name_<?php echo $language->code; ?>" data-toggle="tab"><i class="icon-picture"></i> <?php echo $language->name; ?></a></li>
                <?php endforeach; ?>
            </ul>

            <div class="tab-content">
                <?php foreach ($this->lang->get() as $language): ?>
                    <div class="tab-pane<?php echo ($this->session->get('language')->id == $language->id ? ' active' : null); ?>" id="tab_category_type_name_<?php echo $language->code; ?>">
                        <input type="text" name="name[<?php echo $language->code; ?>]" class="span6 m-wrap" value="<?php echo set_value('name[' . $language->code . ']'); ?>" />
                        <span class="help-block"><?php echo $this->lang->line('name_desc'); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="control-group<?php echo form_detect_error('description', true); ?>">
<label class="control-label required"><?php echo $this->lang->line('description'); ?></label>
<div class="controls">
    <div class="tabbable tabbable-custom">
        <ul class="nav nav-tabs">
            <?php foreach ($this->lang->get() as $language): ?>
                <li<?php echo ($this->session->get('language')->id == $language->id ? ' class="active"' : null); ?>><a href="#tab_category_type_description_<?php echo $language->code; ?>" data-toggle="tab"><i class="icon-picture"></i> <?php echo $language->name; ?></a></li>
            <?php endforeach; ?>
        </ul>

        <div class="tab-content">
            <?php foreach ($this->lang->get() as $language): ?>
                <div class="tab-pane<?php echo ($this->session->get('language')->id == $language->id ? ' active' : null); ?>" id="tab_category_type_description_<?php echo $language->code; ?>">
                    <input type="text" name="description[<?php echo $language->code; ?>]" class="span6 m-wrap" value="<?php echo set_value('description[' . $language->code . ']'); ?>" />
                    <span class="help-block"><?php echo $this->lang->line('description_desc'); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>

<div class="control-group<?php echo form_detect_error('content', true); ?>">
    <label class="control-label required"><?php echo $this->lang->line('content'); ?></label>
    <div class="controls">
        <div class="tabbable tabbable-custom">
            <ul class="nav nav-tabs">
                <?php foreach ($this->lang->get() as $language): ?>
                    <li<?php echo ($this->session->get('language')->id == $language->id ? ' class="active"' : null); ?>><a href="#tab_topic_content_<?php echo $language->code; ?>" data-toggle="tab"><i class="icon-picture"></i> <?php echo $language->name; ?></a></li>
                <?php endforeach; ?>
            </ul>

            <div class="tab-content">
                <?php foreach ($this->lang->get() as $language): ?>
                    <div class="tab-pane<?php echo ($this->session->get('language')->id == $language->id ? ' active' : null); ?>" id="tab_topic_content_<?php echo $language->code; ?>">
                        <input type="text" name="content[<?php echo $language->code; ?>]" class="span6 m-wrap" value="<?php echo set_value('content[' . $language->code . ']'); ?>" />
                        <span class="help-block"><?php echo $this->lang->line('content_desc'); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!--<div class="control-group<?php /*echo (form_error('description') ? ' error' : ''); */?>">
    <label class="control-label"><?php /*echo $this->lang->line('description'); */?></label>
    <div class="controls input-icon">
        <input type="text" name="description" class="span6 m-wrap" value="<?php /*echo set_value('description'); */?>" />
        <span class="help-block"><?php /*echo $this->lang->line('description_desc'); */?></span>
    </div>
</div>-->
<!--<div class="control-group<?php /*echo (form_error('content') ? ' error' : ''); */?>">
    <label class="control-label"><?php /*echo $this->lang->line('content'); */?></label>
    <div class="controls input-icon">
        <input type="text" name="content" class="span6 m-wrap" value="<?php /*echo set_value('content'); */?>" />
        <span class="help-block"><?php /*echo $this->lang->line('content_desc'); */?></span>
    </div>
</div>-->
<div class="control-group<?php echo (form_error('category[id]') ? ' error' : ''); ?>">
    <label class="control-label">Category</label>
    <div class="controls">
        <select name="category[]" id="category" class="span6 select2" multiple>
            <option value="1">Travel</option>
            <option value="2">New</option>
            <option value="3">Topic</option>
            <option value="4">Contact</option>
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