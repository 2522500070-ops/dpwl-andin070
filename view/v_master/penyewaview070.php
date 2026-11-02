<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA PENYEWA</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Penyewa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <a href="<?= base_url('?url=Penyewa_C070/create_penyewa') ?>"
                       class="btn btn-primary mb-3">
                        <i class="fas fa-user-plus"></i> Tambah Data Penyewa
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>No. Handphone</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Foto KTP</th>
                                    <th>Foto SIM A</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php if (!empty($dtpenyewa)) : ?>
                                <?php foreach ($dtpenyewa as $p) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($p['user_plg070']) ?></td>
                                        <td><?= htmlspecialchars($p['nik070']) ?></td>
                                        <td><?= htmlspecialchars($p['nm_lngkp070']) ?></td>
                                        <td><?= htmlspecialchars($p['no_hp070']) ?></td>
                                        <td><?= htmlspecialchars($p['almt_lngkp070']) ?></td>

                                        <!-- Foto KTP -->
                                        <td style="min-width:120px;">
                                            <?php
                                            $namaFotoKTP = $p['ft_ktp'] ?? '';

                                            if ($namaFotoKTP !== '') :
                                                $urlFotoKTP = base_url(
                                                    'img/' . rawurlencode(basename($namaFotoKTP))
                                                );
                                            ?>
                                                <img
                                                    src="<?= htmlspecialchars($urlFotoKTP, ENT_QUOTES) ?>"
                                                    alt="Foto KTP"
                                                    class="foto-penyewa"
                                                    onclick="perbesarFoto(this)"
                                                    style="width:100px;height:auto;margin-bottom:5px;border-radius:5px;cursor:zoom-in;">
                                            <?php else : ?>
                                                <small>Foto tidak tersedia</small>
                                            <?php endif; ?>
                                        </td>

                                        <!-- Foto SIM A -->
                                        <td style="min-width:120px;">
                                            <?php
                                            $namaFotoSIM = $p['ft_sim_a'] ?? '';

                                            if ($namaFotoSIM !== '') :
                                                $urlFotoSIM = base_url(
                                                    'img/' . rawurlencode(basename($namaFotoSIM))
                                                );
                                            ?>
                                                <img
                                                    src="<?= htmlspecialchars($urlFotoSIM, ENT_QUOTES) ?>"
                                                    alt="Foto SIM A"
                                                    class="foto-penyewa"
                                                    onclick="perbesarFoto(this)"
                                                    style="width:100px;height:auto;margin-bottom:5px;border-radius:5px;cursor:zoom-in;">
                                            <?php else : ?>
                                                <small>Foto tidak tersedia</small>
                                            <?php endif; ?>
                                        </td>

                                        <!-- Tombol Edit dan Hapus -->
                                        <td style="min-width:100px;">
                                            <a
                                                href="<?= base_url('?url=Penyewa_C070/edit&user_plg070=' . urlencode($p['user_plg070'])) ?>"
                                                class="btn btn-warning btn-sm mb-1">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <form
                                                action="<?= base_url('?url=Penyewa_C070/hapus') ?>"
                                                method="post"
                                                style="display:inline;"
                                                onsubmit="return confirm('Yakin ingin menghapus data penyewa <?= htmlspecialchars($p['user_plg070'], ENT_QUOTES) ?>? Data yang dihapus tidak dapat dikembalikan.');">

                                                <input
                                                    type="hidden"
                                                    name="user_plg070"
                                                    value="<?= htmlspecialchars($p['user_plg070'], ENT_QUOTES) ?>">

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm mb-1">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">
                                        Data penyewa belum tersedia.
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal untuk memperbesar foto -->
<div id="modalFoto"
     style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.85);text-align:center;padding:40px 15px;box-sizing:border-box;"
     onclick="tutupFoto()">

    <span
        style="position:absolute;top:15px;right:30px;color:white;font-size:40px;font-weight:bold;cursor:pointer;"
        onclick="tutupFoto()">&times;</span>

    <img id="gambarBesar"
         src=""
         alt="Foto Identitas Penyewa Diperbesar"
         style="max-width:95%;max-height:85vh;object-fit:contain;margin-top:20px;border-radius:5px;"
         onclick="event.stopPropagation()">

    <p id="judulFoto" style="color:white;margin-top:10px;"></p>
</div>

<script>
    function perbesarFoto(gambar) {
        var modal = document.getElementById('modalFoto');
        var gambarBesar = document.getElementById('gambarBesar');
        var judulFoto = document.getElementById('judulFoto');

        gambarBesar.src = gambar.src;
        gambarBesar.alt = gambar.alt;
        judulFoto.textContent = gambar.alt;

        modal.style.display = 'block';
    }

    function tutupFoto() {
        document.getElementById('modalFoto').style.display = 'none';
        document.getElementById('gambarBesar').src = '';
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            tutupFoto();
        }
    });
</script>

<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
