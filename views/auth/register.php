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
      <div class="row justify-content-center align-items-center mt-4">
        <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                
                  <center>
                    <img
                      src="../../assets/images/logo/logosmaislampbscijantung.png"
                      alt="SMA-Islam-PBS-Cijantung"
                      style="height: 80px; width: auto"
                    />
                  </center>
                
                  <h2 class="text-center mt-4">
                    <b>PENDAFTARAN PPDB <br> SMA ISLAM PB SOEDIRMAN</b>
                  </h2>
              </div>

              <form>
                <div class="form-group">
                  <label for="username">Email</label>
                  <input
                    id="username"
                    name="username"
                    type="email"
                    class="form-control"
                    placeholder="Masukkan "
                    required
                  />
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="Masukkan Password"
                    required
                  />
                </div>

                <div class="form-group row">
                  <div class="col-6">
                    <label for="username">Nama Depan</label>
                    <input
                      id="username"
                      name="username"
                      type="text"
                      class="form-control"
                      placeholder="Masukkan Nama Depan"
                      required
                    />
                  </div>
                  <div class="col-6">
                    <label for="username">Nama Belakang</label>
                    <input
                      id="username"
                      name="username"
                      type="text"
                      class="form-control"
                      placeholder="Masukkan Nama Belakang"
                      required
                    />
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-6">
                    <div class="">
                      <label for="username">Tempat Lahir</label>
                      <input
                        id="username"
                        name="username"
                        type="text"
                        class="form-control"
                        placeholder="Masukkan "
                        required
                      />
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="username">Tanggal Lahir</label>
                    <input
                      id="username"
                      name="username"
                      type="date"
                      class="form-control"
                      placeholder="Masukkan "
                      required
                    />
                  </div>
                </div>

                <div class="form-group">
                  <label for="username">No. HP</label>
                  <input
                    id="username"
                    name="username"
                    type="number"
                    class="form-control"
                    placeholder="Masukkan "
                    required
                  />
                </div>

                <div class="form-group">
                  <label for="username">Alamat Lengkap</label>
                  <textarea
                    name="alamat"
                    class="form-control"
                    placeholder="Masukkan "
                    id=""
                    rows="5"
                  ></textarea>
                </div>

                <div class="text-center mt-4">
                  <a href="verification.php">
                  <button
                    type="button"
                    class="btn btn-block btn-primary fw-bold"
                  >
                    Daftar
                  </button>
                  </a>
                </div>
              </form>
              <div class="login-account text-center mt-4">
                <span class="mt-2">Have an account?</span>
                <a href="login.html" id="show-signup" class="link">Sign In</a>
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
