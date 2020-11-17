<!-- Modal -->
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
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('belajarajax/updatedata', ['class' => 'formmahasiswa']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" value="<?= $mhs_id; ?>" name="mhs_id">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" id="nama" name="mhs_nama" class="form-control" id="nama" placeholder="Roy ALdo" value="<?= $mhs_nama; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                    <div class="col-sm-10">
                        <input type="text" name="mhs_tempat" class="form-control" id="tempat" placeholder="Jakarta" value="<?= $mhs_tempat; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" name="mhs_tgl" class="form-control" id="tgl" placeholder="[]" value="<?= $mhs_tgl; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="mhs_jk" id="jk" class="form-control">
                            <option value="" selected>--Pilih--</option>
                            <option value="L" <?= ($mhs_jk == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="P" <?= ($mhs_jk == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- <input type="hidden" name="mhs_kosong" value=""> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning btnsimpan">Update</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <!-- <a href="https://google.com" class="btn btn-secondary btndis">dis</a> -->
            </div>
            </form>
        </div>
    </div>
</div>
<!-- <link rel="stylesheet" href="/sweetalert/package/dist/sweetalert2.css">
<script src="/sweetalert/package/dist/sweetalert2.all.js"></script> -->

<script>
    $(document).ready(function() {
        $('.formmahasiswa').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disabled', true);
                    $('.btnsimpan').html('<div class="putar"><i class="mdi mdi-refresh putar"></i></div>');
                },
                complete: function() {
                    //$('.btnsimpan').removeattr('disable');
                    $('.btnsimpan').attr('disabled', false);
                    $('.btnsimpan').html('Update');
                    // alert($(this).serialize(response))

                },
                success: function(response) {

                    // alert(response.sukses);
                    Swal.fire({
                        // icon: 'success',
                        // title: 'Berhasil Edit',
                        // text: response.sukses,
                        position: 'center',
                        icon: 'success',
                        title: response.sukses,
                        showConfirmButton: false,
                        timer: 1500
                        // footer: '<a href>Why do I have this issue?</a>'
                    })
                    $('#modaledit').modal('hide');
                    datamahasiswa();

                },
                error: function(xhr, responseText, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n    " + thrownError);
                    // console.log(error);
                }
            });
            return false;
        });




    });
</script>