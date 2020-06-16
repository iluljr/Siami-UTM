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
						<span class="posisi"><i class="fa fa-dashboard fa-md"></i> &nbsp<b><a href="<?= base_url('admin');  ?>">Dashboard</a></b>
							&nbsp<i class="fa fa-angle-right fa-md"></i>&nbsp<span><b><a href="<?= base_url('menu');  ?>">Menu</a></b></span>
							&nbsp<i class="fa fa-angle-right fa-md"></i>&nbsp<span><b>Manajemen Menu</b></span>
						</span>
					</p>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<a href="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#menuBaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Menu Baru</a>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Menu</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($menu as $m) : ?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td><?= $m['menu']; ?></td>
							<td>
								<a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#menuEdit<?= $m['id'] ?>"><i class="fa fa-fw fa-edit"></i>Edit</a>
								<a href="<?= base_url('menu/delete/' . $m['id']) ?>" data-nama="<?= $m['menu']; ?>" class="btn btn-danger btn-sm deleteM"><i class="fa fa-fw fa-trash"></i>Delete</a>
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


<!-- Modal -->
<div class="modal fade" id="menuBaru" tabindex="-1" role="dialog" aria-labelledby="menuBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="menuBaruLabel">Tambah Menu Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('menu'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="menu" id="menu" placeholder="Nama Menu" required>
						<div class="invalid-feedback">
							Masukan Nama Menu
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>

		</div>
	</div>
</div>

<?php foreach ($menu as $me) : ?>

	<!-- Modal Edit -->
	<div class="modal fade" id="menuEdit<?= $me['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="menuEditLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="menuEditLabel">Edit Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="<?= base_url('menu/update/' . $me['id']); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" name="menu" id="menu" value="<?= $me['menu']; ?>">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php endforeach; ?>
