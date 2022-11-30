<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-6">
            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->

            <!-- <?= $this->session->flashdata('message'); ?> -->
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    <?= form_open_multipart('admin/roleeditAksi'); ?>
                    <?php foreach ($role as $r) : ?>
                        <input type="hidden" id="id" name="id" value="<?= $r['id']; ?>">
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><input type="text" name="role" id="role" value="<?= $r['role']; ?>"> </td>
                            <td><button type="submit" class="btn btn-success" style="margin-left: 120px;">Edit</button></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- <button type="submit" class="btn btn-success" style="margin-left: 120px;">Edit</button> -->
        </div>
    </div>

</div>
<!-- container-fluid -->

</div>
<!-- end of main content -->



<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Menu</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="POST">
                <div class="modal-body">
                    <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ModalEdit -->
<!-- <div class="modal fade" id="newEditRoleModal" tabindex="-1" aria-labelledby="newEditRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newEditRoleModalLabel">Edit New Menu</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="POST">
                <div class="modal-body">
                    <input type="text" class="form-control" id="role" name="role" placeholder="Role name" value="<?= $r['role']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div> -->