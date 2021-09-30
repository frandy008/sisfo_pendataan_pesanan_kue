<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'com/title.php' ?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <?php include 'com/header.php' ?>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <?php include 'com/side.php' ?>
        <div class="content-inner w-100">
          <!-- Page Header-->
          <header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Data</h2>
            </div>
          </header>
          
          <section class="tables">   
            <div class="container-fluid">
              <div class="row gy-4">
                <div class="col-lg-5">
                  <div class="card mb-0">
                    <div class="card-header">
                      <h3 class="h4 mb-0">Pembelian Bahan</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Kode Pesanan</th>
                              <th>Nama</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=1;
                            include 'main/koneksi.php';
                            $q = mysqli_query($conn,"SELECT * FROM tbl_pesanan WHERE status != '0'");
                            while ($d = mysqli_fetch_assoc($q)) { ?>
                            <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $d['kode_pesanan'] ?></td>
                              <td><?php echo $d['nama'] ?></td>
                              <td>
                                <button class="btn btn-primary btn-lihat" data-id="<?php echo $d['kode_pesanan'] ?>">Lihat</button>
                              </td>
                            </tr>
                            <?php }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-7">
                  <div class="card mb-0">
                    <div class="card-header">
                      <h3 class="h4 mb-0">Daftar Bahan</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Bahan Baku</th>
                              <th>Jumlah</th>
                              <th>Harga</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody id="data">
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Page Footer-->
          <?php include 'com/footer.php' ?>
        </div>
      </div>
    </div>

    <div class="modal fade text-start modalEdit" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Form</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" name="kode">
              <div class="mb-3">
                <label class="form-label">Nama Bahan Baku</label>
                <input class="form-control" name="nama_bahan_baku" placeholder="Tepung terigu">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-update" type="button">Simpan</button>
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>

    <script src="js/jquery-3.6.0.min.js"></script>
    
    <script src="js/memedi_library_enc.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
      
    </script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>