<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Galleri">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Galleri</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="nama_galleri" value="<?=$nama_galleri;?>" class="form-control"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Galleri </label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_galleri_1" value="<?=$foto_galleri_1;?>" class="form-control "
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Galleri 2</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_galleri_2" value="<?=$foto_galleri_2;?>" class="form-control "
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Galleri 3</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_galleri_3" value="<?=$foto_galleri_3;?>" class="form-control "
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Galleri 4</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_galleri_4" value="<?=$foto_galleri_4;?>" class="form-control "
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Galleri 5</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_galleri_5" value="<?=$foto_galleri_5;?>" class="form-control "
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Link Vidio</label>
                        <div class="col-sm-9">
                            <input type="text" name="link_vidio" value="<?=$link_vidio;?>" class="form-control "
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" type="text" name="ket_galleri" value="<?= $ket_galleri; ?>">
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm text-right">
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary" type="submit">
                                    Simpan <span id="loading2"></span>
                                </button>
                                <a href="<?= base_url(); ?>Galleri" class="btn btn-danger">
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
    CKEDITOR.replace('ket_galleri', {
        defaultLanguage: 'en',
        language: 'en'
    }).setData('<?php echo str_replace(array("\r", "\n"), '', $ket_galleri); ?>');
});
</script>