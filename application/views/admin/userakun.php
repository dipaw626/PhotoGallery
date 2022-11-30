<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->

            <!-- <?= $this->session->flashdata('message'); ?> -->
            <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#EditUserModal">Edit User</a> -->


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Active</th>
                        <th scope="col">Date created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($akun as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $u['name']; ?></td>
                            <td><?= $u['email']; ?></td>
                            <td><?= $u['image']; ?></td>
                            <td><?= $u['password']; ?></td>
                            <td><?= $u['role_id']; ?></td>
                            <td><?= $u['is_active']; ?></td>
                            <td><?= $u['date_created']; ?></td>
                            <td>
                                <!-- <a href="<?= base_url('admin/userakunEdit' . $u['id']); ?>" class="badge badge-success">edit</a> -->
                                <a href="<?= base_url('admin/hapus_user/') . $u['id']; ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- container-fluid -->

</div>
<!-- end of main content -->

<!-- nama, email,img pass role active date  -->

<!-- Modal -->
<!-- <div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="EditUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditUserModal">Edit User</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/accountuser_edit'); ?>" method="POST">
                <div class="modal-body">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $u['name']; ?>">
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" value="<?= $u['email']; ?>" readonly>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" id="image" name="image">
                </div>
                <div class="modal-body">
                    <input type="file" class="form-control" id="image" name="image" placeholder="image">
                    <input type="hidden" class="form-control" id="name_foto" name="name_foto" placeholder="image" value="<?= $u['image']; ?>">
                </div>
                <div class="modal-body">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $u['password']; ?>">
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Active?
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div> -->