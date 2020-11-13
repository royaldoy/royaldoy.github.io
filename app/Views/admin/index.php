<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body dashboard-tabs p-0">
        <ul class="nav nav-tabs px-4" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
          </li>
        </ul>
        <div class="tab-content py-0 px-0">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="d-flex flex-wrap justify-content-xl-between">
              <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Event Terdekat</small>
                  <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                      <a class="dropdown-item" href="#">12 Aug 2018</a>
                      <a class="dropdown-item" href="#">22 Sep 2018</a>
                      <a class="dropdown-item" href="#">21 Oct 2018</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Tempat</small>
                  <h5 class="mr-2 mb-0">Surakarta</h5>
                </div>
              </div>
              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Peserta Belum Di Acc</small>
                  <h5 class="mr-2 mb-0">9833550</h5>
                </div>
              </div>
              <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                <div class="d-flex flex-column justify-content-around">
                  <small class="mb-1 text-muted">Event Belum Di Acc</small>
                  <h5 class="mr-2 mb-0">3497843</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $i = 0; ?>
<?php foreach ($event as $e) : ?>
  <?php if ($i++ % 3 == 0) {
  ?>
    <div class="card-deck my-2">
    <?php } ?>

    <?php if ($i < 100) { ?>
      <div class="card">
        <img class="card-img-top" src="https://i.pinimg.com/474x/db/e7/b9/dbe7b985512911a79a50c9ae9e0a7f12.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?= $e['event_nama']; ?></h5>
          <p class="card-text"><?= $e['event_deskripsi']; ?></p>
        </div>
        <button class="btn btn-inverse-primary">
          JOIN
        </button>

      </div>
    <?php } ?>
    <?php if ($i % 3 == 0) { ?>
    </div>
  <?php } ?>
<?php endforeach; ?>


<?= $this->endSection(); ?>