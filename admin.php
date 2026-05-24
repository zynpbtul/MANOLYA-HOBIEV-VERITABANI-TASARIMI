<?php
// veritabanı bağlantı dosyanı buraya dahil et
// include 'baglan.php'; 

// Örnek bir bağlantı yapısı (kendi bağlantı koduna göre düzenleyebilirsin)
$baglanti = new mysqli("localhost", "root", "", "manolya_hobievi");
$baglanti->set_charset("utf8mb4");

if ($baglanti->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $baglanti->connect_error);
}

$mesaj = "";
$sorgu_sonucu = null;
$calisan_sql = "";

// SQL Konsolundan form gönderildiğinde
if (isset($_POST['sql_komutu'])) {
    $calisan_sql = trim($_POST['sql_komutu']);
    
    if (!empty($calisan_sql)) {
        // Çoklu sorgularda hata almamak için tekil çalıştırma yapıyoruz
        $sonuc = $baglanti->query($calisan_sql);
        
        if ($sonuc === TRUE) {
            $mesaj = "<div class='alert success'>✔ Komut başarıyla çalıştırıldı. Etkilenen satır sayısı: " . $baglanti->affected_rows . "</div>";
        } elseif ($sonuc instanceof mysqli_result) {
            $sorgu_sonucu = $sonuc;
            $mesaj = "<div class='alert success'>✔ Veriler başarıyla getirildi. Toplam satır: " . $sorgu_sonucu->num_rows . "</div>";
        } else {
            $mesaj = "<div class='alert error'>❌ SQL Hatası: " . $baglanti->error . "</div>";
        }
    } else {
        $mesaj = "<div class='alert error'>❌ Lütfen boş komut göndermeyin!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manolya Hobievi - Hoca Özel SQL Paneli</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-top: 0;
        }
        p.subtitle {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 25px;
        }
        textarea {
            width: 100%;
            height: 150px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            padding: 15px;
            border: 2px solid #bdc3c7;
            border-radius: 6px;
            box-sizing: border-box;
            resize: vertical;
            background-color: #fafafa;
        }
        textarea:focus {
            border-color: #3498db;
            outline: none;
            background-color: #fff;
        }
        button {
            background-color: #2c3e50;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 15px;
            transition: background 0.2s;
        }
        button:hover {
            background-color: #1a252f;
        }
        .alert {
            padding: 15px;
            margin-top: 20px;
            border-radius: 6px;
            font-weight: 500;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .result-container {
            margin-top: 30px;
        }
        .result-container h2 {
            color: #2c3e50;
            font-size: 18px;
        }
        .sql-preview {
            background: #2c3e50;
            color: #fff;
            padding: 10px 15px;
            border-radius: 6px;
            font-family: monospace;
            font-size: 14px;
            margin-bottom: 15px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f8f9fa;
            color: #2c3e50;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Manolya Hobievi - SQL Konsolu</h1>
    <p class="subtitle">Bu alandan veritabanına doğrudan ham SQL sorguları gönderebilirsiniz. (SELECT, INSERT, UPDATE, DELETE)</p>

    <form method="POST" action="">
        <textarea name="sql_komutu" placeholder="Sorgunuzu buraya yazın... Örn: SELECT * FROM urun;" required><?php echo htmlspecialchars($calisan_sql); ?></textarea>
        <button type="submit">Sorguyu Çalıştır</button>
    </form>

    <?php echo $mesaj; ?>

    <?php if ($sorgu_sonucu !== null && $sorgu_sonucu->num_rows > 0): ?>
        <div class="result-container">
            <h2>Sorgu Çıktısı</h2>
            <div class="sql-preview">Son Çalışan Sorgu: <?php echo htmlspecialchars($calisan_sql); ?></div>
            
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <?php 
                            // Dinamik olarak gelen tablonun sütun isimlerini yakalıyoruz
                            $alanlar = $sorgu_sonucu->fetch_fields();
                            foreach ($alanlar as $alan) {
                                echo "<th>" . htmlspecialchars($alan->name) . "</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Verileri satır satır tabloya basıyoruz
                        while ($satir = $sorgu_sonucu->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($satir as $veri) {
                                echo "<td>" . ($veri !== null ? htmlspecialchars($veri) : "<i>NULL</i>") . "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

</body>
</html>