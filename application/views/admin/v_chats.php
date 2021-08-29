<div class="row p-5">
  
  <div class="col-md-4 mb-3">
    <div class="card" style="height: 100%!important;">
      <div class="card-header">
        <h3 class="card-title">Daftar User</h3>

        <div class="card-tools">
          <div class="input-group input-group" style="width: 200px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <ul class="contacts-list">
          <center class="mt-4">
            <img class="mr-2" src="<?php echo base_url() ?>assets/widi/img/loader.gif">
            <i class="text-muted">Memuat kontak...</i>
          </center>
        </ul>
        <!-- /.contacts-list -->

      </div>
      <!-- /.card-body -->
    </div>
  </div>

  <div class="col-md-6 mb-3">
    <div class="card p-3" style="height: 100%!important;">
      <div class="direct-chat direct-chat-primary">
        
        <center class="mt-4 pt-3 pm-3 pl-3">
          <?php echo form_open('', 'id="form_input_chat"') ?>
          <input type="hidden" name="id_user_penerima" required="">
            <div class="input-group">
              <input type="text" name="msg" placeholder="Tulis pesan ..." class="form-control" autocomplete="off" required="">
              <span class="input-group-append">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </span>
            </div>
          </form>
          <small class="text-gray" id="terakhir_online">
            Terakhir online 2 jam lalu
          </small>
        </center>
        <hr>
        <!-- /.card-footer-->
        <div class="card-body">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages">

            <div class="wadah-untuk-chat-messages">
              <center class="text-gray">
                <i>Pilih kontak untuk chat dengan user.</i>
              </center>
            </div>
            
          </div>
          
          <!--/.direct-chat-messages-->

        </div>
        <!-- /.card-body -->
      </div>
      <!--/.direct-chat -->
      

      <div class="overlay" style="display: none;">
        <div class="lds-dual-ring"></div>
      </div> <!-- /.overlay -->
    </div>
  </div>

</div>