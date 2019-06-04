<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
        <meta content="" name="author" />
        
        <title><?php echo $this->site_name; ?> | Admin Lock</title>

        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('admin/inc/stylesheet'); ?>
    
        <link href="<?php echo base_url(''); ?>/assets/demo/default/custom/components/lock/lock.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="">
        <div class="page-lock">
            <div class="page-logo">
                <a class="brand" href="index.html">
                    <a href="javascript:;" class="m-brand__logo-wrapper">
                        <img alt="" src="<?php echo base_url();?>assets/demo/default/media/img/logo/logo_default_dark.png"/>
                    </a>
            </div>
            <div class="page-body">
                <div class="lock-head"> Locked </div>
                <div class="lock-body">
                    <div class="lock-cont">
                        <div class="lock-item">
                            <div class="pull-left lock-avatar-block">
                                <img src="<?php if($this->session->userdata('admin_profile_image')!='') echo $this->session->userdata('admin_profile_image'); else echo base_url().ADMIN_IMAGE.'default-user.png' ?>" class="m--img-rounded m--marginless lock-avatar" alt=""/>
                        </div>
                        <div class="lock-item lock-item-full">
                            <form class="lock-form pull-left" action="<?php echo site_url();?>admin/lock/check" method="post">
                                <?php echo validation_errors('<div class="alert alert-danger">', '</div><hr>'); ?>
                                <?php 
                                if($this->session->flashdata('error_msg')){
                                    echo '<div class="alert alert-danger">'.$this->session->flashdata('error_msg').'</div><hr>'; 
                                } ?>
                                <h4><?php echo $this->session->userdata('admin_name'); ?> </h4>
                                <div class="form-group">
                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-blue w-sm waves-effect waves-light">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="lock-bottom">
                    <a href="<?php echo base_url()."admin/lock/login"; ?>">Not <?php echo $this->session->userdata('admin_name'); ?> ?</a>
                </div>
            </div>
            <div class="page-footer-custom"> 2018 &copy; <a href="#" class="m-link">Embarquesoft</a></div>
        </div>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>/assets/demo/default/custom/components/lock/lock.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>