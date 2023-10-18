
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
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

<!-- Bootstrap JS -->
<script src="<?= base_url()?>assets/admin/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url()?>assets/admin/js/jquery.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/chartjs/js/chart.js"></script>
<script src="<?= base_url()?>assets/admin/js/index.js"></script>
<script src="<?= base_url()?>assets/admin/js/app.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url()?>assets/admin/plugins/select2/js/select2-custom.js"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable();
    } );
</script>

<script>
    $(document).ready(function() {
        $('#example2').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $('#example3').DataTable();
    } );
</script>
    <script>
    $(document).ready(function() {
        $('#example4').DataTable();
    } );
</script>

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
