<div class="btn-group show">
    <ul class="multiselect-container dropdown-menu show" style=" max-height: 200px; overflow: auto">
        <?php
        foreach ($getRekomendasi as $row) { ?>
            <li type="button" onClick="<?= $func ?>('<?php echo $row->rekomendasi_dari; ?>');">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 49%;"><?php echo strtoupper($row->rekomendasi_dari); ?></td>
                    </tr>
                </table>
            </li>
        <?php } ?>
    </ul>
</div>


<style type="text/css">
    .dropdown-menu.show {
        padding: 20px;
        background-color: #e9ecef;
    }

    .dropdown-menu {
        font-weight: bold;
        width: 250px;
    }

    .dropdown-menu li:hover {
        background-color: white;
    }
</style>