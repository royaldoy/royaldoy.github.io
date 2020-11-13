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
                <h4 class="card-title">Data Member</h4>
                <a class="btn btn-sm btn-inverse-primary" href="<?= base_url(); ?>/admin/member_add">Tambah Member</a>
                <div class="table-responsive my-1">
                    <table class="table table-hover" id="memberTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($member as $m) : ?>

                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><a href="<?= base_url(); ?>/member/view/<?= $m['member_id']; ?>" style="text-decoration: none;"><?= $m['member_nama']; ?></a></td>
                                    <td><?= $m['member_email']; ?></td>
                                    <td><?= $m['member_phone']; ?></td>
                                    <td><a class="btn btn-inverse-info btn-block" href="<?= base_url(); ?>/admin/member_edit/<?= $m['member_id']; ?>">Edit</a>
                                        <a class="btn btn-inverse-danger btn-block" href="<?= base_url(); ?>/admin/member_hapus/<?= $m['member_id']; ?>" onclick="return confirm('Apakah kamu yakin?')">Hapus</a></td>
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