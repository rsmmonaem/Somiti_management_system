<?php
include "inc/header_links.php";
include "inc/left_sidebar.php";
include "inc/top_bar.php";

include "inc/add_salary_content.php";
?>

</div>
</div>

<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
	<p class="mb-0">Copyright © 2022. All right reserved.</p>
</footer>
</div>
<!--end wrapper-->


<!-- Bootstrap JS -->
<script src="<?= base_url()?>assets/admin/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url()?>assets/admin/js/jquery.min.js"></script>

<!-- <script src="<?= base_url()?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script> -->
<script src="<?= base_url()?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!-- <script src="<?= base_url()?>assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script> -->
<script src="<?= base_url()?>assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- <script src="<?= base_url()?>assets/admin/js/index.js"></script> -->
<script src="<?= base_url()?>assets/admin/js/app.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<script src="<?= base_url()?>assets/admin/plugins/select2/js/select2-custom.js"></script>

<script>
	new PerfectScrollbar(".app-container")
</script>
	<?php if ($this->session->flashdata('error')): ?>
		<script>
			iziToast.error({
				title: 'Error',
				position:'topRight',
				message: '<?php echo $this->session->flashdata('error'); ?>',
			});
		</script>
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


