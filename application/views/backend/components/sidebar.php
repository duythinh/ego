<!-- bof: sidebar -->
<div class="page-sidebar nav-collapse collapse">
    <ul>
        <!-- bof: sidebar toggler -->
        <li><div class="sidebar-toggler hidden-phone"></div></li>
        <!-- eof: sidebar toggler -->

        <!-- bof: dashboard -->
        <li<?php echo (isset($active['dashboard']) ? ' class="active"' : null); ?>>
            <a href="<?php echo site_url('dashboard'); ?>"><i class="icon-home"></i> <span class="title"><?php echo $this->lang->line('dashboard'); ?></span><?php echo (isset($active['dashboard']) ? '<span class="selected"></span>' : null); ?></a>
        </li>
        <!-- eof: dashboard -->

        <!-- bof: configuration -->
        <li<?php echo (isset($active['configuration']) ? ' class="active"' : null); ?>>
            <a href="<?php echo site_url('configuration'); ?>"><i class="icon-folder-open"></i> <span class="title"><?php echo $this->lang->line('configuration'); ?></span><span class="arrow<?php echo (isset($active['configuration']) ? ' open"></span><span class="selected' : null); ?>"></span></a>

            <ul class="sub-menu">
                <li><a href="<?php echo site_url('configuration/general_settings'); ?>"><i class="icon-cogs"></i> <?php echo $this->lang->line('general_settings'); ?></a></li>
                <li><a href="<?php echo site_url('configuration/local'); ?>"><i class="icon-calendar"></i> <?php echo $this->lang->line('local'); ?></a></li>
                <li><a href="<?php echo site_url('configuration/options'); ?>"><i class="icon-wrench"></i> <?php echo $this->lang->line('options'); ?></a></li>
                <li><a href="<?php echo site_url('configuration/contact'); ?>"><i class="icon-envelope"></i> <?php echo $this->lang->line('contact_details'); ?></a></li>
                <li><a href="<?php echo site_url('configuration/server'); ?>"><i class="icon-cloud"></i> <?php echo $this->lang->line('server'); ?></a></li>
            </ul>
        </li>
        <!-- eof: configuration -->

        <!-- bof: language and phrases -->
        <li<?php echo (isset($active['language']) ? ' class="active"' : null); ?>>
            <a href="<?php echo site_url('language'); ?>"><i class="icon-folder-open"></i> <span class="title"><?php echo $this->lang->line('language_and_phrase'); ?></span><span class="arrow<?php echo (isset($active['language']) ? ' open"></span><span class="selected' : null); ?>"></span></a>

            <ul class="sub-menu">
                <li<?php echo (isset($active['language/index']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('language'); ?>"><i class="icon-cogs"></i> <?php echo $this->lang->line('language_manager'); ?></a></li>
                <li<?php echo (isset($active['language/add']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('language/add'); ?>"><i class="icon-plus"></i> <?php echo $this->lang->line('add_new_language'); ?></a></li>
            </ul>
        </li>
        <!-- eof: language and phrases -->

        <!-- bof: category -->
        <li<?php echo (isset($active['category']) || isset($active['category_type']) ? ' class="active"' : null); ?>>
            <a href="<?php echo site_url('category'); ?>"><i class="icon-folder-open"></i> <span class="title"><?php echo $this->lang->line('categories'); ?></span><span class="arrow<?php echo (isset($active['category']) || isset($active['category_type']) ? ' open"></span><span class="selected' : null); ?>"></span></a>

            <ul class="sub-menu">
                <li<?php echo (isset($active['category/category_type/index']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('category/category_type'); ?>"><i class="icon-cogs"></i> <?php echo $this->lang->line('category_type_manager'); ?></a></li>
                <li<?php echo (isset($active['category/category_type/add']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('category/category_type/add'); ?>"><i class="icon-plus"></i> <?php echo $this->lang->line('add_new_category_type'); ?></a></li>

                <li<?php echo (isset($active['category/index']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('category'); ?>"><i class="icon-cogs"></i> <?php echo $this->lang->line('category_manager'); ?></a></li>
                <li<?php echo (isset($active['category/add']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('category/add'); ?>"><i class="icon-plus"></i> <?php echo $this->lang->line('add_new_category'); ?></a></li>
            </ul>
        </li>
        <!-- eof: category -->

        <!-- bof: user -->
        <li<?php echo (isset($active['user']) || isset($active['user_group']) ? ' class="active"' : null); ?>>
            <a href="<?php echo site_url('user'); ?>"><i class="icon-folder-open"></i> <span class="title"><?php echo $this->lang->line('user'); ?></span><span class="arrow<?php echo (isset($active['user']) || isset($active['user_group']) ? ' open"></span><span class="selected' : null); ?>"></span></a>

            <ul class="sub-menu">
                <li<?php echo (isset($active['user/user_group/index']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('user/user_group'); ?>"><i class="icon-cogs"></i> <?php echo $this->lang->line('user_group_manager'); ?></a></li>
                <li<?php echo (isset($active['user/user_group/add']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('user/user_group/add'); ?>"><i class="icon-plus"></i> <?php echo $this->lang->line('add_new_user_group'); ?></a></li>

                <li<?php echo (isset($active['user/user/index']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('user/user'); ?>"><i class="icon-cogs"></i> <?php echo $this->lang->line('user_manager'); ?></a></li>
                <li<?php echo (isset($active['user/user/add']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('user/add'); ?>"><i class="icon-plus"></i> <?php echo $this->lang->line('add_new_user'); ?></a></li>
            </ul>
        </li>
        <!-- eof: user -->

        <!-- bof: user -->
        <li<?php echo (isset($active['topic']) || isset($active['topic']) ? ' class="active"' : null); ?>>
            <a href="<?php echo site_url('topic'); ?>"><i class="icon-folder-open"></i>
                <span class="title"><?php echo $this->lang->line('topic'); ?></span><span class="arrow<?php echo (isset($active['topic']) || isset($active['topic']) ? ' open"></span><span class="selected' : null); ?>"></span></a>

            <ul class="sub-menu">
                <li<?php echo (isset($active['topic/topic/index']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('topic/topic'); ?>"><i class="icon-cogs"></i> <?php echo $this->lang->line('topic_manager'); ?></a></li>
                <li<?php echo (isset($active['topic/topic/add']) ? ' class="active"' : null); ?>><a href="<?php echo site_url('topic/add'); ?>"><i class="icon-plus"></i> <?php echo $this->lang->line('add_new_topic'); ?></a></li>
            </ul>
        </li>
        <!-- eof: user -->
    </ul>
</div>
<!-- eof: sidebar -->
