<?= $this->extend('layout/templatecoach'); ?>
<?= $this->section('coach'); ?>

<div class="page-content-wrapper">
  <div class="page-content-wrapper-inner">
    <div class="content-viewport">
      <div class="row">
        <div class="col" style="font-size: 43px">Tambah Materi Coach</div>
      </div>
      <div class="container">
        <div class="row">
          <form
            action="/coach/prosestambahmatericoach"
            method="POST"
            enctype="multipart/form-data"
          >
            <?= csrf_field(); ?>
            <input type="hidden" name="idpembuat_materi" value="<?= session('id'); ?>">
            <input type="hidden" name="pembuat_materi" value="<?= session('name'); ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_materi">Masukan Nama Materi</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nama_materi"
                    id="nama_materi"
                    aria-describedby="helpId"
                    placeholder="nama_materi"
                  />
                  <small id="helpId" class="form-text text-muted"
                    >Help text</small
                  >
                </div>
              </div>



              <div class="col-md-6">
                <div class="form-group">
                  <label for="deskripsi_materi">Deskripsi Materi</label>
                  <textarea class="form-control" name="deskripsi_materi" id="deskripsi_materi" rows="3"></textarea>
                </div>
              </div>



              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_materi">Jenis Materi</label>
                  <select class="form-control" name="jenis_materi" id="jenis_materi">
                    <option selected value="pdf">Pdf</option>
                    <option value="video">Video</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_coaching">Jenis Coaching</label>
                  <select class="form-control" name="jenis_coaching" id="jenis_coaching">
                    <option selected value="guitar">Coachin Guitar</option>
                    <option value="drum">Coaching Drum</option>
                  </select>
                </div>
              </div>
              

              <div class="col-md-6">
                <div class="form-group">
                  <label class="custom-file">
                    <input
                      type="file"
                      name="file_pemateri"
                      id="file_pemateri"
                      placeholder="file_pemateri"
                      class="custom-file-input"
                      aria-describedby="fileHelpId"
                    />
                    <span class="custom-file-control">Masukan Materi</span>
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
