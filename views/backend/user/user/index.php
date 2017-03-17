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
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet">
            <div class="portlet-title">
                <h4><i class="icon-globe"></i><?php echo $this->lang->line('heading_title'); ?></h4>
            </div>

            <div class="portlet-body">
                <div class="clearfix">
                    <div class="btn-group">
                        <a class="btn green" href="<?php echo site_url('user/add'); ?>">
                        <i class="icon-plus"></i> Add New
                        </a>

                        <a class="btn red" href="<?php echo site_url('user/add'); ?>">
                        <i class="icon-trash"></i> Delete Selected
                        </a>
                    </div>

                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover table-advance" id="user">
                    <thead>
                        <tr>
                            <th style="width: 8px;"><input type="checkbox" class="group-checkable" data-set="#user .checkboxes" /></th>
                            <th class="hidden-480"><?php echo $this->lang->line('name'); ?></th>
                            <th class="hidden-480"><?php echo $this->lang->line('email'); ?></th>
                            <th class="hidden-480"><?php echo $this->lang->line('news_letter'); ?></th>
                            <th class="hidden-767"><?php echo $this->lang->line('status'); ?></th>
                            <th><?php echo $this->lang->line('action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!isset($users) || 0 === count($users)): ?>
                        <tr class="odd gradeX">
                            <td colspan="99"><?php echo $this->lang->line('no_results'); ?></td>
                        </tr>
                        <?php else: foreach ($users as $user): ?>
                        <tr class="odd gradeX">
                            <td><input type="checkbox" class="checkboxes" value="1" /></td>
                            <td><a href="<?php echo site_url('user/edit/' . $user->name); ?>"><?php echo $user->name; ?></a></td>
                            <td class="hidden-480"><?php echo $user->email; ?></td>
                            <td class="hidden-480"><?php echo $user->news_letter; ?></td>
                            <td class="hidden-480"><?php echo $user->status; ?></td>
                            <td>
                                <a href="<?php echo site_url('user/edit/' . $user->name); ?>" class="btn blue icn-only tooltips" data-placement="top" data-original-title="<?php echo $this->lang->line('edit'); ?>"><i class="icon-edit icon-white"></i></a>
                                <a href="<?php echo site_url('user/delete/' . $user->name); ?>" class="btn red icn-only tooltips" data-placement="top" data-original-title="<?php echo $this->lang->line('delete'); ?>"><i class="icon-remove icon-white"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    <!-- eof: dashboard stats -->
</div>
<!-- eof: dashboard -->