<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<?php $this->load->view('components/head'); ?>

<body class="fixed-top">
    <?php $this->load->view('components/header'); ?>

    <!-- bof: container -->
    <div class="page-container row-fluid">
        <?php $this->load->view('components/sidebar'); ?>

        <!-- bof: page -->
        <div class="page-content">
            <!-- bof: sample portlet configuration model form -->
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>Widget Settings</h3>
                </div>
                <div class="modal-body">Widget settings form goes here</div>
            </div>
            <!-- eof: sample portlet configuration model form -->

            <!-- bof: page container -->
            <div class="container-fluid">
                <?php $this->load->view($view); ?>
            </div>
            <!-- eof: page container -->
        </div>
        <!-- eof: page -->
    </div>
    <!-- eof: container -->

    <?php $this->load->view('components/footer'); ?>

    <?php $this->load->view('components/tail'); ?>
</body>
</html>
