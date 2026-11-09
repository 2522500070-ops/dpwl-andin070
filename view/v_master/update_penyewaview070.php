<?php
$p = $penyewa;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Data Penyewa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Penyewa_C070/index') ?>">Master Penyewa</a>
                        </li>
                        <li class="breadcrumb-item active">Update Penyewa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-edit"></i> Form Update Data Penyewa
                    </h3>
                </div>

                <form action="<?= base_url('Penyewa_C070/UpdatePenyewa') ?>"
                    method="post"
                    enctype="multipart/form-data">

                    <div class="card-body">

                        <input
                            type="hidden"
                            name="user_plg_lama"
                            value="<?= htmlspecialchars($p['user_plg070'], ENT_QUOTES) ?>">

                        <!-- Baris 1: Username dan Kata Sandi -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_plg070">Username</label>
                                    <input
                                        type="text"
                                        name="user_plg070"
                                        class="form-control"
                                        id="user_plg070"
                                        value="<?= htmlspecialchars($p['user_plg070'], ENT_QUOTES) ?>"
                                        readonly
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sandi070">Kata Sandi</label>
                                    <input
                                        type="password"
                                        name="sandi070"
                                        class="form-control"
                                        id="sandi070"
                                        value="<?= htmlspecialchars($p['sandi070'], ENT_QUOTES) ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 2: NIK dan Nama Lengkap -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik070">NIK</label>
                                    <input
                                        type="text"
                                        name="nik070"
                                        class="form-control"
                                        id="nik070"
                                        value="<?= htmlspecialchars($p['nik070'], ENT_QUOTES) ?>"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nm_lngkp070">Nama Lengkap</label>
                                    <input
                                        type="text"
                                        name="nm_lngkp070"
                                        class="form-control"
                                        id="nm_lngkp070"
                                        value="<?= htmlspecialchars($p['nm_lngkp070'], ENT_QUOTES) ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 3: Nomor HP -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="no_hp070">No. Handphone</label>
                                    <input
                                        type="text"
                                        name="no_hp070"
                                        class="form-control"
                                        id="no_hp070"
                                        value="<?= htmlspecialchars($p['no_hp070'], ENT_QUOTES) ?>"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 4: Alamat Lengkap -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="almt_lngkp070">Alamat Lengkap</label>
                                    <textarea
                                        name="almt_lngkp070"
                                        class="form-control"
                                        id="almt_lngkp070"
                                        rows="3"
                                        required><?= htmlspecialchars($p['almt_lngkp070'], ENT_QUOTES) ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Foto Identitas -->
                        <h5 class="mt-3">
                            <i class="fas fa-camera"></i> Foto Identitas
                        </h5>

                        <div class="row">

                            <!-- Foto KTP -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ft_ktp">Foto KTP</label>

                                    <?php if (!empty($p['ft_ktp'])) : ?>
                                        <div class="mb-2">
                                            <img
                                                src="<?= base_url('img/' . rawurlencode(basename($p['ft_ktp']))) ?>"
                                                alt="Foto KTP"
                                                style="width: 150px; height: auto; display: block;">
                                        </div>
                                    <?php endif; ?>

                                    <input
                                        type="file"
                                        name="ft_ktp"
                                        class="form-control-file"
                                        id="ft_ktp"
                                        accept=".jpg,.jpeg,.png">

                                    <small class="form-text text-muted">
                                        Kosongkan jika tidak ingin mengganti foto KTP.
                                    </small>
                                </div>
                            </div>

                            <!-- Foto SIM A -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ft_sim_a">Foto SIM A</label>

                                    <?php if (!empty($p['ft_sim_a'])) : ?>
                                        <div class="mb-2">
                                            <img
                                                src="<?= base_url('img/' . rawurlencode(basename($p['ft_sim_a']))) ?>"
                                                alt="Foto SIM A"
                                                style="width: 150px; height: auto; display: block;">
                                        </div>
                                    <?php endif; ?>

                                    <input
                                        type="file"
                                        name="ft_sim_a"
                                        class="form-control-file"
                                        id="ft_sim_a"
                                        accept=".jpg,.jpeg,.png">

                                    <small class="form-text text-muted">
                                        Kosongkan jika tidak ingin mengganti foto SIM A.
                                    </small>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Tombol Aksi -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>

                        <a href="<?= base_url('Penyewa_C070/index') ?>"
                            class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </section>
</div>
