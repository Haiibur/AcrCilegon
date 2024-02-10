<div class="row">
	<div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">	      
                <form id="formData" action="<?= base_url(); ?>profil/update_prf" method="POST" role="<?= base_url(); ?>profil">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Sistem</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Versi</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="versi" value="<?= $versi; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Logo</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" name="logo" onchange="pratinjau(event)">
                            <img id="imgPratinjau" width="100%" src="<?php if($logo != '' && file_exists($img = 'assets/img/profil/logo/'.$logo)) {
                                echo base_url($img);
                            } else {
                                echo "assets/img/logoutama.png";
                            } ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm text-right">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-outline-primary">Simpan <span id="loading2"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>

<div class="modal fade" id="BSmodal" tabindex="-1" role="dialog" aria-labelledby="Modal FormData">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header backmodal">
        <h4 class="modal-title">
          
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" action="" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Level Admin</label>
            <div class="col-sm-9">
              <select class="select2 form-control" name="level" id="level">
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="username" id="username" placeholder="Digunakan untuk Login">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" name="password" id="password">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan <span id="loading"></span></button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>