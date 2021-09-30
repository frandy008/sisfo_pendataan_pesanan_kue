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
              <h2 class="mb-0 p-1">Form Input</h2>
            </div>
          </header>
          
          <!-- Forms Section-->
          <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
                <!-- Basic Form-->
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="h4 mb-0">Pesanan</h3>
                    </div>
                    <div class="card-body">
                      <?php include 'main/koneksi.php' ?>
                      <form>
                        <div class="mb-3">
                          <label class="form-label">Nama Kue</label>
                          <select class="form-control" name="kode_kue">
                            <option value="" selected disabled>Pilih</option>
                            <?php 
                            $k = mysqli_query($conn,"SELECT * FROM tbl_kue ORDER BY nama_kue ASC");
                            while ($d = mysqli_fetch_assoc($k)) {
                            ?>
                            <option value="<?php echo $d['kode_kue'] ?>"><?php echo $d['nama_kue'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Jumlah (Toples)</label>
                          <input class="form-control" name="jumlah" type="number">
                        </div>
                        <button class="btn btn-primary btn-tambahkan" data-btn="isi-pesanan" type="button">Tambahkan</button>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="h4 mb-0">Kue yang dipesan</h3>
                    </div>
                    <div class="card-body">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Nama Kue</th>
                            <th>Jumlah (Toples)</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="data">
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer">
                      <form>
                        <input type="hidden" name="kode">
                        <div class="mb-3">
                            <label class="form-label">Nama Pemesan</label>
                            <input class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                      </form>
                      <button class="btn btn-primary btn-update" type="button" data-btn="pesanan">Proses</button>
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

    <script>
      get_data('isi-pesanan');
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