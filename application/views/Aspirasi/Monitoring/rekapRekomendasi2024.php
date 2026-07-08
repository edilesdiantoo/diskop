<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <!-- <a href="<?= base_url(); ?>TambahUser" class="btn btn-outline-primary mr-4">Tambah Data</a> -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button> -->
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title">Data Pelaku Usaha</h4>
                        <p class="card-description">
                            Semua data calon penerima
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Using flexbox for layout with equal space on both sides -->
                                <div class="d-flex justify-content-between mb-3">
                                    <div style="flex: 1;" class="mr-3">
                                        <select class="form-control getTahunPenerima" id="tahun_penerima">
                                            <option value="">-Tahun Penerima-</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                    </div>
                                    <div style="flex: 1;" class ="mr-2">
                                        <select class="form-control level_satu" id="kab_usaha">
                                            <option value="">-Pilih Kab-</option>
                                            <?php
                                            $getKab = $this->M_master->getKab(15)->result();
                            foreach ($getKab as $value) {
                                echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                            }
                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" id="print" class="btn btn-outline-warning mr-1">Print</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="table-responsive">
                            <table id="resultDiv" class="table">
                                
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // Helper function to calculate the sum
        function calculateSum(className, targetElement) {
            var values = [];
            document.querySelectorAll(className).forEach(function(el) {
                values.push(Number(el.value));
            });
            var total = values.reduce((a, b) => a + b, 0);
            document.getElementById(targetElement).innerHTML = total;
            $("#" + targetElement + "_val").val(total);
        }

        // Calculate Sum for various categories
        calculateSum('.kec', 'sumKec');
        calculateSum('.mil_5', 'mil_5');
        calculateSum('.mak_5', 'mak_5');
        calculateSum('.wp_5', 'wp_5');

        // Calculate total aspirasi
        var totalAspirasi = [
            parseInt($('#mil_5_val').val()),
            parseInt($('#mak_5_val').val()),
            parseInt($('#wp_5_val').val())
        ].reduce((a, b) => a + b, 0);
        
        document.getElementById('totCalonPenrima').innerHTML = totalAspirasi;
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // When the year or kabupaten dropdown changes
        $('#kab_usaha, #tahun_penerima').change(function() {
            var kab = $('#kab_usaha').val(); // Get selected kab
            var tahun = $('#tahun_penerima').val(); // Get selected tahun

            // Check if tahun is selected
            if (tahun === '') {
                alert('Harus pilih tahun!');
                return; // Stop the function if no year is selected
            }

            // Check if kab is selected
            if (kab !== '') {
                $.ajax({
                    url: '<?= base_url('LaporanController/getByYearsKab'); ?>', // Update this with the correct controller/method URL
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        kab: kab,
                        tahun: tahun
                    },

                    success: function(response) {
                        // console.log(response);
                        
                        // Handle the successful response here, e.g., updating a table
                        $('#resultDiv').html(response); // This is where you display your data
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    });
</script>

