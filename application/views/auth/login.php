<div id="message" data-type="<?= $this->session->flashdata('message')['type']; ?>" data-text="<?= $this->session->flashdata('message')['text']; ?> "></div>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" class="login100-form validate-form" action="<?= base_url('auth') ?>">
					<diV>
						<li class="login100-form-title p-b-20"><a href="#">
								<img width="90px" src="<?= base_url().'assets/images/icons/icon.png' ?>"></a></li>
						<span class="login100-form-title p-b-30">I'dadiyah NJ</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="username">
						<input class="input100 font-weight-bold" type="text" name="username" value="<?= set_value('username') ?>">
             <?= form_error('username','<small class="text-danger ml-3">', ' </small>'); ?>
						<span class="focus-input100" data-placeholder="username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100 font-weight-bold" type="password" name="password" value="<?= set_value('password') ?>">
						<?= form_error('password','<small class="text-danger ml-3">', ' </small>'); ?>
                        <span class="focus-input100" data-placeholder="password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								LOGIN  <i class="fa fa-fw fa-sign-in fa-lg"></i></button>
						</div>
					</div>

					</div>
				</form>
			</div>
		</div>
	</div>

