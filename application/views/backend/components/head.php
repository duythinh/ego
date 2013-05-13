<!-- bof: head -->
<head>
    <title>eGo Travel | Admin Control Panel</title>

    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="shortcut icon" href="<?php echo base_url('favicon.png'); ?>" />

    <!-- bof: global mandatory styles -->
    <link rel="stylesheet" href="<?php echo res_url('plugins/bootstrap/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo res_url('plugins/bootstrap/css/bootstrap-responsive.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo res_url('plugins/font-awesome/css/font-awesome.css'); ?>" />
    <link rel="stylesheet" href="<?php echo res_url('css/style-metro.css'); ?>" />
    <link rel="stylesheet" href="<?php echo res_url('css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo res_url('css/style-responsive.css'); ?>" />
    <link rel="stylesheet" href="<?php echo res_url('css/themes/default.css'); ?>" />
    <link rel="stylesheet" href="<?php echo res_url('plugins/uniform/css/uniform.default.css'); ?>" />
    <!-- eof: global mandatory styles -->

    <!-- bof: page level styles -->
<?php if ('language/language/add' === $view): ?>
    <link rel="stylesheet" href="<?php echo res_url('plugins/select2/select2_metro.css'); ?>" />


<?php elseif ('language/language/edit' === $view): ?>
    <link rel="stylesheet" href="<?php echo res_url('plugins/select2/select2_metro.css'); ?>" />


<?php elseif ('language/language/index' === $view): ?>
    <link rel="stylesheet" href="<?php echo res_url('plugins/data-tables/DT_bootstrap.css'); ?>" />


<?php elseif ('category/category/add' === $view): ?>
    <link rel="stylesheet" href="<?php echo res_url('plugins/select2/select2_metro.css'); ?>" />
    <link rel="stylesheet" href="<?php echo res_url('plugins/jquery-nestable/jquery.nestable.css'); ?>" />


<?php elseif ('category/category_type/add' === $view): ?>
    <link rel="stylesheet" href="<?php echo res_url('plugins/select2/select2_metro.css'); ?>" />


<?php elseif ('category/category_type/edit' === $view): ?>
    <link rel="stylesheet" href="<?php echo res_url('plugins/select2/select2_metro.css'); ?>" />


<?php endif; ?>
    <!-- eof: page level styles -->

<script>
    var url = {
        base : '<?php echo base_url(); ?>',
        res : '<?php echo RESPATH; ?>'
    }

    var lang = {}
</script>
</head>
<!-- eof: head -->