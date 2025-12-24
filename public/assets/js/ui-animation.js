document.addEventListener("DOMContentLoaded", function () {
    const loginBtn = document.getElementById("loginBtn");
    const app = document.getElementById("app");
    const header = document.querySelector(".header-area");

    if (loginBtn) {
        loginBtn.addEventListener("click", function (e) {
            e.preventDefault(); // tahan redirect dulu

            app.classList.add("slide-left");
            header.classList.add("slide-left");

            // pindah halaman setelah animasi selesai
            setTimeout(() => {
                window.location.href = loginBtn.getAttribute("href");
            }, 600); // harus sama dengan duration CSS
        });
    }
});
