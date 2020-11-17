<?= (!session()->get('login')) ? " <script>window.location.href = '/login'</script>" : ''; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <!-- plugins:css -->
  <!-- Compiled and minified CSS -->


  <!-- Compiled and minified JavaScript -->
  
  <link rel="stylesheet" href="/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/images/favicon.png" />
  <link rel="stylesheet" href="/sweetalert/package/dist/sweetalert2.css">

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?= $this->include('layout/navbar'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?= $this->include('layout/sidebar'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <?= $this->renderSection('content'); ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Roy ALdo 2020</span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span> -->
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/vendors/base/vendor.bundle.base.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="/vendors/chart.js/Chart.min.js"></script>
  <script src="/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/js/off-canvas.js"></script>
  <script src="/js/hoverable-collapse.js"></script>
  <script src="/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/js/dashboard.js"></script>
  <script src="/js/data-table.js"></script>
  <script src="/js/jquery.dataTables.js"></script>
  <script src="/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script src="/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="/sweetalert/package/dist/sweetalert2.all.js"></script>


  <div class="viewmodal" style="display: none;"> </div>
  <script>
    function datamahasiswa() {
      $.ajax({
        url: "<?= base_url('belajarajax/ambildata'); ?>",
        dataType: "json",
        success: function(response) {
          $('.viewdata').html(response.data)
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }

      });
    }


    $(document).ready(function() {
      datamahasiswa();

      $('.tambahmhs').click(function(e) {
        e.preventDefault();
        $.ajax({
          url: "<?= base_url('belajarajax/formtambah'); ?>",
          dataType: "json",
          beforeSend: "",
          success: function(response) {
            $('.viewmodal').html(response.data).show();

            $('#modaltambah').modal('show');
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          }

        });

      });

      $('.tombol-tambah-multi').click(function(e) {
        e.preventDefault();
        $.ajax({
          url: "<?= base_url('belajarajax/formtambahmulti'); ?>",
          dataType: "json",
          beforeSend: function() {
            $('.viewdata').html('<button class="btn btn-sm btn-light" style="background-color:white;border-color:white;"><div class="putar"><i class="mdi mdi-refresh putar"></i></div></div></button>');
          },
          success: function(response) {
            $('.viewdata').html(response.data).show();
            // $('#modaltambah').modal('show');
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          }

        });
      });


    });


    function edit(mhs_id) {

      $.ajax({
        type: "post",
        url: "<?= base_url('belajarajax/form_mhsedit'); ?>",
        data: {
          mhs_id: mhs_id
        },
        dataType: "json",
        success: function(response) {
          if (response.sukses) {
            $('.viewmodal').html(response.sukses).show();
            $('#modaledit').modal('show');
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }

      });
    }



    function hapus(mhs_id, mhs_nama) {
      Swal.fire({
        title: 'Yakin ingin hapus data?',
        text: `Data mahasiswa ${mhs_nama} bakal hilang dari dunia lho!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "post",
            url: "<?= base_url('belajarajax/hapusdata'); ?>",
            data: {
              mhs_id: mhs_id
            },
            dataType: "json",
            success: function(response) {
              if (response.sukses) {
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: response.sukses,
                  showConfirmButton: false,
                  timer: 1000
                });
                datamahasiswa();
              }

            },
            error: function(xhr, ajaxOptions, thrownError) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

            // }
          });
        }
      });
    }
  </script>

</body>

</html>