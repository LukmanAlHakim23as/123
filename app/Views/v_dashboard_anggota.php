<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?> </h3>
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
                        <th> Nama </th>
                        <th> Username </th>
                        <th> Password </th>
                        <th> Tanggal Lahir </th>
                        <th width="100px"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anggota as $row) : ?>
                        <tr>
                            <td><?= $row['f_id'] ?></td>
                            <td> <?= $row['f_nama'] ?></td>
                            <td> <?= $row['f_username'] ?></td>
                            <td> <?= $row['f_password'] ?></td>
                            <td> <?= $row['f_tanggallahir'] ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit-<?= $row['f_id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-sm btn-danger" onclick="return confirm ('apakah data akan di hapus?')" href="<?php echo base_url('Anggota/deledeAnggota'); ?>/<?= $row['f_id']; ?>"><i class="fa fa-trash"></i></a>
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
                <h4 class="modal-title">Tambah Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('Anggota/createAnggota') ?>" method="POST" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="tgllahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahir" name="tgllahir">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal edit -->
<?php foreach ($anggota as $row) : ?>
    <div class="modal fade" id="modal-edit-<?= $row['f_id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Anggota</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('Anggota/editAnggota') ?>" method="POST" class="form-horizontal">
                        <input type="hidden" value="<?= $row['f_id']; ?>" name="id">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input value="<?= $row['f_nama']; ?>" type="text" class="form-control" name="nama">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?= $row['f_username']; ?>" type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input value="<?= $row['f_password']; ?>" type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input value="<td><?= $row['f_tanggallahir']; ?></td>" type="date" class="form-control" name="tgllahir">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>