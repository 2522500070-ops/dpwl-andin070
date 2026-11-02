<?php
$p = $penyewa;
?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Update Data Penyewa</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Update Penyewa</h3>
                </div>

                <form
                    action="<?= base_url('?url=Penyewa_C070/UpdatePenyewa') ?>"
                    method="post"
                    enctype="multipart/form-data">

                    <div class="card-body">

                        <input
                            type="hidden"
                            name="user_plg_lama"
                            value="<?= htmlspecialchars($p['user_plg070'], ENT_QUOTES) ?>">

                        <div class="form-group">
                            <label>Username</label>
                            <input
                                type="text"
                                name="user_plg070"
                                class="form-control"
                                value="<?= htmlspecialchars($p['user_plg070'], ENT_QUOTES) ?>"
                                readonly
                                required>
                        </div>

                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input
                                type="password"
                                name="sandi070"
                                class="form-control"
                                value="<?= htmlspecialchars($p['sandi070'], ENT_QUOTES) ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input
                                type="text"
                                name="nik070"
                                class="form-control"
                                value="<?= htmlspecialchars($p['nik070'], ENT_QUOTES) ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input
                                type="text"
                                name="nm_lngkp070"
                                class="form-control"
                                value="<?= htmlspecialchars($p['nm_lngkp070'], ENT_QUOTES) ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label>No. Handphone</label>
                            <input
                                type="text"
                                name="no_hp070"
                                class="form-control"
                                value="<?= htmlspecialchars($p['no_hp070'], ENT_QUOTES) ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea
                                name="almt_lngkp070"
                                class="form-control"
                                rows="3"
                                required><?= htmlspecialchars($p['almt_lngkp070'], ENT_QUOTES) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Foto KTP</label>

                            <?php if (!empty($p['ft_ktp'])) : ?>
                                <div class="mb-2">
                                    <img
                                        src="<?= base_url('img/' . rawurlencode(basename($p['ft_ktp']))) ?>"
                                        alt="Foto KTP"
                                        style="width:150px;height:auto;">
                                </div>
                            <?php endif; ?>

                            <input
                                type="file"
                                name="ft_ktp"
                                class="form-control-file"
                                accept=".jpg,.jpeg,.png">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto KTP.
                            </small>
                        </div>

                        <div class="form-group">
                            <label>Foto SIM A</label>

                            <?php if (!empty($p['ft_sim_a'])) : ?>
                                <div class="mb-2">
                                    <img
                                        src="<?= base_url('img/' . rawurlencode(basename($p['ft_sim_a']))) ?>"
                                        alt="Foto SIM A"
                                        style="width:150px;height:auto;">
                                </div>
                            <?php endif; ?>

                            <input
                                type="file"
                                name="ft_sim_a"
                                class="form-control-file"
                                accept=".jpg,.jpeg,.png">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto SIM A.
                            </small>
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
                            href="<?= base_url('?url=Penyewa_C070/index') ?>"
                            class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </section>
</div>
