<div class="card">
    <div class="card-header">
    <h3 class="card-title">Datatable</h3>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            No
                        </th>
                        <th style="width: 20%">
                            Judul Buku
                        </th>
                        <th style="width: 30%">
                            Nama Peminjam
                        </th>
                        <th>
                            Deskripsi
                        </th>
                        <th>
                            Pengarang
                        </th>
                        <th class="text-center">
                            Status
                        </th>   
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($peminjaman as $data) :?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $data->f_idbuku ?></td>
                            <td><?= $data->f_idanggota ?></td>
                            <td><?= $data->f_tanggalpeminjaman ?></td>
                            <td><?= $data->f_tanggalkembali ?></td>
                            <td><?= $data->f_status ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>