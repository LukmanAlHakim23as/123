<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?> </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-default">
                    <i class="fas fa-plus"></i>Add
                </button>
            </div>

        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px"> NO </th>
                        <th> Kategori </th>
                        <th> Judul </th>
                        <th> Penerbit </th>
                        <th> Pengarang </th>
                        <th> Deskripsi </th>
                        <th width="100px"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buku as $row) : ?>
                        <tr>
                            <td><?= $row['f_id'] ?></td>
                            <td> <?= $row['f_nama_kategori'] ?></td>
                            <td> <?= $row['f_judul'] ?></td>
                            <td> <?= $row['f_penerbit'] ?></td>
                            <td> <?= $row['f_pengarang'] ?></td>
                            <td> <?= $row['f_deskripsi'] ?></td>
                            <td>
                            <a type="button" class="btn btn-sm btn-success" href="<?= base_url('Buku/DetailBuku/' . $row['f_id']) ?>">
                                    Detail
                                </a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>