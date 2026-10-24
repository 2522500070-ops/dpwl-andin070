<?php
// Impor file konfigurasi database
require_once 'config/database.php';
// Inisialisasi koneksi MySQLi
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);
// Periksa koneksi ke database
if ($db->connect_error) {
    die("Koneksi ke database gagal: " . $db->connect_error);
}

// Data admin khusus
$username = 'andin@gmail.com';
$plain_pass = '225';
$status_akun = 'Aktif';

// 1. Enkripsi kata sandi menggunakan BCRYPT hash
$hashed_pass = password_hash($plain_pass, PASSWORD_DEFAULT);

// 2. Simpan atau perbarui akun admin di tabel admin
$stmt = $db->prepare(
    "INSERT INTO admin (username, password, status_akun)
    VALUES (?, ?, ?)
    ON DUPLICATE KEY UPDATE
    password = ?, status_akun = ?"
);

$stmt->bind_param(
    "sssss",
    $username,
    $hashed_pass,
    $status_akun,
    $hashed_pass,
    $status_akun
);

// 3. Jalankan query dan tampilkan hasil
if ($stmt->execute()) {

    echo "<h3>Berhasil Meng-update Akun Admin!</h3>";

    echo "<p><strong>Username:</strong> " . htmlspecialchars($username) . "</p>";

    echo "<p><strong>Password Asli:</strong> " . htmlspecialchars($plain_pass) . "</p>";

    echo "<p><strong>Password Hash:</strong> " . htmlspecialchars($hashed_pass) . "</p>";

} else {

    echo "Gagal menyimpan data: " . $stmt->error;

}

// 4. Tutup statement dan koneksi database
$stmt->close();
$db->close();

?>
