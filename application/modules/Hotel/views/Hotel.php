<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div id="toolbar">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="<?=base_url('form_tambah_hotel');?>" class="btn btn-success" title="Buat Agenda">
                            <i class="fa fa-plus"></i>
                            Tambah Galleri
                        </a>
                        <a href="<?=base_url('form_ubah_hotel/');?>" class="btn btn-warning" id="btnRedir"
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
                        data-page-list="[10, 25, 50, 100, all]" data-url="<?=base_url('Hotel/load_hotel');?>">
                        <thead>
                            <tr style="text-align:center;">
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-formatter="operateFormatter2">Foto Hotel</th>
                                <th data-field="nama_hotel" data-sortable="true">Nama Hotel</th>
                                <th data-field="titik_lokasi">Titik Lokasi</th>
                                <th data-field="ket_hotel">Keterangan</th>
                                <th data-field="harga">Harga</th>
                                <th data-field="no_tlp">Nomer Telphone</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="BSmodal" tabindex="-1" role="dialog" aria-labelledby="Modal FormData">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header backmodal">
                <h4 class="modal-title">

                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Level Admin</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control" name="level" id="level">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Digunakan untuk Login">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan <span id="loading"></span></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
var $table = $('#table')

function operateFormatter2(value, row, index) {
    return [
        '<img src="' + row.foto_1 +
        '" alt="" style="display: block; width: 100px; margin-left: auto; margin-right: auto; height: 50%;">',
    ].join('')
}

// function operateFormatter3(value, row, index) {
//     return [
//         '<a href="' + row.foto_galleri_3 + '" class="btn btn-primary">',
//         'Lihat',
//         '</a'
//     ].join('')
// }

// function operateFormatter4(value, row, index) {
//     return [
//         '<a href="' + row.foto_galleri_4 + '" class="btn btn-primary">',
//         'Lihat',
//         '</a'
//     ].join('')
// }

// function operateFormatter5(value, row, index) {
//     return [
//         '<a href="' + row.foto_galleri_5 + '" class="btn btn-primary">',
//         'Lihat',
//         '</a'
//     ].join('')
// }
</script>