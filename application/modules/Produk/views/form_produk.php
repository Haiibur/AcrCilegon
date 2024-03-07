<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Produk">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Katagori Produk</label>
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
                        <label class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="nama_produk" value="<?=$nama_produk;?>" class="form-control "
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Satuan Produk</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="satuan_produk" value="<?=$satuan_produk;?>"
                                    class="form-control " required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Gambar 1</label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar_1" value="<?=$gambar_1;?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Gambar 2</label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar_2" value="<?=$gambar_2;?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Gambar 3</label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar_3" value="<?=$gambar_3;?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Gambar 4</label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar_4" value="<?=$gambar_4;?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Gambar 5</label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar_5" value="<?=$gambar_5;?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Harga Produk</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" name="harga" value="<?=$nama_produk;?>" class="form-control "
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Status Produk</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_produk" value="<?= 1 ?>"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Tersedia
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_produk" value="<?= 2 ?>"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Habis
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan Produk</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="ket_produk" value="<?=$ket_produk;?>" class="form-control "
                                    required />
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