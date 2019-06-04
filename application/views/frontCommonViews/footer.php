<section>
  

</section>
</body>
<script src = "<?php echo JS_FILE; ?>common.js"></script>
<script src = "<?php echo SITE_URL; ?>assets/vendors/base/vendors.bundle.js"></script>
<script src = "<?php echo SITE_URL; ?>assets/demo/default/base/scripts.bundle.js"></script>


<script type="text/javascript">
 
         
            
         

            $("#m_login_signin_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
						company_id: {
                            required: !0
                        },
                        username: {
                            required: !0
                        },
                        password: {
                            required: !0
                        }
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), 
                    t.ajaxSubmit({
					url: "<?php echo SITE_URL; ?>company/login/signin",
                    success: function(e, r, n, l) {
                        var Obj = JSON.parse(e);
                        if(Obj.is_data == "1")
                        {
                           var url = '<?php echo SITE_URL.'company/customer'; ?>';
                            window.location.href = url;
                        }else{
                            let getMessage = message('danger','inccorect username and password');

                            $("#response").html(getMessage);
                            $("#m_login_signin_submit").prop('disabled',false);
                            
						}
						return false;
                    }
                }))
            });
		
            
        </script>

 <!--begin::Page Snippets -->
 
</html>
