<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
              <div class="container">
                  <div class="row">
                      <div class="col">
                          <h1>List Materi</h1>
                      </div>
                  </div><br>
    <div class="row">
        <div class="col-md-12 col-sm-6 col-10 ">
            <div class="grid table-responsive">
            <table class="table table-stretched">
                <thead>
                    <tr>
                    <th>No</th>
                    <th colspan="2" class="pl-4">Materi</th>
                    <th>Deskripsi</th>
                    <th>Nomor Pembuatan</th>
                    <th>Tanggal Daftar</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                   
               
                        </tr>
                <?php $i = 1; ?>
            <?php foreach ($list as $key=>$p) : ?>
                <tr>
                    <td style="font-weight:bold;"><?= $i++; ?></td>
                    <td class="pl-md-0">
                            <small class="text-black font-weight-medium d-block"><?= $p['nama_materi']; ?></small>
                            <span class="text-gray">
                            <span class="status-indicator rounded-indicator small bg-primary"></span><?= $p['peran']; ?> </span>
                    </td>
                    <td><?= $p['jenis_kelamin'];?></td>
                    <td>
                            <small><?= $p['no_telp']; ?></small>
                    </td>
                    <td> <?= $p['created_at']; ?> </td>
                    <td>
                    <a href="/admin/<?= $p['id']; ?>" class="btn">Edit</a>
                    <a href="/admin/deleteuser/<?= $p['id']; ?>" class="btn">Delete</a>    
                    </td>
                </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
            </div>
        </div>
            </div>


<?= $this->endSection(); ?>