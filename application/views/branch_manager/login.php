<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?= base_url()?>assets/admin/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?= base_url()?>assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= base_url()?>assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= base_url()?>assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?= base_url()?>assets/admin/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url()?>assets/admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url()?>assets/admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?= base_url()?>assets/admin/css/app.css" rel="stylesheet">
	<link href="<?= base_url()?>assets/admin/css/icons.css" rel="stylesheet">
	<title>Login - Somiti Management System</title>
</head>

<body class="">
<!--wrapper-->
<div class="wrapper">
	<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
		<div class="container">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
				<div class="col mx-auto">
					<div class="card mb-0">
						<div class="card-body">
							<div class="p-4">
								<div class="mb-3 text-center">
									<img src="<?= base_url()?>/assets/design/logo.png" class="img-fluid" width="60%" alt="" />

								</div>
								<div class="text-center mb-4">
<!--									<h5 class="">বেলাভূমি সমিতি</h5>-->
									<h6 class="mb-0">Please log in to your account</h6>
								</div>
								<div class="form-body">
									<form class="row g-3" action="<?= base_url() ?>login/login_process" method="post">

										<div class="col-12">
											<label for="inputEmailAddress" class="form-label">Email</label>
											<input type="text" name="user_name" class="form-control" id="inputEmailAddress" placeholder="durjay">
										</div>
										<div class="col-12">
											<label for="inputChoosePassword" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" name="pass_word" class="form-control border-end-0"  placeholder="Enter Password"></i></a>
											</div>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary">Sign in</button>
											</div>
											<hr>
											<p>UserName: admin</p>
											<p>Password: admin</p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end row-->
		</div>
	</div>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="<?= base_url()?>assets/admin/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url()?>assets/admin/js/jquery.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Password show & hide js -->
<script>
	$(document).ready(function () {
		$("#show_hide_password a").on('click', function (event) {
			event.preventDefault();
			if ($('#show_hide_password input').attr("type") == "text") {
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass("bx-hide");
				$('#show_hide_password i').removeClass("bx-show");
			} else if ($('#show_hide_password input').attr("type") == "password") {
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass("bx-hide");
				$('#show_hide_password i').addClass("bx-show");
			}
		});
	});
</script>
<!--app JS-->
<script src="assets/js/app.js"></script>
</body>

</html>
