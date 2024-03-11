<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= base_url(); ?>Profil/update_prf" method="POST"
                    role="<?= base_url(); ?>Profil">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Sistem</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal Pelaksana</label>
                        <div class="col-sm-4">
                            <div class="input-group date" id="dates" data-target-input="nearest">
                                <input type="text" name="tgl_agenda" id="date" value="<?= $nama; ?>"
                                    class="form-control datetimepicker-input" required data-target="#dates" />
                                <div class="input-group-append" data-target="#dates" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label" style="display: flex; flex-direction: row-reverse;">Kode
                            Undangan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>">
                        </div>
                        <label class="col-sm-2 col-form-label" style="display: flex; flex-direction: row-reverse;">No
                            Telphone</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tentang CSS</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" type="text" name="ket_tentang_css" id="ket_tentang_css">
                                <?= $ket_tentang_css; ?>    
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Keterangan Profil</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" type="text" name="ket_profil" id="ket_profil">
                                <?= $ket_profil; ?>    
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" name="logo" onchange="pratinjau(event)">
                            <img id="imgPratinjau" width="100%" src="<?php if($logo != '' && file_exists($img = 'assets/img/profil/logo/'.$logo)) {
                                echo base_url($img);
                            } else {
                                echo "assets/img/logoutama.png";
                            } ?>">
                        </div>
                        <label class="col-sm-3 col-form-label" style="display: flex; flex-direction: row-reverse;">Foto
                            Profil</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" name="logo" onchange="pratinjau(event)">
                            <img id="imgPratinjau" width="100%" src="<?php if($logo != '' && file_exists($img = 'assets/img/profil/logo/'.$logo)) {
                                echo base_url($img);
                            } else {
                                echo "assets/img/Upload-pana.png";
                            } ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm text-right">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-outline-primary">Simpan <span
                                        id="loading2"></span></button>
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
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Digunakan untuk Login">
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
<script>
$(document).ready(function() {
    $(document).ready(function() {
        CKEDITOR.replace('ket_profil', {
            defaultLanguage: 'en',
            language: 'en'
        }).setData('<?php echo str_replace(array("\r", "\n"), '', $ket_profil); ?>');
    });

    $(document).ready(function() {
        CKEDITOR.replace('ket_tentang_css', {
            defaultLanguage: 'en',
            language: 'en'
        }).setData('<?php echo str_replace(array("\r", "\n"), '', $ket_tentang_css); ?>');
    });
});
</script>