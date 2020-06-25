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
							&nbsp<i class="fa fa-angle-right fa-md"></i>&nbsp<span><b>Manajemen Submenu</b></span>
						</span>
					</p>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>

			<a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#submenuBaru"><i class="fas fa-fw fa-plus-square"></i> Tambah SubMenu Baru</a>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Judul</th>
						<th scope="col">Menu</th>
						<th scope="col">Url</th>
						<th scope="col">Icon</th>
						<th scope="col">Aktif</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($subMenu as $sm) : ?>
						<tr>
							<th scope="row"><?= ++$start; ?></th>
							<td><?= $sm['title']; ?></td>
							<td><?= $sm['menu']; ?></td>
							<td><?= $sm['url']; ?></td>
							<td><?= $sm['icon']; ?></td>
							<td><?= $sm['is_active']; ?></td>
							<td>
								<a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#subMenuEdit<?= $sm['id'] ?>"><i class="fa fa-fw fa-edit"></i>Edit</a>
								<a href="<?= base_url('menu/deletesm/' . $sm['id']) ?>" data-nama="<?= $sm['title']; ?>" class="btn btn-danger btn-sm deleteSM"><i class="fa fa-fw fa-trash"></i>Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="submenuBaru" tabindex="-1" role="dialog" aria-labelledby="submenuBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="submenuBaruLabel">Tambah Sub Menu Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('menu/submenu'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<select name="level" id="level" class="form-control" required>
							<option value="">- Select User Level -</option>
							<?php foreach ($level as $l) : ?>
								<option value="<?= $l['id']; ?>"><?= $l['level']; ?></option>
							<?php endforeach; ?>
					</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="title" id="title" placeholder="Nama Sub Menu" required>
						<div class="invalid-feedback">
							Masukan Nama Submenu
						</div>
					</div>
					<div class="form-group">
						<select name="menu_id" id="menu_id" class="form-control" required>
							<option value="">- Select Menu -</option>
							<?php foreach ($menu as $m) : ?>
								<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="url" id="url" placeholder="Submenu URL" required>
						<div class="invalid-feedback">
							Masukan URL Submenu
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="icon" id="icon" placeholder="Submenu icon" required>
						<div class="invalid-feedback">
							Masukan Icon Submenu
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
							<label class="form-check-label" for="is_active">Active ?</label>
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

<?php foreach ($subMenu as $sm) : ?>

	<!-- Modal Edit -->
	<div class="modal fade" id="subMenuEdit<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="subMenuEdit<?= $sm['id'] ?>Label" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="subMenuEdit<?= $sm['id'] ?>Label">Edit Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="<?= base_url('menu/updatesm/' . $sm['id']); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" name="titleU" id="titleU" placeholder="Nama Sub Menu" value="<?= $sm['title']; ?>">
						</div>
						<div class="form-group">
							<select name="menu_idU" id="menu_idU" class="form-control">
								<?php foreach ($menu as $m) {
									if ($sm['menu_id'] == $m['id']) {
										echo "<option value='$m[id]' selected>$m[menu]</option>";
									} else {
										echo "<option value='$m[id]'>$m[menu]</option>";
									}
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="urlU" id="urlU" placeholder="Submenu URL" value="<?= $sm['url']; ?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="iconU" id="iconU" placeholder="Submenu icon" value="<?= $sm['icon']; ?>">
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="1" name="is_activeU" id="is_activeU" checked>
								<label class="form-check-label" for="is_active">Active ?</label>
							</div>
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
