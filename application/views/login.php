<!DOCTYPE html>
<html lang="en">
	<?php include 'master-ui/header.php'; ?>
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>
				body { background-image: url('<?php echo base_url(); ?>/assets/media/auth/home.jpg'); } [data-bs-theme="dark"] 
				body { background-image: url('<?php echo base_url(); ?>/assets/media/auth/bg5-dark.jpg'); }
			</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Signup Welcome Message -->
			<div class="d-flex flex-column flex-center flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center text-center p-10">
					<!--begin::Wrapper-->
					<style>
						.bg-container {
							position: fixed;
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
							z-index: -1;
							background-image: url('<?php echo base_url(); ?>/assets/media/auth/purple.jpeg');
							background-size: cover;
							background-position: center;
							background-repeat: no-repeat;
						}
						.ms_download_wrapper {
							position: relative;
							z-index: 1;
							background: transparent;
						}
						.login-container {
							background: rgba(0, 0, 0, 0.7);
							backdrop-filter: blur(10px);
							border-radius: 10px;
							padding: 20px;
							box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
						}

						.login-container input {
							background: rgba(255, 255, 255, 0.1) !important;
							border: 1px solid rgba(255, 255, 255, 0.2) !important;
							color: white !important;
						}

						.login-container input::placeholder {
							color: rgba(255, 255, 255, 0.6) !important;
						}

						.login-container label {
							color: white !important;
						}
					</style>
					<div class="bg-container"></div>
					<div class="card card-flush w-lg-500px py-16 border-0" style="background: transparent;">
						<div class="card-body py-15 py-lg-0">
							<div class="login-container">
								<form class="form w-100" action="<?= base_url('login');?>" method="POST">
									<div class="separator separator-content my-16">
										<img alt="Logo" src="<?php echo base_url(); ?>/assets/media/auth/mood.png" width="190px;" />
									</div>
									<!--end::Separator-->
									<?
									$info = $this->session->flashdata('error');
							        if(!empty($info)){ ?>
									<!--begin::Alert-->
									<div class="alert alert-danger d-flex align-items-center p-5">
									   
									    <!--begin::Wrapper-->
									    <div class="d-flex flex-column">
									        <!--begin::Content-->
									        <span><?php echo $info; ?></span>
									        <!--end::Content-->
									    </div>
									    <!--end::Wrapper-->
									</div>
									<!--end::Alert-->

									<? } ?>

									<!--begin::Input group=-->
									<div class="fv-row mb-8">
										<!--begin::Email-->
										<input type="text" required placeholder="Username" name="username" autocomplete="off" class="form-control" />
										<!--end::Email-->
									</div>
									<div class="fv-row mb-8">
										<!--begin::Email-->
										<input type="password" required placeholder="Password" name="password" autocomplete="off" class="form-control" />
										<!--end::Email-->
									</div>

									<!--end::Accept-->
									<!--begin::Submit button-->
									<div class="d-grid mb-10">
										<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
											<!--begin::Indicator label-->
											<span class="indicator-label">Log In</span>
											<!--end::Indicator label-->
											<!--begin::Indicator progress-->
											<span class="indicator-progress">Please wait... 
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											<!--end::Indicator progress-->
										</button>
									</div>
									<!--end::Submit button-->
									<!--begin::Sign up-->
									<div class="text-gray-500 text-center fw-semibold fs-6">Don't have an account ? 
									<a href="<?php echo base_url('signup'); ?>" class="link-primary fw-semibold"><b>Sign Up</b></a></div>
									<!--end::Sign up-->
								</form>
							</div>
						</div>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Signup Welcome Message-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "<?php echo base_url(); ?>/assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="<?php echo base_url(); ?>/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>