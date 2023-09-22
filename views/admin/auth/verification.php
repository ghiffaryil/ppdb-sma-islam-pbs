<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Lato:300,400,700,900"] },
        custom: {
          families: [
            "Flaticon",
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["../../assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/atlantis.css" />
  </head>

  <body class="login">
    <div class="container">
      <div
        class="row justify-content-center align-items-center"
        style="height: 100vh"
      >
        <div class="col-lg-5">
          <div class="card">
            <div class="card-body">
              <h2 class="text-center mt-4">
                <b>Verifikasi Akun</b>
              </h2>
              
              <form>
                <div class="form-group">
                  <label for="username">Kode Verifikasi</label>
                  <input
                    id="username"
                    name="username"
                    type="email"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">

                
                <div class="text-center mt-1">
                  <a href="../index.php"
                    ><button
                      type="button"
                      class="btn btn-block btn-primary"
                    >
                      Verifikasi
                    </button></a
                  >
                </div>
                </div>
              </form>
              <div class="login-account text-center mt-2">
                <span class="mt-2">Tidak mendapatkan kode verifikasi?</span>
                <br>
                <a href="register.html" id="show-signup" class="link"
                  >Kirim ulang kode ke Email (59)</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Include Bootstrap and other scripts -->
    <script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
  </body>
</html>
