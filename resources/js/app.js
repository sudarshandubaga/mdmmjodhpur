import "./bootstrap";

import Swiper from "swiper";
import { Autoplay, Navigation, Pagination } from "swiper/modules";

// Import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// Import Lightbox2 script
import "lightbox2/dist/js/lightbox.min.js";

document.addEventListener("DOMContentLoaded", () => {
    new Swiper(".swiper", {
        modules: [Navigation, Pagination, Autoplay],
        loop: true,
        autoplay: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // Initialize Swiper
    new Swiper(".photo-gallery-slider", {
        modules: [Pagination, Navigation, Autoplay],
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: true,
        slidesPerView: 3,
        slidesPerGroup: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    // Initialize Lightbox (using Lightbox2)
    // if (typeof lightbox !== "undefined") {
    //     lightbox.option({
    //         resizeDuration: 200,
    //         wrapAround: true,
    //     });
    // }
});
