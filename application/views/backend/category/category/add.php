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

                        <h3 class="block"><?php echo $this->lang->line('heading_category_type'); ?></h3>

                        <!-- bof: category type -->
                        <div class="tabbable tabbable-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#select_category_type" data-toggle="tab">Select an exists category type</a></li>
                                <li><a href="#create_category_type" data-toggle="tab">Create a new one</a></li>
                            </ul>
                            <div class="tab-content">
                                <!-- bof: select category type -->
                                <div class="tab-pane active" id="select_category_type">
                                    <div class="control-group<?php echo (form_error('category_type[id]') ? ' error' : ''); ?>">
                                        <label class="control-label">Category type</label>
                                        <div class="controls">
                                            <select name="category_type[id]" id="category_type" class="span6 select2">
                                                <option value=""></option>
                                                <option value="1">Tour</option>
                                                <option value="2">News</option>
                                                <option value="3">Cars</option>
                                                <option value="4">Visa</option>
                                            </select>
                                            <span class="help-block">help block</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- eof: select category type -->

                                <!-- bof: create category type -->
                                <div class="tab-pane" id="create_category_type">
                                    <div class="control-group<?php echo (form_error('name') ? ' error' : ''); ?>">
                                        <label class="control-label"><?php echo $this->lang->line('category_type_name'); ?></label>
                                        <div class="controls input-icon">
                                            <div class="tabbable tabbable-custom">
                                                <ul class="nav nav-tabs">
                                                    <?php foreach ($languages as $index => $language): ?>
                                                    <li<?php echo (0 === $index ? ' class="active"' : null); ?>><a href="#tab_category_type_name_<?php echo $language->code; ?>" data-toggle="tab"><i class="icon-picture"></i> <?php echo $language->name; ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>

                                                <div class="tab-content">
                                                    <?php foreach ($languages as $index => $language): ?>
                                                    <div class="tab-pane<?php echo (0 === $index ? ' active' : null); ?>" id="tab_category_type_name_<?php echo $language->code; ?>">
                                                        <input type="text" name="category_type[name][<?php echo $language->code; ?>]" class="span6 m-wrap" value="<?php echo set_value('category_type[name][' . $language->code . ']'); ?>" />
                                                        <span class="help-block"><?php echo $this->lang->line('category_type_name_desc'); ?></span>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group<?php echo (form_error('name') ? ' error' : ''); ?>">
                                        <label class="control-label"><?php echo $this->lang->line('category_type_description'); ?></label>
                                        <div class="controls input-icon">
                                            <div class="tabbable tabbable-custom">
                                                <ul class="nav nav-tabs">
                                                    <?php foreach ($languages as $index => $language): ?>
                                                    <li<?php echo (0 === $index ? ' class="active"' : null); ?>><a href="#tab_category_type_description_<?php echo $language->code; ?>" data-toggle="tab"><i class="icon-picture"></i> <?php echo $language->name; ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>

                                                <div class="tab-content">
                                                    <?php foreach ($languages as $index => $language): ?>
                                                    <div class="tab-pane<?php echo (0 === $index ? ' active' : null); ?>" id="tab_category_type_description_<?php echo $language->code; ?>">
                                                        <textarea name="category_type[description][<?php echo $language->code; ?>]" class="span12 m-wrap" rows="5"><?php echo set_value('category_type[description][' . $language->code . ']'); ?></textarea>
                                                        <span class="help-block"><?php echo $this->lang->line('category_type_description_desc'); ?></span>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- eof: create category type -->
                            </div>
                        </div>
                        <!-- eof: category type -->

                        <h3 class="block"><?php echo $this->lang->line('heading_category_infomation'); ?></h3>
                        <div class="control-group<?php echo (form_error('category_name') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('category_name'); ?></label>
                            <div class="controls input-icon">
                                <div class="tabbable tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        <?php foreach ($languages as $index => $language): ?>
                                        <li<?php echo (0 === $index ? ' class="active"' : null); ?>><a href="#tab_category_name_<?php echo $language->code; ?>" data-toggle="tab"><i class="icon-picture"></i> <?php echo $language->name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <div class="tab-content">
                                        <?php foreach ($languages as $index => $language): ?>
                                        <div class="tab-pane<?php echo (0 === $index ? ' active' : null); ?>" id="tab_category_name_<?php echo $language->code; ?>">
                                            <input type="text" name="category_name[<?php echo $language->code; ?>]" class="span6 m-wrap" value="<?php echo set_value('category_name[' . $language->code . ']'); ?>" />
                                            <span class="help-block"><?php echo $this->lang->line('category_name_desc'); ?></span>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="control-group<?php echo (form_error('name') ? ' error' : ''); ?>">
                            <label class="control-label"><?php echo $this->lang->line('category_description'); ?></label>
                            <div class="controls input-icon">
                                <div class="tabbable tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        <?php foreach ($languages as $index => $language): ?>
                                        <li<?php echo (0 === $index ? ' class="active"' : null); ?>><a href="#tab_category_description_<?php echo $language->code; ?>" data-toggle="tab"><i class="icon-picture"></i> <?php echo $language->name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <div class="tab-content">
                                        <?php foreach ($languages as $index => $language): ?>
                                        <div class="tab-pane<?php echo (0 === $index ? ' active' : null); ?>" id="tab_category_description_<?php echo $language->code; ?>">
                                            <textarea name="category_description[<?php echo $language->code; ?>]" class="span6 m-wrap" rows="4"><?php echo set_value('category_description[' . $language->code . ']'); ?></textarea>
                                            <span class="help-block"><?php echo $this->lang->line('category_description_desc'); ?></span>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="block"><?php echo $this->lang->line('heading_category_sort_and_hierachy'); ?></h3>
                        <div class="portlet-body">
                            <ol class="sortable dd-list">
                                <li class="dd-item"><div class="dd-handle">Some content</div></li>
                                <li class="dd-item mjs-nestedSortable-branch mjs-nestedSortable-collapsed">
                                    <div class="dd-handle">Some content</div>
                                    <ol class="dd-list">
                                        <li class="dd-item"><div class="dd-handle">Some sub-item content</div></li>
                                        <li class="dd-item"><div class="dd-handle">Some sub-item content</div></li>
                                    </ol>
                                </li>
                                <li class="dd-item"><div class="dd-handle">Some content</div></li>
                            </ol>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn blue"><?=$lang['add']?></button>
                            <button type="reset" class="btn"><?=$lang['reset']?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- eof: dashboard stats -->
</div>
<!-- eof: dashboard -->