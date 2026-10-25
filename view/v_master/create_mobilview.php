<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Entri Data Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Mobil_C/index') ?>">Master Mobil</a>
                        </li>
                        <li class="breadcrumb-item active">Entri Mobil</li>
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

                <!-- Tag Form dengan method POST & enctype multipart untuk unggah berkas -->
                <form action="<?= base_url('Mobil_C/simpan') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <!-- Baris 1: No. Plat dan Nama Mobil -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_plat">No. Plat</label>
                                    <input type="text" name="no_plat" class="form-control" id="no_plat" placeholder="Contoh: BN 1234 AB" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nm_mobil">Nama Mobil</label>
                                    <input type="text" name="nm_mobil" class="form-control" id="nm_mobil" placeholder="Contoh: Toyota Avanza" required>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 2: Jumlah Kursi, Jumlah Bagasi, Jenis Mobil, Transmisi -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nkursi">Jumlah Kursi</label>
                                    <input type="number" name="nkursi" class="form-control" id="nkursi" placeholder="8" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nbagasi">Jumlah Bagasi</label>
                                    <input type="number" name="nbagasi" class="form-control" id="nbagasi" placeholder="1" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jns_mobil">Jenis Mobil</label>
                                    <select name="jns_mobil" class="form-control" id="jns_mobil" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="Minibus">Minibus</option>
                                        <option value="Kijang">Kijang</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="SUV">SUV</option>
                                        <option value="MPV">MPV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="transmisi">Transmisi</label>
                                    <select name="transmisi" class="form-control" id="transmisi" required>
                                        <option value="">-- Pilih Transmisi --</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Automatic">Automatic</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 3: Tahun Pembuatan, Biaya Per Hari, Status Unit -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="thn_buat">Tahun Pembuatan</label>
                                    <input type="number" name="thn_buat" class="form-control" id="thn_buat" placeholder="Contoh: 2024" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hrg_hari">Biaya Per Hari</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="hrg_hari" class="form-control" id="hrg_hari" placeholder="Contoh: 350000" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_unit">Status Unit</label>
                                    <select name="status_unit" class="form-control" id="status_unit" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Perawatan">Perawatan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Section Unggah Foto Mobil -->
                        <h5 class="mt-3"><i class="fas fa-camera"></i> Foto Mobil</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ft_depan">Foto Depan</label>
                                    <input type="file" name="ft_depan" class="form-control-file" id="ft_depan" required>
                                    <small class="form-text text-muted">Format JPG, JPEG atau PNG</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ft_blkg">Foto Belakang</label>
                                    <input type="file" name="ft_blkg" class="form-control-file" id="ft_blkg">
                                    <small class="form-text text-muted">Format JPG, JPEG atau PNG</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ft_interior">Foto Interior</label>
                                    <input type="file" name="ft_interior" class="form-control-file" id="ft_interior">
                                    <small class="form-text text-muted">Format JPG, JPEG atau PNG</small>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 4: Catatan Unit -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cttn_unit">Catatan Unit</label>
                                    <textarea name="cttn_unit" class="form-control" id="cttn_unit" rows="3" placeholder="Masukkan catatan mengenai kendaraan"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <!-- Tombol Aksi Simpan & Kembali -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('Mobil_C/index') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>