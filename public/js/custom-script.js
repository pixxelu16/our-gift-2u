
document.addEventListener("DOMContentLoaded", () => {
    const accordions = document.querySelectorAll(".accordion");

    accordions.forEach((accordion, index) => {
        const header = accordion.querySelector(".accordion__header");
        const content = accordion.querySelector(".accordion__content");
        const icon = accordion.querySelector("#accordion-icon");

        header.addEventListener("click", () => {
            const isOpen = content.style.height === `${content.scrollHeight}px`;

            accordions.forEach((a, i) => {
                const c = a.querySelector(".accordion__content");
                const ic = a.querySelector("#accordion-icon");

                if (i === index && !isOpen) {
                    c.style.height = `${c.scrollHeight}px`;
                    ic.classList.remove("ri-add-line");
                    ic.classList.add("ri-subtract-fill");
                } else {
                    c.style.height = "0px";
                    ic.classList.remove("ri-subtract-fill");
                    ic.classList.add("ri-add-line");
                }
            });
        });
    });
});

//script for review star rating
document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('.rate input');

    // Initialize checked state based on default values
    let lastCheckedIndex = -1;
    checkboxes.forEach((checkbox, index) => {
        if (checkbox.checked) lastCheckedIndex = index;
    });

    checkboxes.forEach((checkbox, index) => {
        if (index <= lastCheckedIndex) checkbox.checked = true;
    });

    // Handle checkbox change event
    checkboxes.forEach((checkbox, index) => {
        checkbox.addEventListener('change', () => {
            checkboxes.forEach((cb, i) => {
                cb.checked = i <= index;
            });
        });
    });
});

jQuery(document).ready(function($) {
      $('.slider-logo').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        responsive: [{
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
           breakpoint: 400,
           settings: {
              arrows: false,
              slidesToShow: 2,
              slidesToScroll: 1
           }
        }]
    });
});


jQuery(document).ready(function($) {
    $('.slider-cetageory').slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: true,
      responsive: [{
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
         breakpoint: 400,
         settings: {
            arrows: false,
            slidesToShow: 2,
            slidesToScroll: 1
         }
      }]
  });
});



jQuery(document).ready(function($) {
    $('.shop-page-slider').slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 5, // Default for large screens
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 6000,
      arrows: true,
      responsive: [{
          breakpoint: 1024, // Tablets and smaller screens
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true
          }
        },
        {
          breakpoint: 768, // For smaller tablets
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true
          }
        },
        {
          breakpoint: 600, // Mobile phones
          settings: {
            slidesToShow: 2, // Show 2 slides on mobile
            slidesToScroll: 1,
            arrows: true
          }
        },
        {
          breakpoint: 400, // Very small devices
          settings: {
            slidesToShow: 1, // Still show 2 slides
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });
  });



  jQuery(document).ready(function($) {
    $('.all-logo-slider').slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 7, // Default for large screens
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 6000,
      arrows: true,
      responsive: [{
          breakpoint: 1024, // Tablets and smaller screens
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true
          }
        },
        {
          breakpoint: 768, // For smaller tablets
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true
          }
        },
        {
          breakpoint: 600, // Mobile phones
          settings: {
            slidesToShow: 2, // Show 2 slides on mobile
            slidesToScroll: 1,
            arrows: true
          }
        },
        {
          breakpoint: 400, // Very small devices
          settings: {
            slidesToShow: 1, // Still show 2 slides
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });
  });
