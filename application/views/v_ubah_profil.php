<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card">
        <div class="card-body box-profile">
          <div class="text-center pb-3">
            <center class="container2">
              <div class="col-12">
                <div role="button" class="img-circle elevation-2 profile-register" alt="User Image" style="
                  height: 142px;
                  width: 142px;
                  background-size: cover;
                  background-position: center;
                  background-image: url('<?php echo base_url() ?>assets/uploads/foto_profil/<?php echo ( !empty($userdata['photo']) ) ? $userdata['photo'] : 'user_no_image.jpg' ?>');
                " onclick="modal_edit_photo()" id="preview_gambar">
                  <div class="overlay2">
                    <span class="fa fa-edit"></span>
                  </div>
                </div>

                <?php echo form_open('', ' id="image_upload"') ?>
                  <textarea style="display: none;" id="b64" name="image"></textarea>
                </form>
                
              </div>
            </center>
          </div> <!-- /.user-panel -->

          <h3 class="profile-username text-center"><?php echo $userdata['username'] ?></h3>

          <p class="text-muted text-center">Orang Keren</p>

          <a href="#" class="btn btn-primary btn-block" id="simpan_perubahan_btn" onclick="simpan_perubahan()" style="display:none;"><b>Simpan Perubahan</b></a>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <span class="fa fa-user mx-2"></span> Profil
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="container" id="display">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10  col-form-label">
                  <?php echo $userdata['username'] ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputExperience" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10  col-form-label">
                  <?php echo $userdata['email'] ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputExperience" class="col-sm-2 col-form-label">HP</label>
                <div class="col-sm-10  col-form-label">
                  <?php echo '+62 ' . $userdata['hp'] ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button class="btn btn-primary" id="ubah_profil_btn">Ubah Profil</button>
                </div>
              </div>
          </div>
          <div class="container" id="form-edit" style="display:none;">
            <!-- <form action="" method="post" class="form-horizontal"> -->
            <?php echo form_open('', 'class="form-horizontal"'); ?>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" name="username" class="form-control" id="inputName" required="" value="<?php echo $userdata['username'] ?>">
                </div>
              </div>
              <!-- <div class="form-group row">
                <label for="inputExperience" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" name="username" class="form-control" id="inputName" required="" value="<?php echo $userdata['username'] ?>">
                </div>
              </div> -->
              <div class="form-group row">
                <label for="inputExperience" class="col-sm-2 col-form-label">HP</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    <input name="hp" type="text" class="form-control" placeholder="812XXXXXXXXX" required="" value="<?php echo $userdata['hp'] ?>">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <a class="btn btn-primary" id="kembali_profil_btn"><span class="fa fa-arrow-left"></span> Kembali</a>
                  <button type="submit" class="btn btn-danger"><span class="fa fa-save"></span> Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- /.card-body -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>



<div class="modal fade" id="modal-edit-photo">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <p>Pilih gambar profil</p>
      </div>
      <div class="container">
        <div class="form-group">
          <!-- <label for="customFile">Custom File</label> -->
          <div class="custom-file">
            <input accept="image/*" type='file' id="imgInp" class="custom-file-input btn-lg" id="customFile">
            <label class="custom-file-label" for="customFile">Pilih berkas gambar</label>
          </div>
          <div class="mt-2">
            <button class="btn btn-outline-primary w-100" id="hapusGambarProfil">
              Kembalikan gambar default
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->