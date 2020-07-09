<!-- Begin Page Content -->
<div class="container-fluid">
	<!--<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>-->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
    		<div class="row">

    			<div class="col-md">
    				<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    			</div>
    			<div class="col-md-2">
    				<nav aria-label="breadcrumb">
    					<p>
    						<span class="posisi"><i class="fa fa-dashboard fa-md"></i> &nbsp<b>Dashboard</b>
    						</span>
    					</p>
    				</nav>
    			</div>
    		</div>
    	<div class="row">
    		<div class="col-md">
    			<nav class="navbar navbar-light bg-light">
    				<?php
    				if ($keyword == null) {
    					echo '<a class="navbar-brand">Total : ' . $total_rows . '</a>';
    				} else {
    					echo '<a class="navbar-brand">Hasil Pencarian : ' . $total_rows . '</a>';
    				}
    				?>

    				<form class="form-inline" action="<?= base_url('admin_prodi/user_akun'); ?>" method="post">
    					<input class="form-control mr-sm-2" type="search" placeholder="Search Name" name="keyword" autocomplete="off" autofocus>
    					<input type="submit" class="btn btn-primary" name="submit" value="Search">

    				</form>
    			</nav>
    		</div>
    	</div>
    	<a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#userBaru"><i class="fas fa-fw fa-plus-square"></i> Tambah User</a>
    	<div class="row">
    		<div class="col-md">
    			<table class="table table-hover" id="perus">
    				<thead>
    					<tr>
    						<th scope="col">No</th>
    						<th scope="col">Username</th>
    						<th scope="col">Level</th>
    						<th scope="col">Action</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php if (empty($users)) : ?>
    						<tr>
    							<td colspan="12">
    								<div class="alert alert-danger" role="alert">
    									Data not found!
    								</div>
    							</td>
    						</tr>
    					<?php endif; ?>
    					<?php foreach ($users as $u) : ?>
    						<tr>
    							<th scope="row"><?= ++$start; ?></th>
    							<td><?= $u['username']; ?></td>
    							<td><?= $u['level']; ?></td>
    							<td>
    								<a href="" data-toggle="modal" data-target="#Edit_akun<?= $u['id_user'] ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
    								<a href="<?= base_url() . 'admin_prodi/hapus_akun/' . $u['id_user'] ?>" data-nama="<?= $u['username']; ?>" class="btn btn-danger btn-sm deleteU"><i class="fa fa-fw fa-trash"></i>Delete</a>
    							</td>
    						</tr>
    					<?php endforeach; ?>
    				</tbody>
    			</table>

    		</div>

    	</div>
        <!-- End Data Table -->

      </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->

<?php foreach ($users as $u) :
?>

	<!-- Modal Edit -->
	<div class="modal fade" id="Edit_akun<?= $u['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="pelamarEditLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="pelamarEditLabel">Edit Data Pelamar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('admin_prodi/edit_akun/' . $u['id_user']); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="username">Username</label>
              <input type="hidden" name="id_user" value="<?= $u['id_user']?>">
							<input type="text" class="form-control" id="username" name="username" value="<?= $u['username']; ?>">
						</div>
  					<div class="form-group">
							<label for="username">Password</label>
  						<input type="password" class="form-control cekkarakter1 req1" name="password" id="password" placeholder="Password" required>
  					</div>
						<div class="form-group">
							<label for="level">Level</label>
							<select name="level" id="level" class="form-control">

								<?php foreach ($level as $l) {
									if ($u['level_id'] == $l['id']) {
										echo "<option value='$l[id]' selected>$l[level]</option>";
									} else {
										echo "<option value='$l[id]'>$l[level]</option>";
									}
								}
								?>

							</select>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="userBaru" tabindex="-1" role="dialog" aria-labelledby="userBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="userBaruLabel">Tambah User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('admin_prodi/tambah_akun'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control cekkarakter req" name="username" id="username" placeholder="Username" required>
						<div class="invalid-feedback">
							Masukan Username
						</div>
					</div>
					<!-- <div class="form-group">
						<input type="text" class="form-control" name="email" id="email" placeholder="Email User">
					</div> -->
					<div class="form-group">
						<input type="password" class="form-control cekkarakter1 req1" name="password" id="password" placeholder="Password" required>
						<div class="invalid-feedback">
							Masukan Password
						</div>
					</div>
					<div class="form-group">
						<select name="level" id="level" class="form-control" required>
							<option>- Pilih Level -</option>
							<?php foreach ($level as $l) : ?>
								<option value="<?= $l['id']; ?>"><?= $l['level']; ?></option>
							<?php endforeach; ?>
						</select>
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
