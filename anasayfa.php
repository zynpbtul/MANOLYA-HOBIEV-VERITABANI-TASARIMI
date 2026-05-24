<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manolya Hobi Evi - Anasayfa</title>


   <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="anasayfa.css">
    <link rel="stylesheet" href="urunler.js">

   
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
                <p id="cart-text">Sepetiniz boş</p>
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


    <section class="hero" id="hero">

        <div class="hero-text">
            <h1>Manolya Hobievi’ne Hoş Geldiniz</h1>
            <p class="sub"><i>%100 El Emeği, %100 Zarafet</i></p>
            <a href="amigurumi.html" class="hero-btn">Hemen Tıklayın</a>
            <p class="alt-yazi"><i>En kaliteli malzemeler, en güzel tasarımlar...</i></p>
        </div>

        <div class="hero-right">
            <button id="degistir"> > </button>
        </div>

    </section>

    <section class="products">
        <h2>Kategoriler</h2>
        <div class="product-grid">
            <div class="product">
                <img src="urun1.jpg" alt="Çantalar">
                <p>Çantalar</p>
            </div>
            <div class="product">
                <img src="urun2.jpg" alt="Amigurumiler">
                <p>Amigurumiler</p>
            </div>
            <div class="product">
                <img src="urun3.jpg" alt="Atkılar">
                <p>Atkılar</p>
            </div>
            <div class="product">
                <img src="urun4.jpg" alt="Bebek Hırkaları">
                <p>Bebek Hırkaları</p>
            </div>
        </div>
    </section>



    <footer style="background-color: black; color: aliceblue;">
        <hr>
        <pre>
            Author:Zeynep
            © 2025 Manolya Hobievi
            <a href="mailto:zeynepbetul234@gmail.com" style="color: aliceblue;">zeynepbetul234@gmail.com</a>
        </pre>
    </footer>


    <script src="anasayfa.js"></script>
    <script src="iletisim.js"></script>
     <script src="urunler.js"></script>


</body>
</html>
