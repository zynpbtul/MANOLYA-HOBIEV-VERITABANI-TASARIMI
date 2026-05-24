<?php
include 'baglan.php';
// Bebek Hırkası kategorisinin ID'si: 4
$sql_sorgusu = "SELECT * FROM URUN WHERE kategori_id = 4"; 
$urun_listesi = $conn->query($sql_sorgusu);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler - Manolya Hobi Evi</title>

    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="anasayfa.css">     
    <link rel="stylesheet" href="urunler.css">  

</head>
<body>

    
<div class="navbar">

    <div class="left-area">
        <div class="logo"><i>🌸Manolya Hobievi</i></div>

        <div class="menu">

            <a href="anasayfa.php">Anasayfa</a>
        
            <div class="dropdown-menu-container">
                <a class="menu-main" href="">Ürünler</a>

                <div class="dropdown-menu">
                    <a href="amigurumi.php">Amigurumi</a>
                    <a href="atki-eldiven.php">Atkı & Eldiven</a>
                    <a href="canta.php">Çanta</a>
                    <a href="bebek-hirkasi.php">Bebek Hırkası</a>
                </div>
            </div>

            <a href="hakkimda.php" class="active">Hakkımızda</a>
            <a href="iletisim.php">İletişim</a>

        </div>
    </div>

        <div class="icon-box">

        <div class="cart-icon">
            <i class="bi bi-cart"></i>
            <span id="cart-count">0</span>

            <div class="cart-dropdown">
                <ul id="cart-items"></ul>
                <p id="cart-total"></p>
                <button id="clear-cart">Sepeti Temizle</button>
            </div>
        </div>

        <div class="user-icon">
            <i class="bi bi-person-fill"></i>
            <div class="dropdown">
                <a href="login.html">Giriş Yap</a>
                <a href="hesapolustur.html">Hesap Oluşturun</a>
            </div>
        </div>

    </div>
</div>


<div style="background: #000000; color: #f6ad55; padding: 15px; margin: 20px 10%; border-radius: 6px; font-family: monospace; border-left: 5px solid #8d2941;">
    <strong>Arka Planda Çalıştırılan SQL Komutu:</strong>
    <p style="margin: 5px 0 0 0; color: #fff; font-size: 16px;"><?php echo $sql_sorgusu; ?></p>
</div>


    <section class="products">
        <h1>Bebek Hırkaları</h1>
<div class="product-grid">
    <?php
    if ($urun_listesi->num_rows > 0) {
        while($urun = $urun_listesi->fetch_assoc()) {
            // urun_id 11 ise -> 11 - 10 = 1 (b1.jpg)
            // urun_id 20 ise -> 20 - 10 = 10 (b10.jpg)
            $sira_numarasi = $urun['urun_id'] - 10;
            $resim_yolu = "bebek/b" . $sira_numarasi . ".jpg";
            ?>
            <div class="product" data-name="<?php echo htmlspecialchars($urun['urun_ad']); ?>" data-price="<?php echo $urun['urun_fiyat']; ?>">
                <img src="<?php echo $resim_yolu; ?>" alt="<?php echo htmlspecialchars($urun['urun_ad']); ?>" class="product-img">
                <h3><?php echo htmlspecialchars($urun['urun_ad']); ?></h3>
                <p>₺<?php echo number_format($urun['urun_fiyat'], 0, ',', '.'); ?></p>
                <button class="add-to-cart">Sepete Ekle</button>
            </div>
            <?php
        }
    } else {
        echo "<p style='grid-column: 1/-1; text-align: center;'>Bu kategoride henüz ürün bulunmamaktadır.</p>";
    }
    ?>
</div>
</section>

 
    <div id="lightbox" class="lightbox">
        <span class="close">&times;</span>
        <img class="lightbox-img" src="" alt="">
    </div>


    <footer style="background-color: black; color: aliceblue;">
        <hr>
        <pre>
            Author:Zeynep
            © 2025 Manolya Hobievi
            <a href="mailto:zeynepbetul234@gmail.com" style="color: aliceblue;">zeynepbetul234@gmail.com</a>
        </pre>
    </footer>

    
    <script src="urunler.js"></script>
    
</body>
</html>