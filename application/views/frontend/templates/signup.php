<div id="signupModal" class="modal fade" role="dialog" aria-labelledby="signupModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="signupModalLabel"><span class="glyphicon glyphicon-user"></span> Please sign in</h4>
			</div>
			<div class="modal-body">
				<form action="/login" id="frmSignin" class="form-signin" method="post">
					<div class="alert alert-danger hide" role="alert"></div>
					
					<label for="username" class="sr-only">Email address</label>
					<input type="email" id="username" name="username" class="form-control" placeholder="Email address" autofocus="" value="<?php echo get_cookie('username')?get_cookie('username'):''; ?>" />
					<label for="password" class="sr-only">Password</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo get_cookie('password')?$this->encrypt->decode(get_cookie('password')):''; ?>" />
					<label class="checkbox pull-left font12">
						<input type="checkbox" name="remember_me" value="remember-me" <?php echo (get_cookie('username') && get_cookie('password'))?'checked':''; ?> />
						Remember me
					</label>
					<a href="#" class="pull-right need-help font12">Forgot password?</a>
					<span class="clearfix"></span>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					<hr />
					<p class="help-block">Don't have account? <a href="">Sign Up Here</a></p>
				</form>
			</div>
		</div>
	</div>
</div>