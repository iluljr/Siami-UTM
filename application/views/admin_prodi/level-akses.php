<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
	<!-- Page Heading -->
	<div>
		<div class="row">
			<div class="col-md">
				<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
			</div>
			<div class="col-md-3">
				<nav aria-label="breadcrumb">
					<p>
						<span class="posisi"><i class="fa fa-dashboard fa-md"></i> &nbsp<b><a href="<?= base_url('admin_prodi');  ?>">Dashboard</a></b>
							&nbsp<i class="fa fa-angle-right fa-md"></i>&nbsp<span><b><a href="<?= base_url('admin_prodi/level');  ?>">Level</a></b></span>
							&nbsp<i class="fa fa-angle-right fa-md"></i>&nbsp<span><b>Level akses</b></span>
						</span>
					</p>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">

		<!-- <?php if ($this->session->flashdata('pesan')) : ?>
		<?php endif; ?> -->
		<div class="col-lg-6">
			<div class="alert alert-success" role="alert">
				Username : <?= $user['username']; ?>
			</div>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Prodi</th>
						<th scope="col">Akses</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($menu as $m) : ?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td><?= $m['nama_prodi']; ?></td>
							<td>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" <?= cek_akses($user['id_user'], $m['id_prodi']); ?> data-akun="<?= $user['id_user']; ?>" data-prodi="<?= $m['id_prodi']; ?>">
								</div>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
