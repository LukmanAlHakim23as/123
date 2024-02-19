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
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit-<?= $row['f_id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-sm btn-danger" onclick="return confirm ('apakah data akan di hapus?')" href="<?php echo base_url('Buku/deleteBuku'); ?>/<?= $row['f_id']; ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('Buku/createBuku ') ?>" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>

                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal edit -->
<?php foreach ($buku as $row) : ?>
    <div class="modal fade" id="modal-edit-<?= $row['f_id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Buku</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('Buku/editBuku') ?>" method="POST" class="form-horizontal">
                        <input type="hidden" value="<?= $row['f_id']; ?>" name="id">
                        <div class="form-group">
                            <label for="idkategori">Kategori</label>
                            <input value="<?= $row['f_nama_kategori']; ?>" type="text" class="form-control" name="kategori">
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input value="<?= $row['f_judul']; ?>" type="text" class="form-control" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input value="<?= $row['f_penerbit']; ?>" type="text" class="form-control" name="pengarang">
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input value="<?= $row['f_pengarang']; ?>" type="text" class="form-control" name="penerbit">
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input value="<?= $row['f_deskripsi']; ?>" type="text" class="form-control" name="deskripsi">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>