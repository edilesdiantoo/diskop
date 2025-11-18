<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    iframe {
        width: 100%;
        height: 500px;
        border-radius: 12px;
    }

    .image-tile img {
        width: 100%;
        /* Mengatur lebar gambar 100% dari kolom */
        height: 150px;
        /* Atur tinggi yang konsisten untuk semua gambar */
        object-fit: cover;
        /* Memastikan gambar terpotong secara proporsional */
        border-radius: 8px;
        /* Menambahkan sudut yang halus (opsional) */
    }

    .demo-gallery-poster {
        position: relative;
        /* Ensure the container is positioned relatively */
    }

    .demo-gallery-poster img {
        width: calc(100% - 20px);
        /* Reduce width to create space on left and right sides */
        height: auto;
        /* Set a fixed height for the image */
        object-fit: cover;
        /* Crop the image to fill the container while preserving the aspect ratio */
        position: absolute;
        /* Position the image absolutely within its container */
        top: -10%;
        /* Move the image up by 10% of its own height */
        left: 10px;
        /* Add left margin */
        right: 10px;
        /* Add right margin */
        transform: translateY(100%);
        /* Further adjust the image upward */
    }


    .dropdown-toggle::after {
        display: none;
        /* Menghilangkan ikon panah ke bawah */
    }

    .card {
        max-height: 80vh;
        /* Set a maximum height for the card */
        overflow-y: auto;
        /* Enable vertical scrolling */
    }

    .image-tile {
        overflow: hidden;
        /* Ensure the images do not overflow their container */
        border-radius: 8px;
        /* Add some border radius for aesthetics */
    }

    .lightGallery {
        padding: 1px;
        /* Add padding around the gallery */
    }

    .card-cumstom {
        height: 50vh;
        /* Set height to 70% of the viewport height */
        overflow-y: auto;
        /* Enable vertical scrolling if content exceeds height */
        border-radius: 12px;
        /* Optional: Add border radius for styling */
    }

    @media (max-width: 767px) {
        .video-gallery-scroll {
            flex-wrap: wrap;
            /* Allow wrapping to multiple lines */
            overflow-x: auto;
            /* Enable horizontal scrolling if needed */
            padding: 1px;
            /* Adjust padding for smaller screens */
        }

        .image-tile {
            flex: 0 0 100%;
            /* Ensure each thumbnail takes up the full width */
            max-width: 100%;
            /* Prevent thumbnails from exceeding the screen width */
            padding: 0 10px;
            /* Add some horizontal padding for spacing */
            box-sizing: border-box;
            /* Ensure padding is included in the element's width */
            margin-bottom: 15px;
            /* Add vertical space between thumbnails */
        }

        .demo-gallery-poster img {
            width: 100%;
            /* Make the image fill its container's width */
            height: auto;
            /* Maintain the image's aspect ratio */
            object-fit: cover;
            /* Ensure the image covers the container */
        }

        .truncate-text {
            white-space: normal;
            /* Allow text to wrap */
            overflow: hidden;
            /* Ensure overflow content is hidden */
            text-overflow: ellipsis;
            /* Show ellipsis if text overflows */
        }

        .truncate-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media (max-width: 767px) {
            .truncate-text {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        .card-dark-green {
            background-color: #005f3c;
            /* Hijau Gelap */
            color: white;
        }

        .card-dark-red {
            background-color: #7a1f1f;
            /* Merah Gelap */
            color: white;
        }

        .card-dark-purple {
            background-color: #4b0082;
            /* Ungu Gelap */
            color: white;
        }

        .card-dark-orange {
            background-color: #8b4500;
            /* Oranye Gelap */
            color: white;
        }

    }
</style>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Selamat datang <?= $this->session->userdata('nama_lengkap') ?></h3>
                <h6 class="font-weight-normal mb-0">Dashboard utama halaman <span class="text-primary">Dinas Koperasi dan UMKM</span></h6>
            </div>
            <div class="col-12 col-xl-4">
                <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?php date_default_timezone_set("Asia/Jakarta");
                            echo date('d M Y / H:i') ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin transparent">
        <div class="row">
            <div class="col-md-4 mb-2 stretch-card transparent">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <p class="mb-4">Penerima 2022</p>
                        <p class="fs-30 mb-2">1.500 - UMKM</p>
                        <!-- <p>Total Keseluruhan (All)</p> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2 stretch-card transparent">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">Penerima 2023</p>
                        <p class="fs-30 mb-2"> 3.600 - UMKM</p>
                        <!-- <p>Total Keseluruhan (All)</p> -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-2 stretch-card transparent">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <p class="mb-4">Penerima 2024</p>
                        <p class="fs-30 mb-2">2.000 - UMKM</p>
                        <!-- <p>Total Keseluruhan (All)</p> -->
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3 mb-2 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Pengajuan 2024</p>
                        <p class="fs-30 mb-2"> - Orang</p>
                        <p>Total Keseluruhan (All)</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Grafik Penerima Bantuan modal UMKM 2022 - 2024</p>
                <div class="card-body p-3">
                    <div class="chart" id="chart">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-cumstom px-3">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4 class="card-title">Berita & Informasi</h4>
                        <p class="font-weight-500 mb-4">Kegiatan terbaru dari dinas koperasi</p>
                    </div>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <div>
                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaltambah">Add Kegiatan</a>
                        </div>
                    <?php } ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form id="simpan" method="POST">
                                <div class="modal-content rounded-4 p-4">
                                    <div class="card-header" style="border-bottom: 1px dashed #ccc;">
                                        <h2 class="fw-bold">
                                            <span class="pagetitle">
                                                Tambah Data Informasi
                                            </span>
                                        </h2>
                                    </div>
                                    <div class="modal-body py-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                                    <input type="text" name="des" id="des" class="form-control" maxlength="75" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Link Video</label>
                                                    <input type="text" name="link" id="link" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Thumbnail</label>
                                                    <input type="file" name="foto_kegiatan" id="foto_kegiatan" class="form-control" required>
                                                    <input type="hidden" id="foto_kegiatan_old" name="foto_kegiatan_old" class="form-control">
                                                    <input type="hidden" id="id" name="id" class="form-control">
                                                </div>
                                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="border-top: 1px dashed #ccc;">
                                        <div class="d-flex pt-3 align-items-center justify-content-end">
                                            <div><button type="submit" class="btn btn-outline  btn-primary rounded-4 text-center" style="width: 200px;">Simpan</button></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="video-gallery" class="row lightGallery">
                    <?php foreach ($getBeritaKegiatan as $key => $value) : ?>
                        <div class="image-tile text-decoration-none col-xl-3 col-lg-3 col-md-4 col-6 position-relative">
                            <img src="<?= base_url() ?>/uploads/kegiatan/<?= $value->thumbnail ?>" alt="image" />
                            <div class="demo-gallery-poster" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $key ?>">
                                <img src="<?= base_url() ?>assets/images/lightbox/play-button.png" alt="image">
                            </div>
                            <div class="truncate-text" data-des="<?= $value->des ?>">
                                <?= strlen($value->des) > 50 ? substr($value->des, 0, 30) . '...' : $value->des ?>
                            </div>
                            <div class="text-secondary" style="font-weight: 800;"><?= date('d M y', strtotime($value->tgl_input)) ?></div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $key ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content p-0" style="background-color: transparent; border-radius: 12px;">
                                        <?= $value->link ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Dropdown -->
                            <?php if ($this->session->userdata('level_user') == 1) { ?>

                                <div class="dropdown position-absolute" style="bottom: 1px; right: 10px;">
                                    <button class="btn btn-link dropdown-toggle p-0" type="button" id="dropdownMenuButton<?= $key ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $key ?>">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-id="<?= $value->id ?>" data-bs-target="#exampleModaltambah">Edit</a>
                                        <a class="dropdown-item" onclick="hapusBeritaKegiatan(<?= $value->id ?>)">Delete</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- 
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg modal-simpan" id="spinner" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered bg-transparent">
        <div class="modal-content text-center bg-transparent border-0">
            <div class="d-flex justify-content-center">
                <div class="spinner-grow text-light" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/chartjs.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    var options = {
        series: [{
                name: '2022',
                data: [
                    278,
                    94,
                    152,
                    89,
                    141,
                    182,
                    89,
                    119,
                    124,
                    131,
                    101,
                ]
            }, {
                name: '2023',
                data: [
                    691,
                    345,
                    350,
                    206,
                    285,
                    350,
                    331,
                    292,
                    246,
                    275,
                    229,
                ]
            }, {
                name: '2024',
                data: [
                    710,
                    194,
                    99,
                    95,
                    193,
                    209,
                    113,
                    88,
                    105,
                    125,
                    71,
                ]
            },
            //  {
            //     name: 'Bucket ',
            //     data: [9, 7, 5, 8, 6, 9, 4]
            // }, {
            //     name: 'Reborn Kid',
            //     data: [25, 12, 19, 32, 25, 24, 10]
            // }
        ],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            // stackType: '100%'
        },
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        title: {
            text: 'Seluruh Kabupaten Provinsi Jambi'
        },
        xaxis: {
            categories: [
                'Kota Jambi',
                'Muaro Jambi',
                'Batanghari',
                'Bungo',
                'Tebo',
                'Merangin',
                'Sarolangun',
                'Tanjabbar',
                'Tanjabtim',
                'Kerinci',
                'Sungai Penuh',
            ],
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " - UMKM"
                }
            }
        },
        fill: {
            opacity: 1

        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 40
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var textElements = document.querySelectorAll('.truncate-text');

        textElements.forEach(function(element) {
            var originalText = element.getAttribute('data-des');

            if (window.innerWidth <= 767) { // Adjust for mobile screens
                var truncatedText = originalText.length > 30 ? originalText.substring(0, 30) + '...' : originalText;
                element.textContent = truncatedText;
            }
        });
    });


    $(document).ready(function() {
        $("#exampleModaltambah").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('id');
            if (id !== null && id !== undefined) {
                // code to execute if id is not null
                var lebel = 'Edit Data Informasi';
                document.getElementsByClassName("pagetitle")[0].innerHTML = lebel;
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>DashboardController/editBeritaKegiatan",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data.id);
                        document.getElementById("foto_kegiatan").removeAttribute("required");

                        $("#des").val(data.des);
                        $("#link").val(data.link);
                        $("#foto_kegiatan_old").val(data.thumbnail);
                        $("#id").val(data.id);
                    },
                });
            }
        });
        $(document).on('hidden.bs.modal', '#exampleModaltambah', function(e) {
            // Reset the modal content
            $(this).find('form')[0].reset();
            $(this).find('.pagetitle').text('Tambah Data Informasi');
            $(this).find('#des').val('');
            $(this).find('#link').val('');
            $(this).find('#foto_kegiatan_old').val('');
            $(this).find('#id').val('');
        });
    });

    function hapusBeritaKegiatan(id) {
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>DashboardController/hapusBeritaKegiatan",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                setTimeout(function() {
                    $('.modal').modal('hide');
                    $('.modal-simpan').modal('show');
                    Swal.fire({
                        title: response.status,
                        text: response.message,
                        icon: response.status,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        location.reload(true);
                    });

                }, 1500);
            },
        });
    }
