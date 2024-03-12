<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Materi">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Materi</label>
                        <div class="col-sm-4">
                            <input type="text" name="nama_materi" value="<?=$nama_materi;?>" class="form-control "
                                required />
                        </div>
                        <label class="col-sm-2 col-form-label">
                            Upload
                        </label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="file_materi" onchange="pratinjau1(event)"
                                required>
                            <img id="imgPratinjau1" width="50%" height="50%" src="<?php if($file_materi != '' && file_exists($img2 = 'assets/upload_materi/'.$file_materi)) {
                                echo base_url($img2);
                            } else {
                                echo base_url(). "assets/img/Upload-pana.png";
                            } ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm text-right">
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary" type="submit">
                                    Simpan <span id="loading2"></span>
                                </button>
                                <a href="<?= base_url(); ?>Materi" class="btn btn-danger">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>