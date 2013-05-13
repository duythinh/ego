<!-- bof: page header -->
<div class="row-fluid">
    <div class="span12">
        <?php $this->load->view('components/style_customize'); ?>
        <!-- bof: page heading -->
        <h3 class="page-title"><?php echo $lang['heading_title']; ?>
            <small><?php echo $lang['heading_description']; ?></small>
        </h3>
        <!-- eof: page heading -->
    </div>
</div>
<!-- eof: page header -->

<!-- bof: dashboard -->
<div id="dashboard">
    <!-- bof: dashboard stats -->
    <div class="row-fluid">
        <div class="span12 responsive">
            <?php if (!isset($language)): ?>

                <div class="alert alert-block alert-error fade in">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <h4 class="alert-heading"><?php echo $lang['error']; ?>!</h4>

                    <p><?php echo $lang['invalid_input']; ?></p>

                    <p class="pull-right">
                        <a class="btn green"
                           href="<?php echo site_url('language/add'); ?>"><?php echo $lang['add_new_language']; ?></a>
                        <a class="btn blue"
                           href="<?php echo site_url('language'); ?>"><?php echo $lang['language_manager']; ?></a>
                    </p>

                    <div class="clearfix"></div>
                </div>
            <?php else: ?>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <h4><i class="icon-plus"></i><?php echo $lang['heading_title']; ?></h4>
                    </div>

                    <div class="portlet-body form">
                        <!-- <h3 class="block">Basic validation states</h3> -->
                        <form id="edit_language" action="" method="post" class="form-horizontal">
                            <input type="hidden" name="id" value="<?php echo $language->id; ?>"/>

                            <?php if (validation_errors()): ?>
                                <div class="alert alert-error">
                                    <button class="close" data-dismiss="alert"></button>
                                    <span><?php echo $lang['validation_error']; ?></span>

                                    <ul>
                                        <?php echo validation_errors('<li>', '</li>'); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="control-group<?php echo (form_error('name') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $lang['language_name']; ?></label>

                                <div class="controls input-icon">
                                    <input type="text" name="name" class="span6 m-wrap"
                                           value="<?php echo set_value('name', $language->name); ?>"/>
                                    <span class="help-block"><?php echo $lang['language_name_desc']; ?></span>
                                </div>
                            </div>

                            <div class="control-group<?php echo (form_error('native_name') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $lang['native_name']; ?></label>

                                <div class="controls input-icon">
                                    <input type="text" name="native_name" class="span6 m-wrap"
                                           value="<?php echo set_value('native_name', $language->native_name); ?>"/>
                                    <span class="help-block"><?php echo $lang['native_name_desc']; ?></span>
                                </div>
                            </div>

                            <div class="control-group<?php echo (form_error('alias') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $lang['alias']; ?></label>

                                <div class="controls input-icon">
                                    <input type="text" name="alias" class="span6 m-wrap"
                                           value="<?php echo set_value('alias', $language->alias); ?>"/>
                                    <span class="help-block"><?php echo $lang['alias_desc']; ?></span>
                                </div>
                            </div>


                            <div class="control-group<?php echo (form_error('sort_order') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $lang['sort_order']; ?></label>

                                <div class="controls">
                                    <input type="text" name="sort_order"
                                           value="<?php echo set_value('sort_order', $language->sort_order); ?>"
                                           class="span6 m-wrap"/>
                                    <span class="help-block"><?php echo $lang['sort_order_desc']; ?></span>
                                </div>
                            </div>

                            <div class="control-group<?php echo (form_error('translable') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $lang['translable']; ?></label>

                                <div class="controls">
                                    <label class="radio"><input type="radio" name="translable"
                                                                value="1"<?php echo set_radio('translable', '1', ('1' === $language->translable ? true : false)); ?> />
                                        Yes</label>
                                    <label class="radio"><input type="radio" name="translable"
                                                                value="0"<?php echo set_radio('translable', '0', ('0' === $language->translable ? true : false)); ?> />
                                        No</label>
                                    <span class="help-block"><?php echo $lang['translable_desc']; ?></span>
                                </div>
                            </div>

                            <div class="control-group<?php echo (form_error('status') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $lang['status']; ?></label>

                                <div class="controls">
                                    <?php if ('POST' === @REQUEST_METHOD): ?>
                                        <?php echo form_multiselect('status[]', config_item('status'), $this->input->post('status'), 'id="status" class="span6 select2"'); ?>
                                    <?php else: ?>
                                        <select name="status[]" id="status" class="span6 select2" multiple>
                                            <?php foreach (config_item('status') as $index => $value): ?>
                                                <option
                                                    value="<?php echo $index; ?>"<?php echo ($index & $language->status ? ' selected' : ''); ?>><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; ?>

                                    <!-- <select name="status[]" id="status" class="span6 select2" multiple>
                                    <option value="1"<?php echo set_select('status[]', '1', true); ?>>Active</option>
                                    <option value="2"<?php echo set_select('status[]', '2', false); ?>>Suppend</option>
                                    <option value="4"<?php echo set_select('status[]', '4', false); ?>>Deleted</option>
                                </select> -->

                                    <span class="help-block"
                                          style="clear: both;"><?php echo $lang['status_desc']; ?></span>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue"><?=$lang['save']?></button>
                                <button type="reset" class="btn"><?=$lang['reset']?></button>
                            </div>
                        </form>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- eof: dashboard stats -->
</div>
<!-- eof: dashboard -->