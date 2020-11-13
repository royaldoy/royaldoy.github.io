<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit</h4>
                <?= csrf_field(); ?>
                <p class="card-description">
                    Halaman untuk Edit data event
                </p>
                <div class="row">
                    <div class="col-md-8">
                        <form class="forms-sample" action="<?= base_url(); ?>/admin/event_update/<?= $event['event_id']; ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama">Nama Event</label>
                                <input type="text" value="<?= (old('event_nama')) ? old('event_nama') : $event['event_nama']; ?>" class="form-control <?= ($validation->hasError('event_nama')) ? 'is-invalid' : ''; ?>" id="nama" name="event_nama" placeholder="Skrening Kimetsu no Yaiba" maxlength="40" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('event_nama'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="penyelenggara">Penyelenggara</label>
                                <input type="text" value="<?= (old('event_penyelenggara')) ? old('event_penyelenggara') : $event['event_penyelenggara']; ?>" class="form-control <?= ($validation->hasError('event_penyelenggara')) ? 'is-invalid' : ''; ?>" id="penyelenggara" name="event_penyelenggara" placeholder="Kementrian Laut RI" maxlength="50">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('event_penyelenggara'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" value="<?= (old('event_tanggal')) ? old('event_tanggal') : $event['event_tanggal']; ?>" class="form-control <?= ($validation->hasError('event_tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="event_tanggal" placeholder="">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('event_tanggal'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tempat">Tempat</label>
                                <input type="text" value="<?= (old('event_tempat')) ? old('event_tempat') : $event['event_tempat']; ?>" class="form-control <?= ($validation->hasError('event_tempat')) ? 'is-invalid' : ''; ?>" id="tempat" name="event_tempat" placeholder="Jogja Expo Center" maxlength="50">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('event_tempat'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="peserta">Jumlah Peserta</label>
                                <input type="number" onkeypress="return event.charCode >= 48" value="<?= (old('event_peserta')) ? old('event_peserta') : $event['event_peserta']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" class="form-control <?= ($validation->hasError('event_peserta')) ? 'is-invalid' : ''; ?>" id="peserta" name="event_peserta" placeholder="100" maxlength="4">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('event_peserta'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control <?= ($validation->hasError('event_deskripsi')) ? 'is-invalid' : ''; ?>" name="event_deskripsi" id="deskripsi" rows="5"><?= (old('event_deskripsi')) ? old('event_deskripsi') : $event['event_deskripsi']; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('event_deskripsi'); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>