</script>

<script type="text/javascript">
    // Menambahkan event listener untuk menutup modal
    $(document).on('hidden.bs.modal', function(e) {
        // Mengambil iframe di dalam modal yang ditutup
        $(e.target).find('.video-iframe').attr('src', ''); // Menghapus src untuk menghentikan video
    });

    // Mengatur src iframe saat modal dibuka
    $(document).on('show.bs.modal', function(e) {
        var videoSrc = $(e.relatedTarget).data('video-src'); // Mendapatkan data-src dari link yang diklik
        $(e.target).find('.video-iframe').attr('src', videoSrc); // Mengatur src iframe
    });


    $('#simpan').on('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Anda Yakin?',
            text: "Silahkan klik tombol dibawah untuk melanjutkan aksi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url() ?>DashboardController/simpanKegiatan",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // console.log(data);
                        $('.modal').modal('hide');
                        $('.modal-simpan').modal('show');
                        setTimeout(function() {
                            $('.modal-simpan').modal('hide');
                            Swal.fire({
                                title: response.status,
                                text: response.message,
                                icon: response.status,
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                },
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                location.reload(true);
                            });

                        }, 1500);
                    }
                })
            }
        })
    });
</script>

<script>
    // $(document).ready(function() {

    var ctx = document.getElementById('myChart');

    // var soal_1_a = document.getElementById('soal_1_a').value;
    // var soal_1_b = document.getElementById('soal_1_b').value;
    // var soal_1_c = document.getElementById('soal_1_c').value;
    // var soal_1_d = document.getElementById('soal_1_d').value;
    // var soal_1_e = document.getElementById('soal_1_e').value;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($getDataPerkab as $key => $value) { ?> '<?= $value->kab ?>',
                <?php } ?>
            ],
            datasets: [{
                label: '# pelaku usaha',
                data: [
                    <?php foreach ($getDataPerkab as $key => $value) { ?> '<?= number_format($value->kab_usaha_total, 0, ",", ".") ?>',
                    <?php } ?>
                    // soal_1_a,
                    // soal_1_b,
                    // soal_1_c,
                    // soal_1_d,
                    // soal_1_e,
                ],
                borderWidth: 1,
                backgroundColor: [
                    '#ffb3b3',
                    '#8A2BE2',
                    '#A52A2A',
                    '#DEB887',
                    '#5F9EA0',
                    '#7FFF00',
                    '#D2691E',
                    '#FF7F50',
                    '#6495ED',
                    '#FFF8DC',
                    '#DC143C',
                ],
                tension: 0.5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>