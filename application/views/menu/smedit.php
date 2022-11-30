<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->

            <!-- <?= $this->session->flashdata('message'); ?> -->
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Sub Menu</a>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?= form_open_multipart('menu/smeditAksi'); ?>
                    <tr>
                        <?php foreach ($subMenu as $sm) : ?>
                            <input type="hidden" id="id" name="id" value="<?= $sm['id']; ?>">
                            <th scope="row"><?= $i; ?></th>
                            <td><input type="text" id="title" name="title" value="<?= $sm['title']; ?>"></td>
                            <td><input type="text" id="menu_id" name="menu_id" value="<?= $sm['menu']; ?>"></td>
                            <td><input type="text" id="url" name="url" value="<?= $sm['url']; ?>"></td>
                            <td><input type="text" id="icon" name="icon" value="<?= $sm['icon']; ?>"></td>
                            <td><input type="text" id="is_active" name="is_active" value="<?= $sm['is_active']; ?>"></td>
                            <td>
                                <a href="<?= base_url('menu/smedit/' . $sm['id']); ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('menu/hapus_sm/' . $sm['id']); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="badge badge-danger">delete</a>
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



<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add Sub New Menu</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                </div>
                <div class="modal-body">
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Select Menu</option>
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
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
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>