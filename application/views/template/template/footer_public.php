<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>
                <font color="blue">Copyright &copy; Portal SMS Universitas Trunojoyo Madura <?= date('Y'); ?></font>
            </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Core plugin JavaScript-->
<!-- <script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script> -->
<!-- <script src="<?= base_url('asset/'); ?>js/sweet/sweetalert2.all.min.js"></script>
<script src="<?= base_url('asset/'); ?>js/jsscript.js"></script> -->

<script src="<?= base_url('assets/'); ?>js/public_js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/public_js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/public_js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/public_js/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/public_js/jquery.stellar.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/public_js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/public_js/aos.js"></script>
<script src="<?= base_url('assets/'); ?>js/public_js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/public_js/scrollax.min.js"></script>

<script src="<?= base_url('assets/'); ?>js/public_js/main.js"></script>

<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const levelId = $(this).data('level');

        $.ajax({
            url: "<?= base_url('admin/rubahakses'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                levelId: levelId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/levelAkses/'); ?>" + levelId;
            }
        });
    });
</script>

</body>

</html>