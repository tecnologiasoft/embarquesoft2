
<!--begin::Base Scripts -->
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/vendors/custom/sweetalert/dist/sweetalert2.min.js"></script>
<!-- geocomplete -->
<script src="<?php echo base_url();?>assets/js/jquery.geocomplete.js"></script>
<!--end::Base Scripts -->
<script type="text/javascript">
    $(document).ready(function(){
                //$('form').parsley();
            });

    function check_logout() 
    {
        swal({   
            title: "Are you sure",   
            text: "you want to logout ?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#36A3F7",   
            confirmButtonText: "YES",  
            cancelButtonText: "NO"
        }).then(function () {

            var url = '<?php echo site_url();?>admin/login/logout';
            window.location.href = url;
        });
    }
</script>  
<?php if($this->session->tempdata('succ_msg1')){ ?>
<script type="text/javascript">swal({   
    title: "",   
    html: "<?php echo trim($this->session->tempdata('succ_msg1')); ?>",   
    type: "success",  
                    //timer: 4000, 
                    confirmButtonColor: '#36A3F7',
                    
                });
            </script>
            <?php } $this->session->unset_tempdata('succ_msg1'); ?>
            <?php 
            if($this->session->flashdata('succ_msg1')){ ?>
            <script type="text/javascript">swal({   
                title: "",   
                html: "<?php echo trim($this->session->flashdata('succ_msg1')); ?>",   
                type: "success",  
                    //timer: 4000, 
                    confirmButtonColor: '#36A3F7',
                    
                });
            </script>
            <?php } ?>
            <?php if($this->session->flashdata('err_msg1')){ ?>
            <script type="text/javascript">swal({
              title: '',
              html: '<?php echo trim($this->session->flashdata('err_msg1')); ?>',
              type: 'error',
                  //timer: 4000, 
                  confirmButtonColor: '#36A3F7',
              })
          </script>
          <?php } ?>
          <?php if($this->session->tempdata('err_msg1')){ ?>
          <script type="text/javascript">swal({   
            title: "",   
            html: "<?php echo trim($this->session->tempdata('err_msg1')); ?>",   
            type: "error", 
                    //timer: 4000, 
                    confirmButtonColor: '#36A3F7',
                    
                });
            </script>
            <?php $this->session->unset_tempdata('err_msg1'); } ?>