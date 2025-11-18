<style>
    .tabelku {
        border-collapse: collapse;
        table-layout: fixed;
        width: 310px;
    }

    .tdku {
        border: solid 1px #666;
        width: 110px;
        word-wrap: break-word;
    }
</style>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <!-- <a href="<?= base_url(); ?>MasterController/TambahUser" class="btn btn-outline-primary mr-4">Tambah Data</a> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pelaku Usaha</h4>
                <p class="card-description">

                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table tabelku">
                                <thead>
                                    <tr>
                                        <th>Verifikasi <br> Data Pelaku Usaha</th>
                                        <th>Verifikasi <br> Lokasi Usaha</th>
                                        <th>Edit Data <br> Pelaku Usaha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('VerifikasiController/CekDataPelakuUsaha/' . $id_pelaku_usaha) ?>" type="button" class="btn btn-secondary btn-lg">Cek Data</a>
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-secondary btn-lg">Input Foto Lokasi</a>
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-secondary btn-lg">Edit Data</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>