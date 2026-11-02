<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Entri Data Penyewa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Penyewa_C070/index') ?>">Master Penyewa</a>
                        </li>
                        <li class="breadcrumb-item active">Entri Penyewa</li>
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

                <!-- Form Entri Data Penyewa -->
                <form action="<?= base_url('Penyewa_C070/simpan') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <!-- Baris 1: Username dan Kata Sandi -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_plg070">Username</label>
                                    <input type="text" name="user_plg070" class="form-control" id="user_plg070" placeholder="Masukkan username" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sandi070">Kata Sandi</label>
                                    <input type="password" name="sandi070" class="form-control" id="sandi070" placeholder="Masukkan kata sandi" required>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 2: NIK dan Nama Lengkap -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik070">NIK</label>
                                    <input type="text" name="nik070" class="form-control" id="nik070" placeholder="Masukkan NIK" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nm_lngkp070">Nama Lengkap</label>
                                    <input type="text" name="nm_lngkp070" class="form-control" id="nm_lngkp070" placeholder="Masukkan nama lengkap" required>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 3: Nomor HP -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="no_hp070">No. Handphone</label>
                                    <input type="text" name="no_hp070" class="form-control" id="no_hp070" placeholder="Masukkan nomor handphone" required>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 4: Alamat Lengkap -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="almt_lngkp070">Alamat Lengkap</label>
                                    <textarea name="almt_lngkp070" class="form-control" id="almt_lngkp070" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Section Unggah Foto Identitas -->
                        <h5 class="mt-3"><i class="fas fa-camera"></i> Foto Identitas</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ft_ktp">Foto KTP</label>
                                    <input type="file" name="ft_ktp" class="form-control-file" id="ft_ktp" accept=".jpg,.jpeg,.png" required>
                                    <small class="form-text text-muted">Format JPG, JPEG atau PNG</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ft_sim_a">Foto SIM A</label>
                                    <input type="file" name="ft_sim_a" class="form-control-file" id="ft_sim_a" accept=".jpg,.jpeg,.png" required>
                                    <small class="form-text text-muted">Format JPG, JPEG atau PNG</small>
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
                        <a href="<?= base_url('Penyewa_C070/index') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
