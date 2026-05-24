<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim - Manolya Hobi Evi</title>

    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="anasayfa.css">
    <link rel="stylesheet" href="iletisim.css">
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
            <div class="cart-dropdown">
                <p>Sepetiniz boş</p>
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




    <section id="contact-hero" class="contact-hero">
    <div class="contact-text">
        <h1>İletişim</h1>
        <p>Email: <a href="mailto:zeynepbetul234@gmail.com">zeynepbetul234@gmail.com</a></p>
        <p>Telefon: 0 536 661 69 39</p>
        <p>İnstagram: @manolya_hobievi</p>

        <h2>Fikir ve önerilerinize açığız</h2>

        <form id="contact-form">
            <textarea id="message" rows="5" placeholder="Mesajınızı buraya yazın..."></textarea>
            <button type="submit">Gönder</button>
            <p id="confirmation">Mesaj gönderildi!</p>
        </form>
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
    <script src="iletisim.js"></script>


</body>
</html>

