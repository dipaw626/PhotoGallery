<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-6">
            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->

            <!-- <?= $this->session->flashdata('message'); ?> -->
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?= form_open_multipart('menu/menueditAksi'); ?>
                    <?php foreach ($menu as $m) : ?>
                        <input type="hidden" type="id" id="id" value="<?= $m['id']; ?>">
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td>
                                <input type="text" id="menu" name="menu" class="form-control" value="<?= $m['menu']; ?>">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="POST">
                <div class="modal-body">
                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="EditMenuModal" tabindex="-1" aria-labelledby="EditMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditMenuModalLabel">Edit New Menu</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/menuedit'); ?>" method="POST">
                <input type="hidden" value="<?= $m['id']; ?>" name="id" id="id">
                <div class="modal-body">
                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>" placeholder="Menu Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div> -->