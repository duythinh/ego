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
        <div class="portlet">
            <div class="portlet-title">
                <h4><i class="icon-globe"></i><?php echo $this->lang->line('heading_title'); ?></h4>
            </div>

            <div class="portlet-body">
                <div class="clearfix">
                    <div class="btn-group">
                        <a class="btn green" href="<?php echo site_url('category/category_type/add'); ?>">
                        <i class="icon-plus"></i> Add New
                        </a>

                        <a class="btn red" href="<?php echo site_url('category/category_type/add'); ?>">
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

                <table class="table table-striped table-bordered table-hover table-advance" id="language">
                    <thead>
                        <tr>
                            <th style="width: 8px;"><input type="checkbox" class="group-checkable" data-set="#language .checkboxes" /></th>
                            <th><?php echo $this->lang->line('name'); ?></th>
                            <th class="hidden-480"><?php echo $this->lang->line('description'); ?></th>
                            <th class="hidden-767"><?php echo $this->lang->line('status'); ?></th>
                            <th><?php echo $this->lang->line('action'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!isset($category_types) || 0 === count($category_types)): ?>
                        <tr class="odd gradeX">
                            <td colspan="99"><?php echo $this->lang->line('no_results'); ?></td>
                        </tr>
                        <?php else: foreach ($category_types as $category_type): ?>
                        <tr class="odd gradeX">
                            <td><input type="checkbox" class="checkboxes" value="1" /></td>
                            <td><a href="<?php echo site_url('category/category_type/edit/' . $category_type->alias); ?>"><?php echo $category_type->name; ?></a></td>
                            <td class="hidden-480"><?php echo $category_type->description; ?></td>
                            <td class="hidden-480"><?php echo $category_type->status; ?></td>
                            <td>
                                <a href="<?php echo site_url('category/category_type/edit/' . $category_type->alias); ?>" class="btn blue icn-only tooltips" data-placement="top" data-original-title="<?php echo $this->lang->line('edit'); ?>"><i class="icon-edit icon-white"></i></a>
                                <a href="<?php echo site_url('category/category_type/delete/' . $category_type->alias); ?>" class="btn red icn-only tooltips" data-placement="top" data-original-title="<?php echo $this->lang->line('delete'); ?>"><i class="icon-remove icon-white"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- eof: dashboard stats -->
</div>
<!-- eof: dashboard -->