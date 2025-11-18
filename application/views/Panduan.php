<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SINETAP</title> <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        font-size: .8rem;
    }

    .bg-color {
        background-color: #f1f6fb;
        background-repeat: no-repeat;
        background-size: auto;
    }

    .btn-costum-primary {
        --bs-btn-font-size: .8rem;
        --bs-btn-font-weight: 400;
        --bs-btn-color: #ffffff;
        --bs-btn-bg: #27374b;
        --bs-btn-border-color: #27374b;
        --bs-btn-border-radius: 1.5rem;
        --bs-btn-hover-color: #ffffff;
        --bs-btn-hover-bg: #27374b;
        --bs-btn-hover-border-color: #2b3e54;
        --bs-btn-focus-shadow-rgb: white;
        --bs-btn-active-color: white;
        --bs-btn-active-bg: #2b3e54;
        --bs-btn-active-border-color: none;
        --bs-btn-padding-y: .5rem;
        --bs-btn-padding-x: 1.5rem;
    }

    .btn-costum-outline-primary {
        --bs-btn-font-size: .8rem;
        --bs-btn-font-weight: 400;
        --bs-btn-color: #27374b;
        --bs-btn-bg: transparent;
        --bs-btn-border-color: #27374b;
        --bs-btn-border-radius: 1.5rem;
        --bs-btn-hover-color: #ffffff;
        --bs-btn-hover-bg: #27374b;
        --bs-btn-hover-border-color: none;
        --bs-btn-focus-shadow-rgb: white;
        --bs-btn-active-color: white;
        --bs-btn-active-bg: #2b3e54;
        --bs-btn-active-border-color: none;
        --bs-btn-padding-y: .5rem;
        --bs-btn-padding-x: 1.5rem;
    }

    .form-control,
    .form-select {
        font-size: .8rem;
        background-color: #fff;
        background-image: none;
        border: 1px solid #fff;
        border-radius: 1.5rem;
        color: #555;
        display: block;
        height: 34px;
        line-height: 1.42857;
        padding: 6px 12px;
        width: 100%;
    }

    .progressbar {
        counter-reset: step;
        padding: 0;
        text-align: center;
    }

    .progressbar li {
        list-style-type: none;
        width: 20%;
        float: left;
        position: relative;
        text-align: center;
        color: #e6e6e6;
    }

    .progressbar li:before {
        width: 15px;
        height: 15px;
        content: '';
        line-height: 30px;
        border: 2px solid #e6e6e6;
        background-color: #e6e6e6;
        display: block;
        text-align: center;
        margin: auto auto 5px auto;
        border-radius: 50%;
        transition: all .8s;
        z-index: 2;
        position: relative;
    }

    .progressbar li:after {
        width: 100%;
        height: 2px;
        content: '';
        position: absolute;
        background-color: #e6e6e6;
        top: 7px;
        left: -50%;
        transition: all .8s;
    }

    .progressbar li:first-child:after {
        content: none;
    }

    .progressbar li.active:before {
        border-color: #00cc00;
        background-color: #00cc00;
        transition: all .8s;
        color: red;
    }

    .progressbar li.active:after {
        background-color: #00cc00;
        transition: all .8s;
    }

    .progressbar li.active {
        color: #7d7d7d;
    }

    .card {
        border: 0;
    }

    .cardx {
        list-style-type: none;
        padding: 0;
    }
</style>

<body class="bg-color">
    <!-- <div class="container bg-white">
        <div class="row pt-5 pb-3">
            <div class="col">
                <ul id="progress-bar" class="progressbar">
                    <li class="active">Informasi</li>
                    <li>Profil</li>
                    <li>Alamat</li>
                    <li>Usaha</li>
                    <li>Lainya</li>
                </ul>
            </div>
        </div>
    </div> -->
    <div class="container">
        <div class="row pt-4">
            <div class="input-group mb-3">
                <a href="<?= base_url('uploads/panduan/DOKUMEN 5JUTA.docx') ?>" class="btn btn-outline-secondary" type="button" id="button-addon1">Downlaod</a>
                <input type="text" class="form-control" placeholder="PANDUAN DOKUMEN 5 JUTA" readonly aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
            <div class="input-group mb-3">
                <a href="<?= base_url('uploads/panduan/DOKUMEN 10JUTA.docx') ?>" class="btn btn-outline-secondary" type="button" id="button-addon1">Downlaod</a>
                <input type="text" class="form-control" placeholder="PANDUAN DOKUMEN 10 JUTA" readonly aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
            <div class="input-group mb-3">
                <a href="<?= base_url('uploads/panduan/DOKUMEN 20JUTA.docx') ?>" class="btn btn-outline-secondary" type="button" id="button-addon1">Downlaod</a>
                <input type="text" class="form-control" placeholder="PANDUAN DOKUMEN 20 JUTA" readonly aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
            <div class="input-group mb-3">
                <a href="<?= base_url('uploads/panduan/SINETAP.pdf') ?>" class="btn btn-outline-secondary" type="button" id="button-addon1">Downlaod</a>
                <input type="text" class="form-control" placeholder="PANDUAN PENGISIAN DATA DIAPLIKASI" readonly aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
        </div>
        <div class="row pt-4">
            <div class="col" style="position: fixed; bottom: 25px !important;">
                <div class="d-flex justify-content-between">
                    <div><a href="<?= base_url('TransaksiController/landing') ?>" id="Back" class="btn btn-costum-outline-primary">Sebelumnya</a></div>
                    <!-- <div><a type="button" id="Next" class="btn btn-costum-primary">Selanjutnya</a></div> -->
                </div>
            </div>
        </div>
    </div>