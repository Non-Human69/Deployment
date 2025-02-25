document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.getElementById("menuBtn");
    const sidebar = document.getElementById("sidebar");

    menuBtn.addEventListener("click", function () {
    if (sidebar.style.transform === "translateX(0px)") {
    sidebar.style.transform = "translateX(-100%)";
    }
    else {
        sidebar.style.transform = "translateX(0px)";
    }
    });
});
