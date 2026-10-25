<?php
$m = $mobil;
?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Data Mobil</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Mobil</h3>
                </div>

                <form
                    action="<?= base_url('?url=Mobil_C/update_mobil') ?>"
                    method="post"
                    enctype="multipart/form-data">

                    <div class="card-body">

                        <input
                            type="hidden"
                            name="no_plat_lama"
                            value="<?= htmlspecialchars($m['no_plat']) ?>">

                        <div class="form-group">
                            <label>Nomor Plat</label>
                            <input
                                type="text"
                                name="no_plat"
                                class="form-control"
                                value="<?= htmlspecialchars($m['no_plat']) ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <input
                                type="text"
                                name="nm_mobil"
                                class="form-control"
                                value="<?= htmlspecialchars($m['nm_mobil']) ?>"
                                required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Kursi</label>
                                    <input
                                        type="number"
                                        name="nkursi"
                                        class="form-control"
                                        min="1"
                                        value="<?= htmlspecialchars($m['nkursi']) ?>"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Bagasi</label>
                                    <input
                                        type="number"
                                        name="nbagasi"
                                        class="form-control"
                                        min="0"
                                        value="<?= htmlspecialchars($m['nbagasi']) ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jenis Mobil</label>
                            <input
                                type="text"
                                name="jns_mobil"
                                class="form-control"
                                value="<?= htmlspecialchars($m['jns_mobil']) ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Transmisi</label>
                            <select
                                name="transmisi"
                                class="form-control"
                                required>
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

                        <div class="form-group">
                            <label>Tahun Buat</label>
                            <input
                                type="number"
                                name="thn_buat"
                                class="form-control"
                                min="1900"
                                max="2100"
                                value="<?= htmlspecialchars($m['thn_buat']) ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Foto Depan</label>
                            <?php if (!empty($m['ft_depan'])) : ?>
                                <div class="mb-2">
                                    <img
                                        src="<?= base_url('img/' . rawurlencode(basename($m['ft_depan']))) ?>"
                                        alt="Foto depan mobil"
                                        style="width:150px; height:auto;">
                                </div>
                            <?php endif; ?>
                            <input
                                type="file"
                                name="ft_depan"
                                class="form-control-file"
                                accept=".jpg,.jpeg,.png">
                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto.
                            </small>
                        </div>

                        <div class="form-group">
                            <label>Foto Belakang</label>
                            <?php if (!empty($m['ft_blkg'])) : ?>
                                <div class="mb-2">
                                    <img
                                        src="<?= base_url('img/' . rawurlencode(basename($m['ft_blkg']))) ?>"
                                        alt="Foto belakang mobil"
                                        style="width:150px; height:auto;">
                                </div>
                            <?php endif; ?>
                            <input
                                type="file"
                                name="ft_blkg"
                                class="form-control-file"
                                accept=".jpg,.jpeg,.png">
                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto.
                            </small>
                        </div>

                        <div class="form-group">
                            <label>Foto Interior</label>
                            <?php if (!empty($m['ft_interior'])) : ?>
                                <div class="mb-2">
                                    <img
                                        src="<?= base_url('img/' . rawurlencode(basename($m['ft_interior']))) ?>"
                                        alt="Foto interior mobil"
                                        style="width:150px; height:auto;">
                                </div>
                            <?php endif; ?>
                            <input
                                type="file"
                                name="ft_interior"
                                class="form-control-file"
                                accept=".jpg,.jpeg,.png">
                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto.
                            </small>
                        </div>

                        <div class="form-group">
                            <label>Biaya Per Hari</label>
                            <input
                                type="number"
                                name="hrg_hari"
                                class="form-control"
                                min="0"
                                step="0.01"
                                value="<?= htmlspecialchars($m['hrg_hari']) ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Catatan Unit</label>
                            <textarea
                                name="cttn_unit"
                                class="form-control"
                                rows="3"><?= htmlspecialchars($m['cttn_unit']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Status Unit</label>
                            <select
                                name="status_unit"
                                class="form-control"
                                required>
                                <option value="Tersedia"
                                    <?= $m['status_unit'] === 'Tersedia' ? 'selected' : '' ?>>
                                    Tersedia
                                </option>
                                <option value="Disewa"
                                    <?= $m['status_unit'] === 'Disewa' ? 'selected' : '' ?>>
                                    Disewa
                                </option>
                                <option value="Perawatan"
                                    <?= $m['status_unit'] === 'Perawatan' ? 'selected' : '' ?>>
                                    Perawatan
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button
                            type="submit"
                            class="btn btn-warning">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
                        </button>

                        <a
                            href="<?= base_url('?url=Mobil_C/index') ?>"
                            class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </section>
</div>