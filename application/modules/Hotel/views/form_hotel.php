<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Hotel">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Hotel</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_hotel" value="<?= $nama_hotel; ?>" class="form-control"
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Hotel</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_1" value="<?= $foto_1; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Hotel 2</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_2" value="<?= $foto_2; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Hotel 3</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_3" value="<?= $foto_3; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Hotel 4</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_4" value="<?= $foto_4; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Foto Hotel 5</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_5" value="<?= $foto_5; ?>" class="form-control " required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Titik Lokasi</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" name="titik_lokasi" value="<?= $titik_lokasi; ?>"
                                    class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" name="ket_hotel" value="<?= $ket_hotel; ?>" class="form-control"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="number" name="harga" value="<?= $harga; ?>" class="form-control"
                                    required />
                            </div>
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
                        <div class="col-sm text-right">
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary" type="submit">
                                    Simpan <span id="loading2"></span>
                                </button>
                                <a href="<?= base_url(); ?>Hotel" class="btn btn-danger">
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