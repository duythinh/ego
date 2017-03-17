<!-- bof: page header -->
<div class="row-fluid">
    <div class="span12">
        <?php $this->load->view('components/style_customize'); ?>
        <!-- bof: page heading -->
        <h3 class="page-title"><?php echo $lang['heading_title']; ?> <small><?php echo $lang['heading_description']; ?></small></h3>
        <!-- eof: page heading -->
    </div>
</div>
<!-- eof: page header -->

<!-- bof: dashboard -->
<div id="dashboard">
    <?php $this->load->view('components/notify'); ?>
</div>
<!-- eof: dashboard -->

<script>url.language = '<?php echo site_url('language'); ?>';</script>