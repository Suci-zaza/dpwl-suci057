<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Data Mobil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('Mobil_c/index') ?>">Data Mobil</a></li>
            <li class="breadcrumb-item active">Tambah Mobil</li>
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
            <i class="fas fa-car"></i> Form Entri Data Mobil
          </h3>
        </div>

        <!-- Form Tambah Data -->
        <form action="<?= base_url('Mobil_c/simpan') ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_plat">Nomor Plat</label>
                  <input type="text" name="no_plat" id="no_plat" class="form-control" placeholder="Contoh: B 1234 ABC" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nm_mobil">Nama Mobil</label>
                  <input type="text" name="nm_mobil" id="nm_mobil" class="form-control" placeholder="Contoh: Toyota Avanza" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nkursi">Jumlah Kursi</label>
                  <input type="number" name="nkursi" id="nkursi" class="form-control" placeholder="6" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nbagasi">Jumlah Bagasi</label>
                  <input type="number" name="nbagasi" id="nbagasi" class="form-control" placeholder="2" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="jns_mobil">Jenis Mobil</label>
                  <input type="text" name="jns_mobil" id="jns_mobil" class="form-control" placeholder="Contoh: MPV / SUV" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="transmisi">Transmisi</label>
                  <select name="transmisi" id="transmisi" class="form-control" required>
                    <option value="">-- Pilih Transmisi --</option>
                    <option value="Manual">Manual</option>
                    <option value="Automatic">Automatic</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="thn_buat">Tahun Buat</label>
                  <input type="number" name="thn_buat" id="thn_buat" class="form-control" placeholder="2022" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="hrg_hari">Biaya Per Hari (Rp)</label>
                  <input type="number" name="hrg_hari" id="hrg_hari" class="form-control" placeholder="350000" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="ft_depan">Foto Depan</label>
                  <input type="file" name="ft_depan" id="ft_depan" class="form-control-file" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="ft_blkg">Foto Belakang</label>
                  <input type="file" name="ft_blkg" id="ft_blkg" class="form-control-file" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="ft_interior">Foto Interior</label>
                  <input type="file" name="ft_interior" id="ft_interior" class="form-control-file" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="status_unit">Status Unit</label>
                  <select name="status_unit" id="status_unit" class="form-control" required>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Disewa">Disewa</option>
                    <option value="Perbaikan">Perbaikan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cttn_unit">Catatan Unit</label>
                  <textarea name="cttn_unit" id="cttn_unit" class="form-control" rows="2" placeholder="Catatan kondisi mobil..."></textarea>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
            <a href="<?= base_url('Mobil_c/index') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>