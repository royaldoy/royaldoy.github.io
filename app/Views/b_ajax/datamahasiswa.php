<!-- <a class="mhs-edit2" href="https://google.com"> link </a> -->
<?= form_open('belajarajax/hapusmulti', ['class' => 'formhapusmulti']); ?>
<p>
    <button type="submit" class="btn btn-inverse-danger btn-sm"><i class="mdi mdi-close"></i> Hapus Semua</button>
</p>

<table class="table" id="mahasiswaTable">
    <thead>
        <tr>
            <th><input type="checkbox" style="height: 20px;" class="form-control" id="centangsemua"></th>
            <th>#</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Tempat</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $e) : ?>

            <tr>
                <td><input style="height: 20px;" type="checkbox" class="form-control centangid" name="mhs_id[]" value="<?= $e['mhs_id']; ?>"></td>
                <td><?= $i++; ?></td>
                <td><?= $e['mhs_nama']; ?></td>
                <td><?= date('d F Y', strtotime($e['mhs_tgl'])); ?></td>
                <td><?= $e['mhs_tempat']; ?></td>
                <td><?= ($e['mhs_jk'] == 'L') ? 'Laki-laki' : 'Perempuan' ?></td>

                <td><button class="btn btn-inverse-warning btn-icon" style="width: 55px; height: 40px;" onclick="edit('<?= $e['mhs_id']; ?>')"><i class="mdi mdi-grease-pencil"></i></button>
                    <button class="btn btn-inverse-danger btn-sm" style="width: 55px; height: 40px;" onclick="hapus('<?= $e['mhs_id']; ?>','<?= $e['mhs_nama']; ?>')"><i class="mdi mdi-delete-forever"></i></button>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?= form_close(); ?>
<script>
    $(document).ready(function() {
        // $('#memberTable').DataTable();
        $('#mahasiswaTable').DataTable();

        $('#centangsemua').click(function(e) {
            // e.preventDefault();

            if ($(this).is(':checked')) {
                $('.centangid').prop('checked', true);

            } else {
                $('.centangid').prop('checked', false);

            }
        });


        $('.formhapusmulti').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangid:checked');
            if (jmldata.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Perhatian',
                    text: 'Silakan pilih data yang akan dihapus'

                });
            } else {
                Swal.fire({
                    title: 'Yakin Hapus data ?',
                    text: `${jmldata.length} data akan dihapus`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yap!',
                    cancelButtonText: 'Ngga jadi'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            dataType: "json",
                            success: function(response) {
                                if (response.sukses) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'data telah terhapus!',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        backdrop: `rgba(0,0,123,0.4)
                                       url("https://media3.giphy.com/media/1jgLDGD1Bn27e/giphy.gif?cid=ecf05e47b82399d2e649f8e2a22fd9dfbe599d5e8abbce05&rid=giphy.gif")
                                       right bottom
                                       no-repeat`
                                    });
                                    datamahasiswa();

                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                            }
                        });

                    }
                })

            }
            return false;
        });

    });
</script>