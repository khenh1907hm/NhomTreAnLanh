// Nút hay về đầu trang ---------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    var scrollTopButton = document.getElementById('scrollTopButton');

    // Hiển thị hoặc ẩn nút quay lại đầu trang
    window.onscroll = function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollTopButton.style.display = "block";
        } else {
            scrollTopButton.style.display = "none";
        }
    };

    // Xử lý sự kiện khi nút được nhấn
    scrollTopButton.addEventListener('click', function () {
        document.body.scrollTop = 0; // cho Safari
        document.documentElement.scrollTop = 0; // cho Chrome, Firefox, IE, và Opera
    });
});
// -------------------------------------------------------
