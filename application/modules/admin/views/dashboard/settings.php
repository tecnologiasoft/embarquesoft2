<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <title>OppDoor</title>
    <?php   $this->load->view('admin/inc/stylesheet');  ?>
</head>
<body class="fixed-left">
    <div id="wrapper">
        <?php   $this->load->view('admin/inc/header');  ?>
        <?php  $data['pagename'] = ""; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?>
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">Settings</h4>
                            <ol class="breadcrumb">
                                <li> <a href="<?php echo site_url();?>admin/dashboard">Home</a> </li>
                                <li class="active"> Settings </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card-box">
                                <h3 class="m-t-0 page-header text-center"><b>Settings</b></h3>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-3">

                                        <form class="form-horizontal group-border-dashed" method="post" id="edit_settings" name="edit_settings" enctype="multipart/form-data" action="<?php echo site_url('admin/dashboard/settings');?>" data-parsley-validate novalidate>

                                            <div class="form-group">
                                                <label class="col-md-2">Reapply Days</label>
                                                <div class="col-md-4">
                                                    <input id="apply_days" name="apply_days" type="text" parsley-trigger="change" required data-parsley-type="number" placeholder="Enter apply days" class="form-control" value="<?php if(isset($result['apply_days'])) echo $result['apply_days']; ?>">
                                                    <?php echo form_error('apply_days'); ?>
                                                </div>
                                            </div>

                                           
                                            
                                            <div class="form-group m-b-0">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    <button name="edit_settings" class="btn btn-default waves-effect waves-light" type="submit" value="update">Update</button>
                                                    <a onclick="history.go(-1)" class="btn btn-default waves-effect waves-light m-l-5">Back</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('admin/inc/footer');  ?>
        </div>
        <?php $this->load->view('admin/inc/right-bar');  ?>
    </div>
    <?php $this->load->view('admin/inc/scripts');  ?> 
    
</body>

</html>