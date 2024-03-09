<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div id="toolbar">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="<?=base_url('form_tambah_transaksi_order');?>" class="btn btn-success"
                            title="Buat Agenda">
                            <i class="fa fa-plus"></i>
                            Tambah Materi
                        </a>
                        <a href="<?=base_url('form_ubah_transaksi_order/');?>" class="btn btn-warning" id="btnRedir"
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
                        data-url="<?=base_url('Transaksi_order/load_transaksi_order');?>">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="tgl_order">Tanggal Order</th>
                                <th data-formatter="nama_produk">Produk</th>
                                <th data-field="qty_order">Quantity Order</th>
                                <th data-formatter="satuan_produk">Satuan Produk</th>
                                <th data-field="nama_level_peserta">Jabatan</th>
                                <th data-formatter="nama_kabupaten">Kabupaten</th>
                                <th data-field="nama_peserta">Nama </th>
                                <th data-formatter="alamat_kirim">Alamat Kirim</th>
                                <th data-field="jumlah_bayar">Jumlah Bayar</th>
                                <th data-formatter="status_bayar">Status Bayar</th>
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

function operateFormatter(value, row, index) {
    return [
        '<a href="' + row.file_materi + '" class="btn btn-primary">',
        'Lihat',
        '</a'
    ].join('')
}
</script>