<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Event</h4>
        <?= csrf_field(); ?>
        <p class="card-description">
          Halaman untuk menambah data event
        </p>
        <div class="row">
          <div class="col-md-8">
            <form class="forms-sample" action="<?= base_url(); ?>/admin/event_simpan" method="post">
              <div class="form-group">
                <label for="nama">Nama Event</label>
                <input type="text" value="<?= old('event_nama'); ?>" class="form-control <?= ($validation->hasError('event_nama')) ? 'is-invalid' : ''; ?>" id="nama" name="event_nama" placeholder="Skrening Kimetsu no Yaiba" maxlength="40" autofocus>
              </div>
              <div class="form-group">
                <label for="penyelenggara">Penyelenggara</label>
                <input type="text" value="<?= old('event_penyelenggara'); ?>" class="form-control <?= ($validation->hasError('event_penyelenggara')) ? 'is-invalid' : ''; ?>" id="penyelenggara" name="event_penyelenggara" placeholder="Kementrian Laut RI" maxlength="50">
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" value="<?= old('event_tanggal'); ?>" class="form-control <?= ($validation->hasError('event_tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="event_tanggal" placeholder="">
              </div>
              <div class="form-group">
                <label for="tempat">Tempat</label>
                <input type="text" value="<?= old('event_tempat'); ?>" class="form-control <?= ($validation->hasError('event_tempat')) ? 'is-invalid' : ''; ?>" id="tempat" name="event_tempat" placeholder="Jogja Expo Center" maxlength="50">
              </div>
              <div class="form-group">
                <label for="peserta">Jumlah Peserta</label>
                <input type="number" value="<?= old('event_peserta'); ?>" min="0" onkeypress="return event.charCode >= 48" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" class="form-control <?= ($validation->hasError('event_peserta')) ? 'is-invalid' : ''; ?>" id="peserta" name="event_peserta" placeholder="100" maxlength="4">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control <?= ($validation->hasError('event_tempat')) ? 'is-invalid' : ''; ?>" name="event_deskripsi" id="deskripsi" rows="5"><?= old('event_deskripsi'); ?></textarea>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Tambah</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>