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
                    <form id="add_new_category" action="" method="post" class="form-horizontal">
                        <?php if (validation_errors()): ?>
                        <!-- bof: form validation errors -->
                        <div class="alert alert-error">
                            <button class="close" data-dismiss="alert"></button>
                            <span><?php echo $this->lang->line('validation_error'); ?></span>

                            <ul>
                            <?php echo validation_errors('<li>', '</li>'); ?>
                            </ul>
                        </div>
                        <!-- eof: form validation errors -->
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

                        <div class="control-group<?php echo (form_error('css_class') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('css_class'); ?></label>
                            <div class="controls input-icon">
                                <input type="text" name="css_class" class="span6 m-wrap" value="<?php echo set_value('css_class'); ?>" />
                                <span class="help-block"><?php echo $this->lang->line('css_class_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('alias') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('alias'); ?></label>
                            <div class="controls input-icon">
                                <input type="text" name="alias" class="span6 m-wrap" value="<?php echo set_value('alias'); ?>" />
                                <span class="help-block"><?php echo $this->lang->line('alias_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('sort_order') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('sort_order'); ?></label>
                            <div class="controls">
                                <input type="text" name="sort_order" value="<?php echo set_value('sort_order', 0); ?>" class="span6 m-wrap" />
                                <span class="help-block"><?php echo $this->lang->line('sort_order_desc'); ?></span>
                            </div>
                        </div>

                        <div class="control-group<?php echo form_detect_error('description', true); ?>">
                            <label class="control-label"><?php echo $this->lang->line('description'); ?></label>
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
                                            <textarea name="description[<?php echo $language->code; ?>]" class="span12 m-wrap" rows="5"><?php echo set_value('description[' . $language->code . ']'); ?></textarea>
                                            <span class="help-block"><?php echo $this->lang->line('description_desc'); ?></span>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
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