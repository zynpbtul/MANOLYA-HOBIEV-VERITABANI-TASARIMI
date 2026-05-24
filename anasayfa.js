document.addEventListener("DOMContentLoaded", function () { //sayfa tamamen yüklenince js kodunu çalıştırır

    const resimler = [
        "gorsel1.jpg",
        "gorsel2.jpg",
        "gorsel3.jpg"
    ];

    let index = 0;

    const hero = document.getElementById("hero");
    const btn = document.getElementById("degistir");

    function arkaPlanDegistir() {
        index = (index + 1) % resimler.length;
        hero.style.backgroundImage = `url('${resimler[index]}')`;
    }

    btn.addEventListener("click", arkaPlanDegistir);

    setInterval(arkaPlanDegistir, 4000);
    
});
