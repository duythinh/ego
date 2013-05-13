
<!-- bof: core plugins -->
<script src="<?php echo res_url('plugins/jquery-1.8.3.min.js'); ?>"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo res_url('plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'); ?>"></script>
<script src="<?php echo res_url('plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--[if lt IE 9]>
<script src="<?php echo res_url('plugins/excanvas.js'); ?>"></script>
<script src="<?php echo res_url('plugins/respond.js'); ?>"></script>
<![endif]-->
<script src="<?php echo res_url('plugins/breakpoints/breakpoints.js'); ?>"></script>
<!-- IMPORTANT! jquery.slimscroll.min.js depends on jquery-ui-1.10.1.custom.min.js -->
<script src="<?php echo res_url('plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<script src="<?php echo res_url('plugins/jquery.blockui.js'); ?>"></script>
<script src="<?php echo res_url('plugins/jquery.cookie.js'); ?>"></script>
<script src="<?php echo res_url('plugins/uniform/jquery.uniform.min.js'); ?>"></script>
<!-- eof: core plugins -->


<!-- bof: global mandatory scripts -->
<script src="<?php echo res_url('scripts/app.js'); ?>"></script>

<script>jQuery(document).ready(function() { App.init(); });</script>
<!-- eof: global mandatory scripts -->


<!-- bof: page level plugins -->
<?php if ('language/language/add' === $view): ?>
<script src="<?php echo res_url('plugins/select2/select2.min.js'); ?>"></script>

<script src="<?php echo res_url('scripts/language/language/add.js'); ?>"></script>


<?php elseif ('language/language/edit' === $view): ?>
<script src="<?php echo res_url('plugins/select2/select2.min.js'); ?>"></script>

<script src="<?php echo res_url('scripts/language/language/edit.js'); ?>"></script>


<?php elseif ('language/language/delete' === $view): ?>
<script src="<?php echo res_url('scripts/language/language/delete.js'); ?>"></script>


<?php elseif ('language/language/index' === $view): ?>
<script src="<?php echo res_url('plugins/data-tables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo res_url('plugins/data-tables/DT_bootstrap.js'); ?>"></script>

<script src="<?php echo res_url('scripts/language/language/index.js'); ?>"></script>


<?php elseif ('category/category/add' === $view): ?>
<script src="<?php echo res_url('plugins/select2/select2.min.js'); ?>"></script>
<script src="<?php echo res_url('plugins/jquery-nestable/jquery.nestable.js'); ?>"></script>
<script src="<?php echo res_url('plugins/nestedSortable/nestedSortable.js'); ?>"></script>

<script src="<?php echo res_url('scripts/category/category/add.js'); ?>"></script>


<?php elseif ('category/category_type/add' === $view): ?>
<script src="<?php echo res_url('plugins/select2/select2.min.js'); ?>"></script>

<script src="<?php echo res_url('scripts/category/category_type/add.js'); ?>"></script>


<?php elseif ('category/category_type/edit' === $view): ?>
<script src="<?php echo res_url('plugins/select2/select2.min.js'); ?>"></script>

<script src="<?php echo res_url('scripts/category/category_type/edit.js'); ?>"></script>


<?php endif; ?>
<!-- eof: page level plugins -->


<!-- bof: google analytics -->
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-37564768-1']);
    _gaq.push(['_setDomainName', 'keenthemes.com']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<!-- eof: google analytics -->
