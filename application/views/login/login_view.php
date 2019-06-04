<div class= "pagebackground"></div>
<div class="container">
     
	<div class="d-flex justify-content-center h-100">
		<div class="card login-car">d
			<div class="card-header text-center">
				<h3><?=strtoupper(SITE_TITLE)?></h3>
		
				<p class = "text-white text-uppercase">Sign in to start your session</p>
			</div>
           <div class="clearfix"></div>

			<div class="card-body">
				<div id = "response"></div>
				<?php echo form_open($formAction,'class = "m-login__form m-form"');?>

					

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user-o"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name = "username">
						
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name = "password">
						<input type="hidden" class="form-control" name = "type" value = "<?php echo $type; ?>">
						
					</div>

					<div class="input-group form-group">
							
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user-o"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="company id" name = "company_id">
							
							
						</div>
						
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					
					<div class="form-group text-center m-t-40 m-b-0">
                            <div class="col-xs-12">
                                <button id = "m_login_signin_submit" class="btn btn-block btn-lg text-uppercase app-button" type="submit">Log In</button>
                            </div>
                    </div>
					<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#" class="text-white">Register</a>
				</div>
				
				<?php  echo form_close(); ?>
				<div class="card-footer">
				
			</div>
			</div>
		
		</div>
	</div>
</div>

