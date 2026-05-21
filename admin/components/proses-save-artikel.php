<?php
session_start();
// Wajib diset di paling atas agar AJAX browser tidak macet
header('Content-Type: application/json');

// Matikan display error bawaan PHP sementara agar tidak merusak format JSON respon
error_reporting(0);
ini_set('display_errors', 0);

// 1. Hubungkan ke database batak_id milikmu
include '/opt/lampp/htdocs/batakid/database/config.php';

// Pastikan koneksi aman, jika gagal kirim pesan JSON
if (!$koneksi) {
    echo json_encode(['status' => 'error', 'message' => 'Koneksi database gagal!']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Akses tidak sah!']);
    exit;
}

// Tangkap parameter dasar
$kategori = isset($_POST['kategori']) ? mysqli_real_escape_string($koneksi, $_POST['kategori']) : 'sejarah';

$filename = 'default';
if (!empty($_POST['filename'])) {
    $filename = preg_replace("/[^a-zA-Z0-9_-]/", "", $_POST['filename']);
} elseif (!empty($_POST['nama_file'])) {
    $filename = preg_replace("/[^a-zA-Z0-9_-]/", "", $_POST['nama_file']);
}

// 2. DISINI PROTEKSI UTAMANYA: Mengamankan kode HTML (H1, H3, P, IMG) agar tidak merusak query SQL
$html_id = isset($_POST['html_id']) ? mysqli_real_escape_string($koneksi, $_POST['html_id']) : '';
$html_en = isset($_POST['html_en']) ? mysqli_real_escape_string($koneksi, $_POST['html_en']) : '';

if (empty($html_id) || $filename === 'default') {
    echo json_encode(['status' => 'error', 'message' => 'Konten kosong atau nama file salah!']);
    exit;
}

// 3. Eksekusi ke tabel asli kau 'konten_budaya' sesuai file sejarah.php
$cek = mysqli_query($koneksi, "SELECT id FROM konten_budaya WHERE nama_file = '$filename' AND kategori = '$kategori'");

if (!$cek) {
    echo json_encode(['status' => 'error', 'message' => 'Gagal cek tabel: ' . mysqli_error($koneksi)]);
    exit;
}

if (mysqli_num_rows($cek) > 0) {
    // Jalur UPDATE konten artikel dwi-bahasa
    $sql = "UPDATE konten_budaya SET konten_id = '$html_id', konten_en = '$html_en' WHERE nama_file = '$filename' AND kategori = '$kategori'";
} else {
    // Jalur INSERT otomatis jika data belum ada (fallback)
    $sql = "INSERT INTO konten_budaya (kategori, nama_file, title_id, title_en, desc_id, desc_en, konten_id, konten_en) 
            VALUES ('$kategori', '$filename', '$filename', '$filename', 'Deskripsi otomatis', 'Automatic description', '$html_id', '$html_en')";
}

if (!mysqli_query($koneksi, $sql)) {
    // Jika SQL gagal karena masalah struktur, AJAX akan memunculkan pesan error aslinya di layar
    echo json_encode(['status' => 'error', 'message' => 'Gagal eksekusi SQL: ' . mysqli_error($koneksi)]);
    exit;
}

// 4. LAHIRKAN FILE PHP PUBLIK DI FOLDER public/sejarah/
$folder_publik = dirname(dirname(__DIR__)) . '/public/sejarah/';
if (!file_exists($folder_publik)) {
    mkdir($folder_publik, 0775, true);
}

$path_file = $folder_publik . $filename . '.php';

// Gunakan template yang aman dari bentrokan tanda kutip HTML
$template = "<?php
include '../../database/config.php';
session_start();

if (isset(\$_GET['lang'])) {
    \$_SESSION['lang'] = \$_GET['lang'];
}
\$language = isset(\$_SESSION['lang']) ? \$_SESSION['lang'] : 'ID';

\$query = mysqli_query(\$koneksi, \"SELECT * FROM konten_budaya WHERE nama_file = '$filename'\");
\$data  = mysqli_fetch_assoc(\$query);

\$konten = (\$language == 'ID') ? \$data['konten_id'] : \$data['konten_en'];
\$judul  = (\$language == 'ID') ? \$data['title_id'] : \$data['title_en'];
?>
<!DOCTYPE html>
<html lang='id'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php echo \$judul; ?></title>
    <script src='https://cdn.tailwindcss.com'></script>
</head>
<body class='bg-gradient-to-b from-cyan-950 via-blue-900 to-sky-700 text-white min-h-screen py-12 px-6'>
    <div class='max-w-4xl mx-auto bg-white/10 backdrop-blur-md p-8 rounded-[35px] border border-cyan-300/20 shadow-2xl'>
        
        <div class='flex justify-end gap-2 mb-8 text-xs font-bold'>
            <a href='?lang=ID' class='px-4 py-2 rounded-xl <?php echo \$language == 'ID' ? 'bg-cyan-400 text-slate-950' : 'bg-white/10 text-white'; ?>'>ID</a>
            <a href='?lang=EN' class='px-4 py-2 rounded-xl <?php echo \$language == 'EN' ? 'bg-cyan-400 text-slate-950' : 'bg-white/10 text-white'; ?>'>EN</a>
        </div>

        <h1 class='text-4xl font-black text-cyan-300 mb-6'><?php echo \$judul; ?></h1>
        <div class='w-24 h-1 bg-cyan-400 mb-8 rounded-full'></div>

        <div class='leading-relaxed space-y-4 text-gray-100'>
            <?php echo stripslashes(\$konten); ?>
        </div>
        
        <div class='mt-12 pt-6 border-t border-cyan-300/10'>
            <a href='../../sejarah.php' class='text-xs font-bold text-cyan-400 hover:underline'>&larr; Kembali ke Daftar Sejarah</a>
        </div>
    </div>
</body>
</html>";

file_put_contents($path_file, $template);

// Kirim sinyal sukses kembali ke AJAX editor kau
echo json_encode(['status' => 'success']);
exit;