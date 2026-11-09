<?php
$m = $mobil;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Data Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Mobil_C/index') ?>">Master Mobil</a>
                        </li>
                        <li class="breadcrumb-item active">Update Mobil</li>
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
                        <i class="fas fa-car"></i> Form Update Data Mobil
                    </h3>
                </div>

                <!-- Form Update Data Mobil -->
                <form action="<?= base_url('?url=Mobil_C/UpdateMobil') ?>"
                      method="post"
                      enctype="multipart/form-data">

                    <div class="card-body">

                        <!-- Menyimpan nomor plat lama -->
                        <input type="hidden"
                               name="no_plat_lama"
                               value="<?= htmlspecialchars($m['no_plat'], ENT_QUOTES, 'UTF-8') ?>">

                        <!-- Baris 1: No. Plat dan Nama Mobil -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_plat">No. Plat</label>
                                    <input type="text"
                                           name="no_plat"
                                           class="form-control"
                                           id="no_plat"
                                           value="<?= htmlspecialchars($m['no_plat'], ENT_QUOTES, 'UTF-8') ?>"
                                           readonly
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nm_mobil">Nama Mobil</label>
                                    <input type="text"
                                           name="nm_mobil"
                                           class="form-control"
                                           id="nm_mobil"
                                           value="<?= htmlspecialchars($m['nm_mobil'], ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 2: Jumlah Kursi, Bagasi, Jenis, Transmisi -->
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nkursi">Jumlah Kursi</label>
                                    <input type="number"
                                           name="nkursi"
                                           class="form-control"
                                           id="nkursi"
                                           min="1"
                                           value="<?= htmlspecialchars($m['nkursi'], ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nbagasi">Jumlah Bagasi</label>
                                    <input type="number"
                                           name="nbagasi"
                                           class="form-control"
                                           id="nbagasi"
                                           min="0"
                                           value="<?= htmlspecialchars($m['nbagasi'], ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jns_mobil">Jenis Mobil</label>
                                    <select name="jns_mobil"
                                            class="form-control"
                                            id="jns_mobil"
                                            required>

                                        <option value="">-- Pilih Jenis --</option>

                                        <option value="Minibus"
                                            <?= $m['jns_mobil'] === 'Minibus' ? 'selected' : '' ?>>
                                            Minibus
                                        </option>

                                        <option value="Kijang"
                                            <?= $m['jns_mobil'] === 'Kijang' ? 'selected' : '' ?>>
                                            Kijang
                                        </option>

                                        <option value="Sedan"
                                            <?= $m['jns_mobil'] === 'Sedan' ? 'selected' : '' ?>>
                                            Sedan
                                        </option>

                                        <option value="SUV"
                                            <?= $m['jns_mobil'] === 'SUV' ? 'selected' : '' ?>>
                                            SUV
                                        </option>

                                        <option value="MPV"
                                            <?= $m['jns_mobil'] === 'MPV' ? 'selected' : '' ?>>
                                            MPV
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="transmisi">Transmisi</label>
                                    <select name="transmisi"
                                            class="form-control"
                                            id="transmisi"
                                            required>

                                        <option value="">-- Pilih Transmisi --</option>

                                        <option value="Manual"
                                            <?= $m['transmisi'] === 'Manual' ? 'selected' : '' ?>>
                                            Manual
                                        </option>

                                        <option value="Automatic"
                                            <?= $m['transmisi'] === 'Automatic' ? 'selected' : '' ?>>
                                            Automatic
                                        </option>

                                        <option value="Matic"
                                            <?= $m['transmisi'] === 'Matic' ? 'selected' : '' ?>>
                                            Matic
                                        </option>

                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Baris 3: Tahun, Biaya, Status -->
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="thn_buat">Tahun Pembuatan</label>
                                    <input type="number"
                                           name="thn_buat"
                                           class="form-control"
                                           id="thn_buat"
                                           min="1900"
                                           max="2100"
                                           value="<?= htmlspecialchars($m['thn_buat'], ENT_QUOTES, 'UTF-8') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hrg_hari">Biaya Per Hari</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number"
                                               name="hrg_hari"
                                               class="form-control"
                                               id="hrg_hari"
                                               min="0"
                                               step="0.01"
                                               value="<?= htmlspecialchars($m['hrg_hari'], ENT_QUOTES, 'UTF-8') ?>"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_unit">Status Unit</label>
                                    <select name="status_unit"
                                            class="form-control"
                                            id="status_unit"
                                            required>

                                        <option value="">-- Pilih Status --</option>

                                        <option value="Tersedia"
                                            <?= $m['status_unit'] === 'Tersedia' ? 'selected' : '' ?>>
                                            Tersedia
                                        </option>

                                        <option value="Aktif"
                                            <?= $m['status_unit'] === 'Aktif' ? 'selected' : '' ?>>
                                            Aktif
                                        </option>

                                        <option value="Perawatan"
                                            <?= $m['status_unit'] === 'Perawatan' ? 'selected' : '' ?>>
                                            Perawatan
                                        </option>

                                        <option value="Disewa"
                                            <?= $m['status_unit'] === 'Disewa' ? 'selected' : '' ?>>
                                            Disewa
                                        </option>

                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Section Foto Mobil -->
                        <h5 class="mt-3">
                            <i class="fas fa-camera"></i> Foto Mobil
                        </h5>

                        <div class="row">

                            <!-- Foto Depan -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ft_depan">Foto Depan</label>

                                    <?php if (!empty($m['ft_depan'])) : ?>
                                        <div class="mb-2">
                                            <img src="<?= base_url('img/' . rawurlencode(basename($m['ft_depan']))) ?>"
                                                 alt="Foto Depan Mobil"
                                                 style="width:150px; height:auto;">
                                        </div>
                                    <?php endif; ?>

                                    <input type="file"
                                           name="ft_depan"
                                           class="form-control-file"
                                           id="ft_depan"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="form-text text-muted">
                                        Kosongkan jika tidak ingin mengganti foto.
                                    </small>
                                </div>
                            </div>

                            <!-- Foto Belakang -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ft_blkg">Foto Belakang</label>

                                    <?php if (!empty($m['ft_blkg'])) : ?>
                                        <div class="mb-2">
                                            <img src="<?= base_url('img/' . rawurlencode(basename($m['ft_blkg']))) ?>"
                                                 alt="Foto Belakang Mobil"
                                                 style="width:150px; height:auto;">
                                        </div>
                                    <?php endif; ?>

                                    <input type="file"
                                           name="ft_blkg"
                                           class="form-control-file"
                                           id="ft_blkg"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="form-text text-muted">
                                        Kosongkan jika tidak ingin mengganti foto.
                                    </small>
                                </div>
                            </div>

                            <!-- Foto Interior -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ft_interior">Foto Interior</label>

                                    <?php if (!empty($m['ft_interior'])) : ?>
                                        <div class="mb-2">
                                            <img src="<?= base_url('img/' . rawurlencode(basename($m['ft_interior']))) ?>"
                                                 alt="Foto Interior Mobil"
                                                 style="width:150px; height:auto;">
                                        </div>
                                    <?php endif; ?>

                                    <input type="file"
                                           name="ft_interior"
                                           class="form-control-file"
                                           id="ft_interior"
                                           accept=".jpg,.jpeg,.png">

                                    <small class="form-text text-muted">
                                        Kosongkan jika tidak ingin mengganti foto.
                                    </small>
                                </div>
                            </div>

                        </div>

                        <!-- Baris 4: Catatan Unit -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cttn_unit">Catatan Unit</label>
                                    <textarea name="cttn_unit"
                                              class="form-control"
                                              id="cttn_unit"
                                              rows="3"
                                              placeholder="Masukkan catatan mengenai kendaraan"><?= htmlspecialchars($m['cttn_unit'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <!-- Tombol Aksi Simpan & Kembali -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>

                        <a href="<?= base_url('Mobil_C/index') ?>"
                           class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
