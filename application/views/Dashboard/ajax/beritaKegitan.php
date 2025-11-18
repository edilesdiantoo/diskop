<?php foreach ($getBeritaKegiatan as $key => $value) : ?>
    <div class="image-tile text-decoration-none col-xl-3 col-lg-3 col-md-4 col-6 position-relative">
        <img src="<?= base_url() ?>/uploads/kegiatan/<?= $value->thumbnail ?>" alt="image" />
        <div class="demo-gallery-poster" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $key ?>">
            <img src="<?= base_url() ?>assets/images/lightbox/play-button.png" alt="image">
        </div>
        <div style="color: #000; font-weight: 900;"><?= $value->des ?></div>
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
        <div class="dropdown position-absolute" style="bottom: 1px; right: 10px;">
            <button class="btn btn-link dropdown-toggle p-0" type="button" id="dropdownMenuButton<?= $key ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $key ?>">
                <a class="dropdown-item" data-bs-toggle="modal" data-id="<?= $value->id ?>" data-bs-target="#exampleModaltambah">Edit</a>
                <a class="dropdown-item" onclick="hapusBeritaKegiatan(<?= $value->id ?>)">Delete</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Pagination Links -->
<nav aria-label="...">
    <?= $pagination; ?>
</nav>