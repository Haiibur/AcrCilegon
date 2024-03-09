<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" enctype="multipart/form-data"
                    role="<?= base_url(); ?>Lokasi_Tujuan">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Lokasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_lokasi" value="<?= $nama_lokasi; ?>"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Upload Gambar Lokasi</label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar_lokasi" value="<?= $gambar_lokasi; ?>" class="form-control"
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Link Vidio</label>
                        <div class="col-sm-9">
                            <input type="text" name="link_vidio" value="<?= $link_vidio; ?>" class="form-control"
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan Lokasi</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea class="form-control" type="text" name="ket_lokasi"
                                    value="<?= $ket_lokasi; ?>">
                            </textarea>
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
    CKEDITOR.replace('ket_lokasi', {
        defaultLanguage: 'en',
        language: 'en'
    }).setData('<?php echo str_replace(array("\r", "\n"), '', $ket_lokasi); ?>');
});
</script>