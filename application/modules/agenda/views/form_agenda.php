<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>Agenda">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Agenda</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_agenda" value="<?= $nama_agenda; ?>"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-4">
                            <div class="input-group date" id="dates" data-target-input="nearest">
                                <input type="text" name="tgl_agenda" id="date" value="<?= $tgl_agenda; ?>"
                                    class="form-control datetimepicker-input" required data-target="#dates" />
                                <div class="input-group-append" data-target="#dates" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label"
                            style="display: flex; flex-direction: row-reverse;">Jam</label>
                        <div class="col-sm-3">
                            <input type="text" name="jam_agenda" value="<?= $jam_agenda; ?>" class="form-control"
                                required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Lokasi Acara</label>
                        <div class="col-sm-4">
                            <select name="kd_venue" class="form-control">
                                <option disable selected>--- Pilih Lokasi Venue ---</option>
                                <?php
                                        foreach ($kd_venue as $value) { ?>
                                <option value=<?= $value->kd_venue ?>><?= $value->nama_venue ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label"
                            style="display: flex; flex-direction: row-reverse;">Jumlah Peserta</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="jumlah_peserta"
                                value="<?= $jumlah_peserta; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="keterangan" rows="4"><?= $keterangan; ?></textarea>
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
    $(document).ready(function() {
        CKEDITOR.replace('keterangan', {
            defaultLanguage: 'en',
            language: 'en'
        }).setData('<?php echo str_replace(array("\r", "\n"), '', $keterangan); ?>');
    });
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