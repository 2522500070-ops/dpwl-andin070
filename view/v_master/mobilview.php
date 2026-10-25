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

                                        <td style="min-width:120px;">
                                            <?php
                                            foreach (
                                                ['ft_depan', 'ft_blkg', 'ft_interior'] as $field
                                            ) :
                                                $namaFoto = $m[$field] ?? '';

                                                if ($namaFoto !== '') :
                                            ?>
                                                <img
                                                    src="<?= base_url('img/' . rawurlencode(basename($namaFoto))) ?>"
                                                    alt="Foto Mobil"
                                                    style="width:100px;height:auto;margin-bottom:5px;border-radius:5px;">
                                                <br>
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
                                                href="<?= base_url('?url=Mobil_C/edit_mobil&no_plat=' . urlencode($m['no_plat'])) ?>"
                                                class="btn btn-warning btn-sm mb-1">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <form
                                                action="<?= base_url('?url=Mobil_C/hapus_mobil') ?>"
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

<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>