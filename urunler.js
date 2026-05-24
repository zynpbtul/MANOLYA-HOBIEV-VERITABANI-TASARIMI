document.addEventListener("DOMContentLoaded", () => {

    const lb = document.getElementById("lightbox");
    const lbImg = document.querySelector(".lightbox-img");

    if (lb) {
        document.querySelectorAll(".product-img").forEach(img => {
            img.onclick = () => {
                lb.style.display = "flex";
                lbImg.src = img.src;
                lbImg.alt = img.alt;
            };
        });

        lb.onclick = e => {
            if (e.target === lb || e.target.classList.contains("close")) {
                lb.style.display = "none";
            }
        };
    }

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    const count = document.getElementById("cart-count");
    const items = document.getElementById("cart-items");
    const total = document.getElementById("cart-total");

    const render = () => {
        let sum = 0;

        items.innerHTML = cart.map(p => {
            sum += p.price;
            return `<li>${p.name} - ₺${p.price}</li>`;
        }).join("");

        count.textContent = cart.length;
        total.textContent = "Toplam: ₺" + sum;
    };

    render();

    document.querySelectorAll(".add-to-cart").forEach(btn => {
        btn.onclick = () => {
            const p = btn.closest(".product").dataset;

            cart.push({
                name: p.name,
                price: +p.price
            });

            localStorage.setItem("cart", JSON.stringify(cart));
            render();
        };
    });

    document.getElementById("clear-cart")?.addEventListener("click", () => {
        localStorage.removeItem("cart");
        location.reload();
    });

});
