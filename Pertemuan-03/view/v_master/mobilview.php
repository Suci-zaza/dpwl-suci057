<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Starter Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
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
                <a href="<?= base_url('Mobil_c/create_mobil')?>" class="btn btn-primary">
                    <i class="fas fa-car"></i>    
                Tambah Data Mobil</a>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th>No.Plat</th>
                            <th>Nama Mobil</th>
                            <th>Jumlah Kursi</th>
                            <th>Jumlah Bagasi</th>
                            <th>Jenis Mobil/<br>Transmisi </th>
                            <th>Tahun</th>
                            <th>Foto</th>
                            <th>Biaya Perhari</th>
                            <th>Catatan Unit</th>
                            <th>Status Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dbmobil as $m) : ?>
                            <tr>
                                <td><?= $m['no_plat'] ?></td>
                                <td><?= $m['nm_mobil'] ?></td>
                                <td><?= $m['nkursi'] ?></td>
                                <td><?= $m['nbagasi'] ?></td>
                                <td><?= $m['jns_mobil'] . '<br>' . $m['transmisi'] ?></td>
                                <td><?= $m['thn_buat'] ?></td>
                                <td>
                                    <?php if (!empty($m['ft_depan'])) : ?>
                                        <img src="<?= base_url('img/' . $m['ft_depan']); ?>" style="width: 50px; height: auto;"><br>
                                    <?php endif; ?>
                                    <?php if (!empty($m['ft_blkg'])) : ?>
                                        <img src="<?= base_url('img/' . $m['ft_blkg']); ?>" style="width: 50px; height: auto;"><br>
                                    <?php endif; ?>
                                    <?php if (!empty($m['ft_interior'])) : ?>
                                        <img src="<?= base_url('img/' . $m['ft_interior']); ?>" style="width: 50px; height: auto;">
                                    <?php endif; ?>
                                </td>
                                <td><?= $m['hrg_hari'] ?></td>
                                <td><?= $m['cttn_unit'] ?></td>
                                <td><?= $m['status_unit'] ?></td>
                                <td>
                                    <!-- Tombol Edit (Warna Kuning / warning) -->
                                    <a href="<?= base_url('Mobil_c/edit/' . $m['no_plat']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    <!-- Tombol Hapus Sesuai Gambar -->
                                    <a href="<?= base_url('Mobil_c/hapus/' . $m['no_plat']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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
<!-- /.content-wrapper -->