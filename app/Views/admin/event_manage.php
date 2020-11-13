<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getflashdata('pesan')) : ?>
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success" role="alert">
        <?= session()->getflashdata('pesan'); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Event</h4>
        <a class="btn btn-sm btn-inverse-primary" href="<?= base_url(); ?>/admin/event_add">Tambah Event</a>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Penyelenggara</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>Peserta</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($event as $e) : ?>

                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $e['event_nama']; ?></td>
                  <td><?= $e['event_penyelenggara']; ?></td>
                  <td><?= $e['event_tanggal']; ?></td>
                  <td><?= $e['event_tempat']; ?></td>
                  <td><?= $e['event_peserta_isi']; ?>/<?= $e['event_peserta']; ?></td>
                  <td><label class="badge <?= ($e['event_status'] == 'belum mulai') ? 'badge-success' : '' ?>"><?= $e['event_status']; ?></label></td>
                  <td><a href="<?= base_url(); ?>/admin/event_edit/<?= $e['event_id']; ?>"><button class="btn btn-primary btn-rounded btn-icon"><i class="mdi mdi-grease-pencil"></i></button></a><?= " "; ?>
                    <a href="<?= base_url(); ?>/admin/event_hapus/<?= $e['event_id']; ?>"><button onclick="return confirm('Apakah kamu yakin?')" href="#" class="btn btn-rounded btn-danger btn-icon"><i class="mdi mdi-delete-sweep"></i></button></a></td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>

<?= $this->endSection(); ?>