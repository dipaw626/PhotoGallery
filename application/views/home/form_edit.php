<!-- <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title> -->

<!-- Favicon-->
<!-- <link rel="icon" type="image/x-icon" href="<?= base_url('assets'); ?>/img/favicon.ico" /> -->
<!-- Google fonts-->
<!-- <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" /> -->
<!-- <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" /> -->

<!-- Custom styles for this template-->
<!-- <link href="<?= base_url('assets'); ?>/css/stylesEdit.css" rel="stylesheet" /> -->

<!-- Favicon-->
<!-- <link rel="icon" type="image/x-icon" href="<?= base_url('assets'); ?>/img/favicon.ico" /> -->
<!-- Bootstrap Icons-->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->
<!-- Google fonts-->
<!-- <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" /> -->
<!-- <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" /> -->
<!-- SimpleLightbox plugin CSS-->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" /> -->

<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link href="<?= base_url('assets'); ?>/css/stylesEdit.css" rel="stylesheet" />
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet"> -->



<!-- </head> -->

<!-- <body id="page-top"> -->

<!-- Navigation-->
<!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top" style="color: floralwhite;">Nostra Gallery</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" style="color: floralwhite;" href="<?= base_url('home/index'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" style="color: floralwhite;" href="<?= base_url('mygallery/login'); ?>">log in</a></li>
                    <li class="nav-item"><a class="nav-link" style="color: floralwhite;" href="<?= base_url('mygallery/registration'); ?>">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" style="color: floralwhite;" href="<?= base_url('user'); ?>">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav> -->

<!-- Page Wrapper -->
<!-- <div id="wrapper"> -->
<!-- Begin Page Content -->
<!-- <div class="container-fluid" style="padding-bottom: 7%; background: url('<?= base_url('assets'); ?>/img/bg-crud5.jpg');"> -->

<!-- Page Heading -->


<!-- <h1 class="h3 mb-4" align="center" style="color: floralwhite;"><br><br><br><?= $title; ?></h1> -->

<!-- <div class="row">
                <div class="col-lg-11">

                    <?= form_open_multipart('home/aksi_edit/' . $user_crud['id']); ?>
                    <input type="hidden" name="id" value="<?= $user_crud['id']; ?>">

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label" style="color: floralwhite;">Nama Gallery</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name_gallery" id="name_gallery" value="<?= $user_crud['name_gallery']; ?> ">
                            <?= form_error('name_gallery', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-2" style="color: floralwhite;">Picture</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/galeri/') . $user_crud['name_foto']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="name_foto" name="name_foto" for=name_foto" value='<?= $user_crud['name_foto']; ?>'>
                                        <input type="hidden" name="name_foto" value="<?= $user_crud['name_foto']; ?>">
                                        <?= form_error('new_name_foto', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label" style="color: floralwhite;">Deskripsi</label>
                        <div class="col-sm-10" style="padding-bottom: 1%;">
                            <input type="text" style="padding-bottom: 5%;" class="form-control" name="deskripsi" id="deskripsi" value="<?= $user_crud['deskripsi']; ?>">
                            <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div> -->
<!-- justify-content-end -->
<!-- <div class="row mb-3 ">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-info btn-lg" style="color: floralwhite; margin-left: 95%; ">Submit</button>
                </div>

            </div> -->



<!-- </div> -->
<!-- /.container-fluid -->


<!-- </div> -->
<!-- End of Main Content -->
<!-- Footer -->

<!-- End of Footer -->

<!-- </div> -->
<!-- End of Content Wrapper -->

<!-- </div> -->
<!-- End of Page Wrapper -->

<!-- <footer class="sticky-footer bg-white" style="background: url(' <?= base_url('assets'); ?>/img/bg-crud5.jpg');">
        <div class="container my-auto">
            <div class="copyright text-center my-auto" style="color: floralwhite;">
                <span>Copyright &copy; Team K2 <?= date('Y'); ?></span>
            </div>
        </div>
    </footer> -->

<!-- Scroll to Top Button-->
<!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->



<!-- Bootstrap core JavaScript-->
<!-- <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script> -->

<!-- Core plugin JavaScript-->
<!-- <script src="<?= base_url('assets/'); ?>js/jquery.easing.min.js"></script> -->

<!-- Custom scripts for all pages-->
<!-- <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script> -->

<!-- </body>

</html> -->













<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/onlyCRUD/bootstrap.min.css" />

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

    <title><?= $title; ?></title>

    <style type="text/css">
        body {
            background-color: #f5dde0;
        }

        .bg {
            background-color: #dd868c;
        }

        .jumbotron {
            background: #f5dde0;
        }

        .card-header {
            background-color: rgb(241, 223, 223);
        }

        .gambar {
            width: 200px;
            height: 200px;
        }

        .card-footer {
            background-color: rgb(241, 223, 223);
        }

        #footer {
            background-color: #dd868c;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg shadow">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a class="navbar-brand text-light" href="#">Nostra<b style="color: #f5dde0">Gallery</b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col md-auto">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link text-light" href="<?= base_url('home/home1'); ?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?= base_url('user'); ?>">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?= base_url('mygallery/login'); ?>">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?= base_url('mygallery/registration'); ?>">Signup</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- form tambah -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row justify-content-md-center" style="padding-bottom: 130px;">
                <div class="card rounded-lg shadow" style="width: 30rem">
                    <?= form_open_multipart('home/aksi_edit/' . $user_crud['id']); ?>
                    <input type="hidden" name="id" value="<?= $user_crud['id']; ?>">
                    <div class="card-header text-center card-header-light">
                        <h5 class="text-secondary">Edit</h5>
                        <img src="<?= base_url('assets/img/galeri/') . $user_crud['name_foto']; ?>" class="gambar mt-2 mb-2" alt="Nostra Gallery Logo" />
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Foto</label>
                                <input type="text" class="form-control" id="name_gallery" name="name_gallery" value="<?= $user_crud['name_gallery']; ?>" />
                            </div>
                            <div class="input-group mb-4 mt-4">
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="name_foto" name="name_foto" for=name_foto" value='<?= $user_crud['name_foto']; ?>'>
                                    <input type="hidden" name="name_foto" value="<?= $user_crud['name_foto']; ?>">
                                    <?= form_error('new_name_foto', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descriptions</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="9"><?= $user_crud['deskripsi']; ?></textarea>
                            </div> -->
                            <center>
                                <button type="submit" class="btn btn-success"> Edit</button>
                            </center>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <i class="bi bi-heart-fill bg-love"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end from tambah -->

    <!-- footer -->
    <section id="footer" class="text-center pb-3 pt-3">
        <p>
            Created with <b>aku mencintaimu <i class="bi bi-heart-fill"></i> </b> by Nostra<b>Gallery</b>
        </p>
    </section>
    <!-- end footer -->

    <!-- js -->
    <script type="text/javascript" src="<?= base_url('assets/'); ?>onlyCRUD/js/jquery.slim.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>onlyCRUD/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>onlyCRUD/js/bootstrap.min.js"></script>
</body>

</html>