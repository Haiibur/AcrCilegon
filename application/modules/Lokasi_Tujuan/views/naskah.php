<div class="row">
	<div class="col-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <table>
                            <tr>
                                <td valign="top">Tamu Utama</td>
                                <td valign="top">:</td>
                                <td valign="top"><b><?= $row->tamu_utama; ?></b></td>
                            </tr>
                            <tr>
                                <td valign="top">Judul Agenda</td>
                                <td valign="top">:</td>
                                <td valign="top"></b><?= $row->nama_agenda; ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $row->naskah_pidato; ?>
            </div>
        </div>
	</div>
</div>