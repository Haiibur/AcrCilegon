<div class="row">
	<div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <form id="formData" action="<?= $url; ?>" method="POST" role="<?= base_url(); ?>agenda">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Agenda</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Tanggal, Jam Mulai & Akhir</label>
                        <div class="col-sm-4">
                            <div class="input-group date" id="dates" data-target-input="nearest">
                                <input type="text" name="tgl" id="date" value="<?= $tgl; ?>" class="form-control datetimepicker-input" required data-target="#dates"/>
                                <div class="input-group-append" data-target="#dates" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group" >
                                <input type="time" name="jam" id="date" value="<?= $jam; ?>" class="form-control" required/>
                                
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group" >
                                <input type="time" name="jam_akhir" id="date" value="<?= $jam_akhir; ?>" class="form-control" required />
                                
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Lokasi Acara</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" name="lokasi_acara"  value="<?=$lokasi_acara;?>" class="form-control " required/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" id="alamat" rows="2"><?= $alamat; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Tamu Utama</label>
                        <div class="col-sm-9">
                            <!--<input type="text" class="form-control" name="tamu" value="<?= $tamu; ?>">-->
                            <textarea class="form-control" name="tamu" id="tamu" rows="4"><?= $tamu; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Naskah</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="naskah" id="naskah" rows="4"></textarea>
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