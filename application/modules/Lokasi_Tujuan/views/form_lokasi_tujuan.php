<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>agenda">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Lokasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" value="<?= $nama_lokasi; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan Lokasi</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea name="ket_lokasi" value="<?= $ket_lokasi; ?>" class="form-control" required
                                    cols="30" rows="10"></textarea>
                            </div>
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
                        <label class="col-sm-3 col-form-label">Upload Vidio</label>
                        <div class="col-sm-9">
                            <input type="file" name="link_vidio" value="<?= $link_vidio; ?>" class="form-control"
                                required />
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
    CKEDITOR.replace('naskah', {
        defaultLanguage: 'en',
        language: 'en'
    }).setData('<?php echo str_replace(array("\r", "\n"), '', $naskah); ?>');
    CKEDITOR.replace('tamu', {
        defaultLanguage: 'en',
        language: 'en'
    }).setData('<?php echo str_replace(array("\r", "\n"), '', $tamu); ?>');
    $('#dates').datetimepicker({
        locale: 'en',
        format: 'YYYY-MM-DD',
        defaultDate: new Date()
    });
    $('#hours').datetimepicker({
        locale: 'en',
        format: 'HH:mm',
        defaultDate: new Date()
    });
    $('#hours2').datetimepicker({
        locale: 'en',
        format: 'HH:mm',
        defaultDate: new Date()
    });
});
</script>