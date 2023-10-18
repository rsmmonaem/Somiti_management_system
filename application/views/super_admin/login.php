<?php
$this->db->from('setting');
$this->db->where('setting_id', 1);
$setting = $this->db->get()->row();
?>

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
    <link rel="stylesheet" href="<?= base_url()?>assets/toast/css/iziToast.css"/>
    <script src="<?= base_url()?>assets/toast/js/iziToast.js"></script>
	<title>Login - <?= $setting->setting_title;?>></title>
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
							<div class="p-3">
								<div class="mb-3 text-center">
									<img src="<?= base_url()?>uploads/setting/<?= $setting->setting_logo?>" class="img-fluid" width="60%" alt="" />

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

										</div>
                                        <table class="table table-bordered  table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">UserName</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Super Admin</td>
                                                <td>admin</td>
                                                <td>admin</td>
                                                <td><a href="javascript:void(0);" class="btn btn-primary copy-button" data-username="admin" data-password="admin">Copy</a></td>
                                            </tr>
                                            <tr>
                                                <td>Field Worker</td>
                                                <td>worker</td>
                                                <td>worker</td>
                                                <td><a href="javascript:void(0);" class="btn btn-primary copy-button" data-username="worker" data-password="worker">Copy</a></td>
                                            </tr>
                                            <tr>
                                                <td>Branch Manager</td>
                                                <td>manager</td>
                                                <td>manager</td>
                                                <td><a href="javascript:void(0);" class="btn btn-primary copy-button" data-username="manager" data-password="manager">Copy</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
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
    // Add click event listeners to the "Copy" buttons
    document.querySelectorAll('.copy-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var username = this.getAttribute('data-username');
            var password = this.getAttribute('data-password');

            // Fill the input fields with the username and password values
            document.querySelector('input[name="user_name"]').value = username;
            document.querySelector('input[name="pass_word"]').value = password;
        });
    });
</script>

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
<script src="<?= base_url()?>assets/js/app.js"></script>

<?php if (isset($_SESSION['error'])): ?>
    <script>
        iziToast.error({
            title: 'Error',
            position:'topRight',
            message: ' <?php echo $_SESSION['error']; ?>',
        });
    </script>

    <?php unset($_SESSION['error']); ?>

<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <script>
        iziToast.success({
            title: 'Success',
            position:'topRight',
            message: ' <?php echo $_SESSION['success']; ?>',
        });
    </script>

    <?php unset($_SESSION['success']); ?>

<?php endif; ?>

</body>

</html>
