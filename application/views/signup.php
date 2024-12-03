<!DOCTYPE html>
<html lang="en">
	<?php include 'master-ui/header.php'; ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assetsmoods/css/button-styles.css">
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
					<div class="card card-flush w-lg-500px py-16 border-0" style="background: transparent;">
						<div class="card-body py-10 py-lg-0">
							<div class="signup-container">
								<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="<?php echo base_url(); ?>" action="#">
									<!--begin::Separator-->
									<div class="separator separator-content my-16">
										<img alt="Logo" src="<?php echo base_url(); ?>/assets/media/auth/mood.png" width="190px;" />
									</div>
									<!--end::Separator-->
									<!--begin::Input group=-->
									<div class="fv-row mb-8">
										<!--begin::Email-->
										<input type="text" placeholder="Fullname" name="fullname" autocomplete="off" class="form-control" />
										<!--end::Email-->
									</div>
									<div class="fv-row mb-8">
										<!--begin::Email-->
										<input type="text" placeholder="Username" name="username" autocomplete="off" class="form-control" />
										<!--end::Email-->
									</div>
									<div class="fv-row mb-8">
										<!--begin::Email-->
										<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control" />
										<!--end::Email-->
									</div>
									<!--begin::Input group-->
									<div class="fv-row mb-8" data-kt-password-meter="true">
										<!--begin::Wrapper-->
										<div class="mb-1">
											<!--begin::Input wrapper-->
											<div class="position-relative mb-3">
												<input class="form-control" type="password" placeholder="Password" name="password" autocomplete="off" />
												<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
													<i class="ki-duotone ki-eye-slash fs-2"></i>
													<i class="ki-duotone ki-eye fs-2 d-none"></i>
												</span>
											</div>
											<!--end::Input wrapper-->
											<!--begin::Meter-->
											<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
											</div>
											<!--end::Meter-->
										</div>
										<!--end::Wrapper-->
										<!--begin::Hint-->
										<div class="text-white">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
										<!--end::Hint-->
									</div>
									<!--end::Input group=-->
									<!--end::Input group=-->
									<div class="fv-row mb-8">
										<!--begin::Repeat Password-->
										<input placeholder="Confirm Password" name="confirm-password" type="password" autocomplete="off" class="form-control" />
										<!--end::Repeat Password-->
									</div>
									<!--end::Input group=-->
									
									<!--begin::Submit button-->
									<div class="d-grid mb-10" style="margin-top: 2rem; margin-bottom: 2rem; display: flex; justify-content: center;">
										<button type="button" class="button type--B" id="kt_sign_up_submit" style="border: none; background: none; cursor: pointer; width: 240px;">
											<div class="button__line"></div>
											<div class="button__line"></div>
											<span class="button__text">SIGN UP</span>
											<div class="button__drow1"></div>
											<div class="button__drow2"></div>
										</button>
									</div>
									<!--end::Submit button-->
									<!--begin::Sign up-->
									<div class="text-gray-500 text-center fw-semibold fs-6" style="margin-top: 2rem;">Already have an Account? 
									<a href="<?php echo base_url(); ?>" class="link-primary fw-semibold"><b>Log in</b></a></div>
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
		<style>
			/* Background image */
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

			/* Adjust existing content */
			.ms_download_wrapper {
			  position: relative;
			  z-index: 1;
			  background: transparent;
			}

			/* Signup container */
			.signup-container {
			  background: rgba(0, 0, 0, 0.7);
			  backdrop-filter: blur(10px);
			  border-radius: 10px;
			  padding: 15px;
			  box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
			}

			.signup-container .separator {
			  margin: 1rem 0;
			}

			.signup-container .fv-row {
			  margin-bottom: 0.8rem !important;
			}

			.signup-container .d-grid {
			  margin-bottom: 0.8rem !important;
			}

			.signup-container input {
			  background: rgba(255, 255, 255, 0.1) !important;
			  border: 1px solid rgba(255, 255, 255, 0.2) !important;
			  color: white !important;
			  padding: 0.5rem 1rem;
			}

			.signup-container input::placeholder {
			  color: rgba(255, 255, 255, 0.6) !important;
			}

			.signup-container label {
			  color: white !important;
			}
		</style>
		<div class="bg-container"></div>
		<?php include 'master-ui/global-script.php'; ?>
		<script src="<?php echo base_url(); ?>/<?php echo $script; ?>"></script>
	</body>
	<!--end::Body-->
</html>