<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div id="toolbar">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="<?=base_url('form_tambah_absen_kehadiran');?>" class="btn btn-success"
                            title="Buat Agenda">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
                        <a href="<?=base_url('form_ubah_absen_kehadiran/');?>" class="btn btn-warning" id="btnRedir"
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
                        data-url="<?=base_url('Absen_Kehadiran/load_absen_kehadiran');?>">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="tgl_absen">Tanggal Absen</th>
                                <th data-field="agenda_kd">Agenda Acara</th>
                                <th data-field="peserta_kd">Jabatan Peserta</th>
                                <th data-field="nama_provinsi">Provinsi</th>
                                <th data-field="nama_kabupaten">Kabupaten</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>