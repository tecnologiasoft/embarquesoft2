</div>
</div>
<footer class="m-grid__item m-footer ">
   <div class="m-container m-container--fluid m-container--full-height m-page__container">
      <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
         <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
            <span class="m-footer__copyright">
            <?php echo date("Y"); ?> &copy; 
            <a href="#" class="m-link">
            <?php echo $this->site_name; ?>
            </a>
            </span>
         </div>
      </div>
   </div>
</footer>
</div>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/vendors/custom/sweetalert/dist/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jstz.min.js"></script>
<script src="<?php echo base_url();?>assets/js/common.js"></script>
<?php
if (isset ( $js )) {
	foreach ( $js as $alljs ) {
		if (filter_var ( $alljs, FILTER_VALIDATE_URL ) === FALSE) {
			if (file_exists ( 'assets/js/js_for_views/' . $alljs . '.js' )) {
				$path = JS_FILE . 'js_for_views/' . $alljs . '.js';
			} else {
				$path = JS_FILE . $alljs . '.js';
			}
			?>
	<script type="text/javascript" src="<?php echo $path; ?>"></script>
	<?php
		} else {
			?>
	<script type="text/javascript" src="<?php echo $alljs; ?>"></script>
	<?php
		}
	}
}
?>
<script type="text/javascript">
$(document).ready(function(){
 
 $('input[type = "text"],input[type = "password"]').attr('autocomplete','off');
 $('input[type = "text"],input[type = "password"],select,textarea').css('color','blue');
 $('input[type = "text"],input[type = "password"],select,textarea').css('font-weight','bold');
 
    <?php 
    if($function){
      echo $function.'();'; 
    } 
      ?>
      
      
      
    $.validator.messages.required = '<?php echo $this->lang->line('this_field_is_required'); ?>'; 


$('.m-menu__item--submenu').click(function (){
$(this).toggleClass("m-menu__item--open");
e.preventDefault();
});


  
});
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
</div>
</body>
<!-- end::Body -->
</html>