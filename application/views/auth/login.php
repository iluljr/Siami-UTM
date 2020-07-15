  <div class="limiter">
    <div class="container-login100" style="background-color: #F2F2F2;">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <form class="login100-form validate-form" action="<?= base_url('auth/ceklog')?>" method="post">
          <span class="login100-form-title p-b-49">
            Login
          </span>

          <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
            <span class="label-input100">Username</span>
            <input class="input100" type="text" name="username" placeholder="Masukkan Username">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Masukkan Password">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>

          <div class="text-right p-t-8 p-b-31">
            <a href="#">
              Lupa Password?
            </a>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn">
                Login
              </button>
            </div>
          </div>
          <div class="text-center">
            <br><p><a class="small" href="#">Belum Memiliki Akun? Silahkan Hubungi admin untuk pembuatan akun</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
