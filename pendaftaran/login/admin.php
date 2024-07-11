<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.html');
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql_delete = "DELETE FROM osis_form WHERE id = $id";
    $conn->query($sql_delete);
}

$sql = "SELECT * FROM osis_form";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Wildan Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }
        h1 {
            color: #1e90ff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #1e90ff;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #1e90ff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #e6f7ff;
        }
        .button {
            background-color: #1e90ff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }
        .button:hover {
            background-color: #005cbf;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
    <script>
        function printData() {
            var divToPrint = document.getElementById("data-table");
            var newWin = window.open("");
            newWin.document.write('<html><head><title>Print Data</title>');
            newWin.document.write('<style>table, th, td { border: 1px solid #1e90ff; border-collapse: collapse; padding: 10px; } th { background-color: #1e90ff; color: white; }</style>');
            newWin.document.write('</head><body>');
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('</body></html>');
            newWin.print();
            newWin.close();
        }
    </script>
</head>
<body>

<h1>Wildan Dashboard</h1>

<table id="data-table">
    <tr>
        <th>Nama</th>
        <th>Kelas</th>
        <th>No WA</th>
        <th>Pilihan Divisi</th>
        <th>Pilihan BPH</th>
        <th>Pilihan Sekbid</th>
        <th>Alasan</th>
        <th>Visi</th>
        <th>Misi</th>
        <th>Foto</th>
        <th>Timestamp</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $foto_path = htmlspecialchars($row['foto_path']);
            $img_tag = "<img src='$foto_path' alt='Foto'>";
            echo "<tr>
                    <td>{$row['nama']}</td>
                    <td>{$row['kelas']}</td>
                    <td>{$row['no_wa']}</td>
                    <td>{$row['pilihan_divisi']}</td>
                    <td>{$row['pilihan_bph']}</td>
                    <td>{$row['pilihan_sekbid']}</td>
                    <td>{$row['alasan']}</td>
                    <td>{$row['visi']}</td>
                    <td>{$row['misi']}</td>
                    <td>$img_tag</td>
                    <td>{$row['timestamp']}</td>
                    <td>
                        <form method='POST' action=''>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input class='button' type='submit' name='delete' value='Delete'>
                        </form>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='12'>Tidak ada data</td></tr>";
    }
    ?>
</table>

<button class="button" onclick="printData()">Print Data</button>

</body>
</html>

<?php
$conn->close();
?>
