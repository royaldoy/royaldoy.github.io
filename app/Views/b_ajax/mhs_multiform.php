<?= form_open('belajarajax/simpanmulti', ['class' => 'formsimpanmulti']); ?>
<?= csrf_field(); ?>
<div class="my-1">
    <button class="btn btn-success btn-simpan-multi"> Simpan</button>
    <button type="submit" class="btn btn-light btn-batal"> Batal</button>
</div>
<table class=" table table-bordered">
    <thead>
        <!-- <th>#</th> -->
        <th>Nama</th>
        <th>Tempat</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Aksi</th>
    </thead>
    <tbody class="form-tambah">
        <tr>
            <td>
                <input type="text" name="mhs_nama[]" class="form-control" id="">
            </td>


            <td>
                <input type="text" name="mhs_tempat[]" class="form-control" id="">
            </td>


            <td>
                <input type="date" name="mhs_tgl[]" class="form-control" id="">
            </td>


            <td>
                <select name="mhs_jk[]" id="" class="form-control">
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <!-- <input type="text" name="mhs_jk[]" class="form-control" id=""> -->
            </td>
            <td><button class="btn btn-icon btn-inverse-primary btn-rounded add-form"><i class="mdi mdi-library-plus"></i></button></td>
        </tr>
    </tbody>
</table>
<?= form_close(); ?>
<script>
    $(document).ready(function(e) {

        $('.add-form').click(function(e) {
            e.preventDefault();
            $('.form-tambah').append(`
            <tr>
            <td>
                <input type="text" name="mhs_nama[]" class="form-control" id="">
            </td>


            <td>
                <input type="text" name="mhs_tempat[]" class="form-control" id="">
            </td>


            <td>
                <input type="date" name="mhs_tgl[]" class="form-control" id="">
            </td>


            <td>
                <select name="mhs_jk[]" id="" class="form-control">
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <!-- <input type="text" name="mhs_jk[]" class="form-control" id=""> -->
            </td>
            <td><button class="btn btn-icon btn-inverse-danger btn-rounded del-form"><i class="mdi mdi-close"></i></button></td>
        </tr>
            
            `);

        });

        $('.formsimpanmulti').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btn-simpan-multi').attr('disabled', true);
                    $('.btn-simpan-multi').html('<div class="putar"><i class="mdi mdi-refresh putar"></i></div>');
                },
                complete: function() {
                    //$('.btn-simpan-multi').removeattr('disable');
                    $('.btn-simpan-multi').attr('disabled', false);
                    $('.btn-simpan-multi').html('Simpan');
                    // alert($(this).serialize(response))

                },
                success: function(response) {

                    if (response.sukses) {
                        Swal.fire({
                            title: response.sukses,
                            width: 600,
                            padding: '3em',
                            // background: '#fff url(/images/trees.png)',
                            backdrop: `rgba(0,0,123,0.4)
                                       url("https://media3.giphy.com/media/1jgLDGD1Bn27e/giphy.gif?cid=ecf05e47b82399d2e649f8e2a22fd9dfbe599d5e8abbce05&rid=giphy.gif")
                                       left bottom
                                       no-repeat`
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = ('<?= base_url('/belajarajax'); ?>');
                            }
                        })

                    } else {
                        alert("ada yang salah");

                    }
                },
                error: function(xhr, responseText, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n    " + thrownError);
                }

            });
            return false;
        });


        $('.btn-batal').click(function(e) {
            e.preventDefault();
            datamahasiswa();

        });
    });

    $(document).on('click', '.del-form', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
    });
</script>