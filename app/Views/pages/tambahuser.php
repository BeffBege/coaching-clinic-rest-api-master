<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="page-content-wrapper">
  <div class="page-content-wrapper-inner">
    <div class="content-viewport">
      <div class="row">
        <div class="col" style="font-size: 43px">Tambah User</div>
      </div>
      <div class="container">
        <div class="row">
          <form
            action="/admin/prosestambahuser"
            method="POST"
            enctype="multipart/form-data"
          >
            <?= csrf_field(); ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama">Masukan Nama Lengkap</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nama"
                    id="nama"
                    aria-describedby="helpId"
                    placeholder="nama"
                  />
                  <small id="helpId" class="form-text text-muted"
                    >Help text</small
                  >
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date"
                  class="form-control" name="tanggal_lahir" id="tanggal_lahir" aria-describedby="helpId" placeholder="tanggal_lahir">
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                    <option selected value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="peran">peran</label>
                  <select class="form-control" name="peran" id="peran">
                    <option selected value="Coach Guitar">Coach Gitar</option>
                    <option value="Coach Drum">Coach Drum</option>
                    <option value="Peserta">Peserta Gitar</option>
                    <option value="Coach Drum">Peserta Drum</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_telp">Masukan Nomor Telfon</label>
                  <input
                    type="text"
                    class="form-control"
                    name="no_telp"
                    id="no_telp"
                    aria-describedby="helpId"
                    placeholder="no_telp"
                  />
                  <small id="helpId" class="form-text text-muted"
                    >Help text</small
                  >
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="custom-file">
                    <input
                      type="file"
                      name="gambar_profil"
                      id="gambar_profil"
                      placeholder="gambar_profil"
                      class="custom-file-input"
                      aria-describedby="fileHelpId"
                    />
                    <span class="custom-file-control">Masukan Foto</span>
                  </label>
                  <small id="fileHelpId" class="form-text text-muted"
                    >Help text</small
                  >
                </div>
              </div>

              <div class="col-md-6">
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <?= $this->endSection(); ?>
    </div>
  </div>
</div>
