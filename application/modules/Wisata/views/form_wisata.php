<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Wisata">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama wisata</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_wisata" value="<?= $nama_wisata; ?>" class="form-control"
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto wisata</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_1" value="<?= $foto_1; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto wisata 2</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_2" value="<?= $foto_2; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto wisata 3</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_3" value="<?= $foto_3; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto wisata 4</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_4" value="<?= $foto_4; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto wisata 5</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_5" value="<?= $foto_5; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">No Telphone</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="number" name="no_tlp" value="<?= $no_tlp; ?>" class="form-control"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <textarea class="form-control" type="text" name="ket_wisata"
                                    value="<?= $ket_wisata; ?>">
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
                                <a href="<?= base_url(); ?>wisata" class="btn btn-danger">
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
    CKEDITOR.replace('ket_wisata', {
        defaultLanguage: 'en',
        language: 'en'
    }).setData('<?php echo str_replace(array("\r", "\n"), '', $ket_wisata); ?>');
});
</script>