<?php
// Konfigurasi koneksi ke database MySQL
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "octa-tech"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari formulir HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    echo "Nama: ".$data["nama"]."<br>";
    echo "Email: ". $data["email"]."<br>";
    echo "Alamat: ". $data["alamat"];

    // Menyimpan data ke database
    $sql = "INSERT INTO join (nama, email, alamat) VALUES ('$nama', '$email', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        $response = "Data berhasil disimpan ke database.";
    } else {
        $response = "Error: " . $sql . "<br>" . $conn->error;
    }

    echo $response;

    // Menutup koneksi
    $conn->close();
} else {
    echo "Permintaan tidak valid.";
}
?>
