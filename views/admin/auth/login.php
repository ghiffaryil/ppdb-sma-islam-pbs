
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
              <center>
                <img
                  src="../../assets/images/logo/logosmaislampbscijantung.png"
                  alt="SMA-Islam-PBS-Cijantung"
                  style="height: 150px; width: auto"
                />
              </center>
              <h2 class="text-center mt-4">
                <b>PPDB SMA ISLAM PB SOEDIRMAN</b>
              </h2>
              
              <form>
                <div class="form-group">
                  <label for="username">Email</label>
                  <input
                    id="username"
                    name="username"
                    type="email"
                    class="form-control"
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
                    required
                  />
                </div>
                <div class="form-group form-check d-none">
                  <input
                    type="checkbox"
                    class="form-check-input"
                    id="rememberme"
                  />
                  <label class="form-check-label" for="rememberme"
                    >Remember Me</label
                  >
                </div>
                <div class="text-center mt-4">
                  <a href="../home/home.php"
                    ><button
                      type="button"
                      class="btn btn-block btn-primary fw-bold"
                    >
                      Sign In
                    </button></a
                  >
                </div>
              </form>
              <div class="login-account text-center mt-4">
                <span class="mt-2">Don't have an account yet?</span>
                <a href="register.php" id="show-signup" class="link"
                  >Sign Up</a
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
