<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/onlyCRUD/bootstrap.min.css" />

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

    <title>Hello, world!</title>

    <style type="text/css">
        body {
            background-color: #edeef3;
        }

        @media (min-width: 1200px) {

            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .containerNew {
                max-width: 1140px;
            }
        }

        .bg {
            background-color: #dd868c;
        }

        .datar {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: nowrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x) / -2);
            margin-left: calc(var(--bs-gutter-x) / -2);
            flex-direction: row;
            align-content: stretch;
            align-items: flex-end;

        }

        .warna-bg {
            background: linear-gradient(to right, #f5dde0, #dd868c);
        }

        .jumbotron-bg {
            background-color: #edeef3;
        }

        .bg-button {
            background: linear-gradient(to right, #add495, #80b7a2);
            color: black;
            border: none;
        }

        .bg-button:hover {
            background: #dd868c;
        }

        .kotak {
            display: inline-block;
            box-sizing: border-box;
            width: 175px;
            height: 400px;
            border-radius: 7px;
            margin: 5%;
            transition: 200ms;
        }

        .bg-gallery {
            background: #edeef3;
            padding: 50px 0px 400px 0px;
            padding: 0%;
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

    <!-- jumbotron -->

    <section class="jumbotron jumbotron-bg">
        <div class="jumbotron warna-bg shadow">
            <div class="container">
                <h1 class="display-4">Selamat Datang</h1>
                <p class="lead">Tempat Untuk Melihat Seni Ter-Populer dari penjuru Dunia</p>
                <hr class="my-4" />
                <p>Dengan ini kamu bisa melihat gambar-gambar dengan nilai seni tinggi tanpa harus keluar rumah</p>
                <a class="btn btn-success btn-lg bg-button" href="<?= base_url('home/tambah_gallery'); ?>" role="button">Upload</a>
            </div>
        </div>
    </section>
    <!-- end jumbotron -->

    <!-- gallery -->

    <section id="gallery" class="bg-gallery">
        <div class="container">
            <h2 class="mb-0 pl-5 ">Gallery</h2>
            <!-- <a href="#" class="btn btn-success mb-3">Add</a> -->
            <?php foreach ($user_crud as $item) { ?>
                <div class="kotak mb-0">
                    <div class="card" style="width: 18rem">
                        <img src="<?= base_url('assets/img/galeri/') . $item['name_foto']; ?>" class="card-img-top" alt="image from Nostra" />
                        <div class="card-body">
                            <h5 class="card-title">
                                <center><?= $item['name_gallery']; ?></center>
                            </h5>
                        </div>
                        <div class="card-footer">
                            <center>
                                <a href="<?= site_url('home/edit/' . $item['id']); ?>" class="btn btn-warning pt-0 pb-0" style="color:white;">Edit</a>
                                <a href="<?= site_url('home/hapus/' . $item['id']); ?>" onclick="return confirm('Yakin akan hapus data ini?')" style="color:white;" class="btn btn-warning pt-0 pb-0">Hapus</a>
                            </center>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>


    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#dd868c" fill-opacity="1" d="M0,96L48,122.7C96,149,192,203,288,224C384,245,480,235,576,234.7C672,235,768,245,864,240C960,235,1056,213,1152,192C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <section id="footer" class="text-center pb-3">
        <p>
            Created with <b>aku mencintaimu <i class="bi bi-heart-fill"></i> </b> by Nostra<b>Gallery </b><?= date('Y'); ?>
        </p>
    </section>

    <!-- end footer -->
    <!-- </section> -->
    <!-- end gallery -->

    <!-- js -->
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/onlyCRUD/jquery.slim.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/onlyCRUD/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/onlyCRUD/bootstrap.min.js"></script>
</body>

</html>