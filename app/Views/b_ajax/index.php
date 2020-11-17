<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
    .putar {
        animation-name: spin;
        animation-duration: 1000ms;
        animation-iteration-count: 5;
        animation-timing-function: linear;

    }


    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);

        }

    }
</style>


<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Mahasiswa </h4>
                <button class="btn btn-sm btn-inverse-primary tambahmhs btn-icon-text"><i class="mdi mdi-account-plus "></i> Tambah Mahasiswa</button>
                <button class="btn btn-sm btn-inverse-dark btn-icon-text tombol-tambah-multi"><i class="mdi mdi-account-plus "></i> Tambah Multi</button>

                <div class="my-2 viewdata">

                </div>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>