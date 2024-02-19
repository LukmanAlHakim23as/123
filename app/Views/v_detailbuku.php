<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="" alt="User profile picture">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Data <?= $judul?></h1>
                </div>
                <div class="card-body">
                  <table class="table">
                    <tr>
                      <th width="150px">Judul</th>
                      <th width="50px">:</th>
                      <th><?= $buku->f_judul?></th>
                    </tr>
                    <tr>
                      <th width="150px">Pengarang</th>
                      <th width="50px">:</th>
                      <th><?= $buku->f_pengarang?></th>
                    </tr>
                    <tr>
                      <th width="150px">Penerbit</th>
                      <th width="50px">:</th>
                      <th><?= $buku->f_penerbit?></th>
                    </tr>
                    <tr>
                      <th width="150px">Deskripsi</th>
                      <th width="50px">:</th>
                      <th><?= $buku->f_deskripsi?></th>
                    </tr>
                  </table>
                  <br>
                  <form action="<?php echo base_url('Peminjaman/prosesPinjam') ?>" method="POST">
                    <input type="hidden" name="id_buku" value="<?= $buku->f_id ?>">
                    <button type="submit" class="btn btn-primary">Pinjam</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>