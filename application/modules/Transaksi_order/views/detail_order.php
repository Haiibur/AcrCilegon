<div class="row">
    <div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card mb-3">
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <div><strong class="me-2">Tanggal Order : </strong>
                            <div class="badge rounded-pill badge-subtle-success fs--2">
                                <p class="fs--1"><?= $tgl_order ?></p>
                            </div>
                        </div>
                        <div><strong class="me-2">Status Order : </strong>
                            <div class="badge rounded-pill badge-subtle-success fs--2">
                                <button class="btn btn-sm 
                                <?php if($status_kirim==0){
                                    echo "text-danger";
                                }elseif($status_kirim==1){
                                    echo "text-warning";
                                }elseif($status_kirim==2){
                                    echo "text-warning";
                                }elseif($status_kirim==3){
                                    echo "text-success";
                                }else{
                                    echo "Nothing Status";
                                } ?>">
                                    <?php if($status_kirim==0){
                                    echo "Dibatalkan";
                                }elseif($status_kirim==1){
                                    echo "Proses Kemas";
                                }elseif($status_kirim==2){
                                    echo "Dikirim";
                                }elseif($status_kirim==3){
                                    echo "Selesai";
                                }else{
                                    echo "Nothing Status";
                                } ?>
                                </button>
                            </div>
                        </div>
                        <div><strong class="me-2">Status Bayar : </strong>
                            <div class="badge rounded-pill badge-subtle-success fs--2">
                                <button class="btn btn-sm 
                                <?php if($status_bayar==0){
                                    echo "text-danger";
                                }elseif($status_bayar==1){
                                    echo "text-success";
                                }else{
                                    echo "Nothing Status";
                                } ?>">
                                    <?php if($status_bayar==0){
                                    echo "Belum Bayar";
                                }elseif($status_bayar==1){
                                    echo "Lunas";
                                }else{
                                    echo "Nothing Status";
                                } ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                <h5 class="mb-3 fs-0">Peserta</h5>
                                <h6 class="mb-2"><?= $nama_peserta ?></h6>
                                <p class="mb-0 fs--1"> <strong>Email: </strong><a
                                        href="mailto:ricky@gmail.com"><?= $email_peserta ?></a></p>
                                <p class="mb-0 fs--1"> <strong>Phone: </strong><a
                                        href="tel:7897987987"><?= $tlp_peserta ?></a>
                                </p>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                <h5 class="mb-3 fs-0">Alamat Kirim</h5>
                                <p class="mb-0 fs--1"><?= $alamat_kirim ?></p>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <h5 class="mb-3 fs-0">Nomer Order</h5>
                                <div class="d-flex">
                                    <div class="flex-1">
                                        <p class="mb-0 fs--1"><?= $kd_order ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive fs--1">
                            <table class="table table-striped border-bottom">
                                <thead class="bg-200">
                                    <tr>
                                        <th class="text-900 border-0">Nama Produk</th>
                                        <th class="text-900 border-0 text-center">Quantity</th>
                                        <th class="text-900 border-0 text-end">Harga</th>
                                        <th class="text-900 border-0 text-end">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-200">
                                        <td class="align-middle">
                                            <h6 class="mb-0 text-nowrap"><?= $nama_produk ?><h6>
                                        </td>
                                        <td class="align-middle text-center" id="qty_order"><?= $qty_order ?></td>
                                        <td class="align-middle text-end" id="harga"><?= $harga ?></td>
                                        <td class="align-middle text-end" id="harga_order"><?= $harga_order ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Fungsi untuk mengonversi nilai menjadi format mata uang rupiah
function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return 'Rp ' + ribuan;
}

// Mengambil elemen dengan ID harga dan harga_order
var hargaElement = document.getElementById("harga");
var hargaOrderElement = document.getElementById("harga_order");

// Mengonversi nilai harga menjadi format mata uang rupiah
var harga = parseInt(hargaElement.textContent);
hargaElement.textContent = formatRupiah(harga);

// Mengonversi nilai harga_order menjadi format mata uang rupiah
var hargaOrder = parseInt(hargaOrderElement.textContent);
hargaOrderElement.textContent = formatRupiah(hargaOrder);
</script>