<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" enctype="multipart/form-data"
                    role="<?= base_url(); ?>Lokasi_Venue">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Venue</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="nama_venue" value="<?= $nama_venue; ?>"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Venue</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="foto_venue" value="<?=$foto_venue;?>" class="form-control"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Lat</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="lat" value="<?= $lat; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Long</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="longg" value="<?= $longg; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 ">Keterangan Venue</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" type="text" name="ket_venue" id="ket_venue">
                                <?= $ket_venue; ?>    
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="<?= 1 ?>"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Aktif
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="<?= 2 ?>"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Non-Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm text-right">
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary" type="submit">
                                    Simpan <span id="loading2"></span>
                                </button>
                                <a href="<?= base_url(); ?>agenda" class="btn btn-danger">
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

<script>
$(document).ready(function() {
    CKEDITOR.replace('ket_venue', {
        defaultLanguage: 'en',
        language: 'en'
    }).setData('<?php echo str_replace(array("\r", "\n"), '', $ket_venue); ?>');
});
</script>