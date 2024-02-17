<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Galleri">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Katagori</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="katagori" value="<?= $katagori; ?>"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Galleri</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" name="nama_galleri" value="<?=$nama_galleri;?>" class="form-control "
                                    required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Galleri </label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_galleri_2" value="<?=$foto_galleri_2;?>" class="form-control "
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Galleri 2</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_galleri_3" value="<?=$foto_galleri_3;?>" class="form-control "
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Galleri 3</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_galleri_4" value="<?=$foto_galleri_4;?>" class="form-control "
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Galleri 4</label>
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