<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kategori   = isset($_POST['kategori']) ? mysqli_real_escape_string($koneksi, $_POST['kategori']) : 'sejarah';
    $nama_file  = isset($_POST['nama_file']) ? mysqli_real_escape_string($koneksi, strtolower(trim($_POST['nama_file']))) : '';
    $title_id   = isset($_POST['title_id']) ? mysqli_real_escape_string($koneksi, $_POST['title_id']) : '';
    $title_en   = isset($_POST['title_en']) ? mysqli_real_escape_string($koneksi, $_POST['title_en']) : '';
    $desc_id    = isset($_POST['desc_id']) ? mysqli_real_escape_string($koneksi, $_POST['desc_id']) : '';
    $desc_en    = isset($_POST['desc_en']) ? mysqli_real_escape_string($koneksi, $_POST['desc_en']) : '';

    if (!isset($_FILES['gambar_file']) || $_FILES['gambar_file']['error'] == UPLOAD_ERR_NO_FILE) {
        die("<div class='p-4 bg-rose-500/10 border border-rose-500/20 rounded-xl text-rose-400 text-sm'>Error: Berkas gambar pendukung wajib dipilih, Lae!</div>");
    }

    $gambar_nama = $_FILES['gambar_file']['name'];
    $gambar_tmp  = $_FILES['gambar_file']['tmp_name'];
    
    $ekstensi = strtolower(pathinfo($gambar_nama, PATHINFO_EXTENSION));
    
    // Request acak nama berkas gambar 20 karakter
    $string_acak = substr(md5(uniqid(rand(), true)), 0, 20);
    $gambar_baru = $string_acak . "." . $ekstensi;
    
    $folder_uploads = "../assets/uploads/";
    if (!is_dir($folder_uploads)) {
        mkdir($folder_uploads, 0777, true);
    }

    $target_dir = $folder_uploads . $gambar_baru;

    if (move_uploaded_file($gambar_tmp, $target_dir)) {
        
        $folder_publik = "../public/" . $kategori . "/";
        if (!is_dir($folder_publik)) {
            mkdir($folder_publik, 0777, true);
        }

        $PathFileBaru = $folder_publik . $nama_file . ".php";

        $isi_file = "<?php
session_start();
\$language = isset(\$_SESSION['lang']) ? \$_SESSION['lang'] : 'ID';
?>
<!DOCTYPE html>
<html lang=\"id\">
<head>
    <meta charset=\"UTF-8\">
    <title><?php echo (\$language == 'ID') ? '$title_id' : '$title_en'; ?></title>
    <script src=\"https://cdn.tailwindcss.com\"></script>
</head>
<body class=\"bg-slate-950 text-white p-8\">
    <div class=\"max-w-3xl mx-auto\">
        <a href=\"../../$kategori.php\" class=\"text-cyan-400\">&larr; Kembali</a>
        <h1 class=\"text-4xl font-black mt-6\"><?php echo (\$language == 'ID') ? '$title_id' : '$title_en'; ?></h1>
        <img src=\"../../assets/uploads/$gambar_baru\" class=\"w-full h-96 object-cover rounded-3xl my-6\">
        <p class=\"text-slate-300 leading-relaxed\"><?php echo (\$language == 'ID') ? '$desc_id' : '$desc_en'; ?></p>
    </div>
</body>
</html>";

        file_put_contents($PathFileBaru, $isi_file);

        $query_simpan = "INSERT INTO konten_budaya (kategori, nama_file, title_id, title_en, gambar, desc_id, desc_en) 
                         VALUES ('$kategori', '$nama_file', '$title_id', '$title_en', '$gambar_baru', '$desc_id', '$desc_en')";
        
        if (mysqli_query($koneksi, $query_simpan)) {
            echo "<script>
                    alert('Data sukses disimpan, Lae! Gambar berhasil diacak otomatis.');
                    window.location.href = 'index.php?page=modif&kategori=$kategori';
                  </script>";
        } else {
            die("<div class='p-4 bg-rose-500/10 border border-rose-500/20 rounded-xl text-rose-400 text-sm'>Gagal query DB: " . mysqli_error($koneksi) . "</div>");
        }

    } else {
        echo "<div class='p-6 bg-slate-900 border border-slate-800 rounded-2xl'>
                <h3 class='text-rose-400 font-bold mb-2'>Gagal memindahkan berkas gambar, Lae!</h3>
                <p class='text-xs text-slate-400'>Error Code PHP: " . $_FILES['gambar_file']['error'] . "</p>
                <p class='text-xs text-slate-400'>Target Tujuan: " . $target_dir . "</p>
                <p class='text-xs text-slate-500 mt-2'>*Pastikan izin folder sudah 777 lewat terminal Linux Mint kau.</p>
              </div>";
    }
}
?>