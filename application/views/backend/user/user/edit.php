<!-- bof: page header -->
<div class="row-fluid">
    <div class="span12">
        <?php $this->load->view('components/style_customize'); ?>

        <!-- bof: page heading -->
        <h3 class="page-title"><?php echo $this->lang->line('heading_title'); ?>
            <small><?php echo $this->lang->line('heading_description'); ?></small>
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
            <?php if (!isset($user)): ?>

                <div class="alert alert-block alert-error fade in">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <h4 class="alert-heading"><?php echo $this->lang->line('error'); ?>!</h4>
                    <p><?php echo $this->lang->line('invalid_input'); ?></p>
                    <p class="pull-right">
                        <a class="btn green"
                           href="<?php echo site_url('user/user/add'); ?>"><?php echo $this->lang->line('add_new_user'); ?></a>
                        <a class="btn blue"
                           href="<?php echo site_url('user/user'); ?>"><?php echo $this->lang->line('manager'); ?></a>
                    </p>

                    <div class="clearfix"></div>
                </div>
            <?php else: ?>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <h4><i class="icon-plus"></i><?php echo $this->lang->line('heading_title'); ?></h4>
                    </div>
                    <div class="portlet-body form">
                        <form id="add_new_user" action="" method="post" class="form-horizontal">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>"/>
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



                            <div class="control-group<?php echo (form_error('name') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $this->lang->line('name'); ?></label>

                                <div class="controls input-icon">
                                    <input type="text" name="name" class="span6 m-wrap"
                                           value="<?php echo set_value('name', $user['name']); ?>"/>
                                    <span class="help-block"><?php echo $this->lang->line('name_desc'); ?></span>
                                </div>
                            </div>


                            <div class="control-group<?php echo (form_error('email') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $this->lang->line('email'); ?></label>

                                <div class="controls input-icon">
                                    <input type="text" name="email" class="span6 m-wrap"
                                           value="<?php echo set_value('email', $user['email']); ?>"/>
                                    <span class="help-block"><?php echo $this->lang->line('email_desc'); ?></span>
                                </div>
                            </div>

                            <div class="control-group<?php echo (form_error('password') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $this->lang->line('password'); ?></label>

                                <div class="controls input-icon">
                                    <input type="password" name="password" class="span6 m-wrap"
                                           value="<?php echo set_value('password', $user['password']); ?>"/>
                                    <span class="help-block"><?php echo $this->lang->line('password_desc'); ?></span>
                                </div>
                            </div>

                            <div class="control-group<?php echo (form_error('password_confirm') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $this->lang->line('password_confirm'); ?></label>

                                <div class="controls input-icon">
                                    <input type="text" name="password_confirm" class="span6 m-wrap"
                                           value=""/>
                                    <span class="help-block"><?php echo $this->lang->line('password_confirm_desc'); ?></span>
                                </div>
                            </div>

                            <div class="control-group<?php echo (form_error('news_letter ') ? ' error' : ''); ?>">
                                <label class="control-label"><?php echo $this->lang->line('news_letter'); ?></label>
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
                                    <?php if ('POST' === @REQUEST_METHOD): ?>
                                        <?php echo form_multiselect('status[]', config_item('status'), $this->input->post('status'), 'id="status" class="span6 select2"'); ?>
                                    <?php else: ?>
                                        <select name="status[]" id="status" class="span6 select2" multiple>
                                            <?php foreach (config_item('status') as $index => $value): ?>
                                                <option
                                                    value="<?php echo $index; ?>"<?php echo ($index & $user['status'] ? ' selected' : ''); ?>><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; ?>
                                    <span class="help-block"
                                          style="clear: both;"><?php echo $this->lang->line('status_desc'); ?></span>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue"><?php echo $this->lang->line('save'); ?></button>
                                <button type="reset" class="btn"><?php echo $this->lang->line('reset'); ?></button>
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