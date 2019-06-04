
<!--begin::Base Scripts -->
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!-- geocomplete -->
<script src="<?php echo base_url();?>assets/js/jquery.geocomplete.js"></script>
<script src="<?php echo base_url();?>assets/vendors/custom/sweetalert/dist/sweetalert2.min.js"></script>

<!--  Get browser's timezone  -->
<script src="<?php echo base_url();?>assets/js/jstz.min.js"></script>

<!--end::Base Scripts -->
<script type="text/javascript">
    function check_logout() 
    {
        swal({   
            title: "Are you sure",   
            text: "you want to logout ?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#B92D2E",   
            confirmButtonText: "YES",  
            cancelButtonText: "NO"
        }).then(function () {

            var url = '<?php echo site_url();?>vendor/login/logout';
            window.location.href = url;
        });
    }
</script>  
<?php if($this->session->tempdata('succ_msg1')){ ?>
    <script type="text/javascript">
        swal({   
            title: "",   
            html: "<?php echo trim($this->session->tempdata('succ_msg1')); ?>",   
            type: "success",  
           //timer: 4000, 
            confirmButtonColor: '#34bfa3',
            
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
        confirmButtonColor: '#34bfa3',
        
    });
</script>
<?php } ?>
<?php if($this->session->flashdata('err_msg1')){ ?>
<script type="text/javascript">swal({
  title: '',
  html: '<?php echo trim($this->session->flashdata('err_msg1')); ?>',
  type: 'error',
      //timer: 4000, 
      confirmButtonColor: '#B92D2E',
  })
</script>
<?php } ?>
<?php if($this->session->tempdata('err_msg1')){ ?>
<script type="text/javascript">swal({   
title: "",   
html: "<?php echo trim($this->session->tempdata('err_msg1')); ?>",   
type: "error", 
        //timer: 4000, 
        confirmButtonColor: '#B92D2E',
        
    });
</script>
<?php $this->session->unset_tempdata('err_msg1'); } ?>
<?php 
    if(isset($_SESSION['err_msg1'])){
        unset($_SESSION['err_msg1']);
    }
?>
<script type="text/javascript">

    /* change language */
    function switchLang(lang){
        alert(232);
        $.ajax({
            url: "<?php echo base_url() . 'company/languageSwitcher/switchLang/' ?>"+lang,
            type: "POST",
            data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>' },
            catch : false,
            success: function (data) {
                location.reload();
            }
        });
    }

    /* Document ready */
    $(document).ready(function(){

        //Get browser timezone & set it
        var timezone = jstz.determine();
        var url = '<?php echo site_url();?>company/dashboard/set_timezone';
        $.ajax({
            type: "GET",
            url: url,
            data: {
                "timezone":timezone.name(),
            },
            success:function(results)
            {   
                
            }
        });
    });
</script>