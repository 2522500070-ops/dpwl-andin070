<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA MOBIL</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Mobil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <a href="<?= base_url('?url=Mobil_C/create_mobil') ?>"
                       class="btn btn-primary mb-3">
                        <i class="fas fa-car"></i> Tambah Data Mobil
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No. Plat</th>
                                    <th>Nama Mobil</th>
                                    <th>Jumlah Kursi</th>
                                    <th>Jumlah Bagasi</th>
                                    <th>Jenis Mobil</th>
                                    <th>Transmisi</th>
                                    <th>Tahun</th>
                                    <th>Foto</th>
                                    <th>Biaya Perhari</th>
                                    <th>Catatan Unit</th>
                                    <th>Status Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php if (!empty($dtmobil)) : ?>
                                <?php foreach ($dtmobil as $m) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($m['no_plat']) ?></td>
                                        <td><?= htmlspecialchars($m['nm_mobil']) ?></td>
                                        <td><?= htmlspecialchars($m['nkursi']) ?></td>
                                        <td><?= htmlspecialchars($m['nbagasi']) ?></td>
                                        <td><?= htmlspecialchars($m['jns_mobil']) ?></td>
                                        <td><?= htmlspecialchars($m['transmisi']) ?></td>
                                        <td><?= htmlspecialchars($m['thn_buat']) ?></td>

                                        <!-- Foto depan, belakang, dan interior -->
                                        <td style="min-width:120px;">
                                            <?php
                                            $labelFoto = [
                                                'ft_depan' => 'Foto Depan',
                                                'ft_blkg' => 'Foto Belakang',
                                                'ft_interior' => 'Foto Interior'
                                            ];

                                            foreach ($labelFoto as $field => $label) :
                                                $namaFoto = $m[$field] ?? '';

                                                if ($namaFoto !== '') :
                                                    $urlFoto = base_url(
                                                        'img/' . rawurlencode(basename($namaFoto))
                                                    );
                                            ?>
                                                <div class="mb-2">
                                                    <small><?= $label ?></small>
                                                    <br>
                                                    <img
                                                        src="<?= htmlspecialchars($urlFoto, ENT_QUOTES) ?>"
                                                        alt="<?= $label ?>"
                                                        class="foto-mobil"
                                                        onclick="perbesarFoto(this)"
                                                        style="width:100px;height:auto;margin-bottom:5px;border-radius:5px;cursor:zoom-in;">
                                                </div>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                        </td>

                                        <td>
                                            Rp <?= number_format(
                                                (float)$m['hrg_hari'],
                                                0,
                                                ',',
                                                '.'
                                            ) ?>
                                        </td>

                                        <td><?= htmlspecialchars($m['cttn_unit'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($m['status_unit']) ?></td>

                                        <td style="min-width:100px;">
                                            <a
                                                href="<?= base_url('?url=Mobil_C/edit&no_plat=' . urlencode($m['no_plat'])) ?>"
                                                class="btn btn-warning btn-sm mb-1">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <form
                                                action="<?= base_url('?url=Mobil_C/hapus') ?>"
                                                method="post"
                                                style="display:inline;"
                                                onsubmit="return confirm('Yakin ingin menghapus data mobil <?= htmlspecialchars($m['no_plat'], ENT_QUOTES) ?>? Data yang dihapus tidak dapat dikembalikan.');">

                                                <input
                                                    type="hidden"
                                                    name="no_plat"
                                                    value="<?= htmlspecialchars($m['no_plat'], ENT_QUOTES) ?>">

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
                                    <td colspan="12" class="text-center">
                                        Data mobil belum tersedia.
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
         alt="Foto Mobil Diperbesar"
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
