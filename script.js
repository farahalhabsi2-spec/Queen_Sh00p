// فتح وإغلاق القائمة
const sidebar = document.getElementById("sidebar");
document.getElementById("menu-btn").onclick = () => sidebar.classList.add("active");
document.getElementById("closeSidebar").onclick = () => sidebar.classList.remove("active");

// السلة (بسيطة للتجربة)
let cart = [];
document.querySelectorAll(".add-to-cart").forEach(btn => {
  btn.addEventListener("click", () => {
    let item = btn.parentElement.querySelector("p").innerText;
    cart.push(item);
    alert("✅ تمت إضافة: " + item);
  });
});
