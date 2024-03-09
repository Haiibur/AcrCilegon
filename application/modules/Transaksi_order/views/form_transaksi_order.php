<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Transaksi_order">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select name="katagori_produk" class="form-control">
                                    <option disabled selected>--- Pilih Peserta ---</option>
                                    <?php
                                        foreach ($Peserta as $value) { ?>
                                    <option value=<?= $value->kd_kat ?>><?= $value->nama_kat ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select name="katagori_produk" class="form-control">
                                    <option disabled selected>--- Pilih Katagori Produk ---</option>
                                    <?php
                                        foreach ($katagori_produk as $value) { ?>
                                    <option value=<?= $value->kd_kat ?>><?= $value->nama_kat ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">File Materi </label>
                        <div class="col-sm-9">
                            <input type="file" name="file_materi" value="<?=$file_materi;?>" class="form-control "
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