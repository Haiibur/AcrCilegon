<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Informasi">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Judul Informasi</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="judul_informasi" value="<?=$judul_informasi;?>"
                                    class="form-control " required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Gambar Informasi </label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar_informasi" value="<?=$gambar_informasi;?>"
                                class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Link Youtube</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="link_youtube" value="<?=$link_youtube;?>" class="form-control "
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Status Informasi</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_informasi" value="<?= 1 ?>"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Tersedia
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_informasi" value="<?= 2 ?>"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Habis
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" type="text" name="ket_informasi"
                                value="<?= $ket_informasi; ?>">
                            </textarea>
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
    CKEDITOR.replace('ket_informasi', {
        defaultLanguage: 'en',
        language: 'en'
    }).setData('<?php echo str_replace(array("\r", "\n"), '', $ket_informasi); ?>');
});
</script>