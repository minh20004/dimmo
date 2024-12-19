// slide sản phẩm
document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.swiper', {
        slidesPerView: 4,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            767: {
                slidesPerView: 3,
            },
            1000: {
                slidesPerView: 4,
            }
        }
    });
});

// slide tin tức
document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.tin-tuc-swiper', {
        slidesPerView: 4,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 1,
            },
            767: {
                slidesPerView: 3,
            },
            1000: {
                slidesPerView: 4,
            }
        }
    });
});




// cart mobi
document.addEventListener("DOMContentLoaded", function () {
// Xử lý nút tăng số lượng
document.querySelectorAll("[data-increment]").forEach((btn) => {
    btn.addEventListener("click", function () {
    const input = this.parentNode.querySelector("input");
    input.value = parseInt(input.value) + 1;
    });
});

// Xử lý nút giảm số lượng
document.querySelectorAll("[data-decrement]").forEach((btn) => {
    btn.addEventListener("click", function () {
    const input = this.parentNode.querySelector("input");
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
    }
    });
});
});




  
  