<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Pendaftaran">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Kode Pendaftaran</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="kd_daftar" value="<?= $kd_daftar ?>" class="form-control"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Kode Undangan</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select name="undangan_kd" class="form-control">
                                    <option disabled selected>--- Pilih Kode Undangan ---</option>
                                    <?php
                                        foreach ($undangan_kd as $value) { ?>
                                    <option value=<?= $value->kode_undangan ?>>
                                        <?= $value->kode_undangan.' || '. $value->nama_provinsi.' || '. $value->nama_kabupaten ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Peserta</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="nama_peserta" value="<?= $nama_peserta ?>"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nomer HP</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" name="tlp_peserta" value="<?= $tlp_peserta ?>"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Email Peserta</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="email_peserta" value="<?= $email_peserta ?>"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Level Peserta</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select name="level_peserta" class="form-control">
                                    <option disabled selected>--- Pilih Level Peserta ---</option>
                                    <?php
                                        foreach ($level_peserta as $value) { ?>
                                    <option value=<?= $value->kd_level_peserta ?>><?= $value->nama_level_peserta ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="username" value="<?= $username ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="password" value="<?= $password ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Status Peserta</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select name="status_peserta" id="kd_provinsi" class="form-control">
                                    <option disabled selected>--- Pilih Status Peserta ---</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm text-right">
                            <div class="btn-group" role="group">
                                <button class="btn btn-outline-primary" type="submit">
                                    Simpan <span id="loading2"></span>
                                </button>
                                <a href="<?= base_url(); ?>Pendaftaran" class="btn btn-danger">
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