<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">DATA PENYEWA</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active">Data Penyewa</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <a href="<?= base_url('Penyewa_C057/create_pen') ?>" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Tambah Data Penyewa
                </a>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>No. HP</th>
                            <th>Alamat Lengkap</th>
                            <th>Foto Identitas<br>KTP & SIM A</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($dbpenyewa)) : ?>
                            <?php foreach ($dbpenyewa as $p) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($p['user_plg057']) ?></td>
                                    <td><?= htmlspecialchars($p['nm_lngkp057']) ?></td>
                                    <td><?= htmlspecialchars($p['no_hp057']) ?></td>
                                    <td><?= htmlspecialchars($p['almt_lngkp057']) ?></td>
                                    <td>
                                        <?php if (!empty($p['ft_ktp'])) : ?>
                                            <img src="<?= base_url('img/' . $p['ft_ktp']); ?>" style="width: 60px; height: auto;" title="Foto KTP" class="mr-1">
                                        <?php endif; ?>
                                        <?php if (!empty($p['ft_sim_a'])) : ?>
                                            <img src="<?= base_url('img/' . $p['ft_sim_a']); ?>" style="width: 60px; height: auto;" title="Foto SIM A">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="<?= base_url('Penyewa_C057/edit/' . $p['user_plg057']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        
                                        <!-- Tombol Hapus -->
                                        <a href="<?= base_url('Penyewa_C057/hapus/' . $p['user_plg057']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data penyewa ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data penyewa</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->