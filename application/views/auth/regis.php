    <div class="limiter">
    <div class="container-login100" style="background-color: #F2F2F2;">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <form class="login100-form validate-form" action="cek_register.php" method="post">
          <span class="login100-form-title p-b-49">
            Halaman Pendaftaran
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

          <div class="wrap-input100 validate-input m-b-23" data-validate = "Level is reauired">
            <span class="label-input100">Level</span>
            <select name="level" class="input100">
              <option disabled="disabled" selected="selected">-- Pilih Level Anda --</option>
              <option value="4" disabled="disabled">- Kasir -</option>
              <option value="2" > Distributor </option>
              <option value="3"> User </option>

              </select>
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>
          
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn">
                Daftar
              </button>
            </div>
          </div>
          <center>
            <br><p style="text-align:center;">Sudah Mempunyai Akun? <a href="<?= base_url('auth'); ?>">KLIK DISINI</a></p>
          </center>
        </form>
      </div>
    </div>
  </div>
