<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div id="toolbar">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="<?=base_url('form_tambah_pendaftaran');?>" class="btn btn-success" title="Buat Agenda">
                            <i class="fa fa-plus"></i>
                            Tambah Undangan
                        </a>
                        <a href="<?=base_url('form_ubah_pendaftaran/');?>" class="btn btn-warning" id="btnRedir"
                            title="Ubah Agenda">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                        <a href="<?=base_url('home/hapusData'); ?>" class="btn btn-danger" id="btnDestroy"
                            title="Hapus Data">
                            <i class="far fa-trash-alt"></i>
                            Hapus
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table" class="table table-striped" data-toggle="table" data-toolbar="#toolbar"
                        data-pagination="true" data-search="true" data-sort-order="desc" data-id-field="id"
                        data-page-list="[10, 25, 50, 100, all]"
                        data-url="<?=base_url('Pendaftaran/load_pendaftaran');?>">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="kd_daftar">Kode Pendaftaran</th>
                                <th data-field="undangan_kd">Kode Undangan</th>
                                <th data-field="tgl_daftar">Tanggal Pendaftaran</th>
                                <th data-field="tgl_verifikasi">Tanggal Verifikasi</th>
                                <th data-field="nama_peserta">Nama Peserta</th>
                                <th data-field="tlp_peserta">No Hp</th>
                                <th data-field="email_peserta">Email Peserta</th>
                                <th data-field="level_peserta">Level Peserta</th>
                                <th data-field="username">Username</th>
                                <th data-field="password">Password</th>
                                <th data-formatter="operateFormatter1">Status Peserta</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var $table = $('#table')

function operateFormatter1(value, row, index) {
    return [
        (row.status_produk === 1) ? 'Aktif' : 'Non-Aktif',
    ].join('');
}
</script>