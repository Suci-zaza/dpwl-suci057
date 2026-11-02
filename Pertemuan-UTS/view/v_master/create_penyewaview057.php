<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Entri Data Penyewa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('Penyewa_C057/index') ?>">Data Penyewa</a></li>
            <li class="breadcrumb-item active">Entri Data Penyewa</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-user-plus"></i> Form Entri Data Penyewa
          </h3>
        </div>

        <!-- Form Tambah Data Penyewa -->
        <form action="<?= base_url('Penyewa_C057/simpan') ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="user_plg057">Username (User Pelanggan)</label>
                  <input type="text" name="user_plg057" id="user_plg057" class="form-control" placeholder="Contoh: Budi123" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Sandi057">Kata Sandi (Password)</label>
                  <input type="password" name="Sandi057" id="Sandi057" class="form-control" placeholder="Masukkan kata sandi" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="Nik057">NIK</label>
                  <input type="text" name="Nik057" id="Nik057" class="form-control" placeholder="Alamat Nomor Kependudukan" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nm_lngkp057">Nama Lengkap</label>
                  <input type="text" name="nm_lngkp057" id="nm_lngkp057" class="form-control" placeholder="Contoh: Budi Santoso" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="no_hp057">No. Handphone</label>
                  <input type="text" name="no_hp057" id="no_hp057" class="form-control" placeholder="Contoh: 0811223344" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="almt_lngkp057">Alamat Lengkap</label>
                  <textarea name="almt_lngkp057" id="almt_lngkp057" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap Pekerjaan/Rumah" required></textarea>
                </div>
              </div>
            </div>

            <h5 class="mt-3">Dokumen Identitas</h5>
            <hr>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ft_ktp">Foto KTP (ft_ktp)</label>
                  <input type="file" name="ft_ktp" id="ft_ktp" class="form-control-file" accept=".jpg,.jpeg,.png">
                  <small class="form-text text-muted">Format: JPG, JPEG, atau PNG</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ft_sim_a">Foto SIM A (ft_sim_a)</label>
                  <input type="file" name="ft_sim_a" id="ft_sim_a" class="form-control-file" accept=".jpg,.jpeg,.png">
                  <small class="form-text text-muted">Format: JPG, JPEG, atau PNG</small>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= base_url('Penyewa_C057/index') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>