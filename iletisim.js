document.getElementById("contact-form").addEventListener("submit", function(e) {
    e.preventDefault(); //sayfa yenilenmesini engeller
    document.getElementById("confirmation").style.display = "block"; //kullanıcıya mesajı gösteriyoruz
    document.getElementById("message").value = ""; //kutuyu temizler
});
