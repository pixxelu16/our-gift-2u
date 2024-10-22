
$(document).ready(function(){
  $('.slick-slider').slick({
    slidesToShow: 4,  
    slidesToScroll: 1, 
    autoplay: true,     
    autoplaySpeed: 2000, 
    dots: false,         
    arrows: true, 
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});


// Select all accordion buttons
const customAccordionButtons = document.querySelectorAll('.custom-accordion-button');

customAccordionButtons.forEach(button => {
  button.addEventListener('click', () => {
    const item = button.parentElement.parentElement;  // Get the parent item
    const accordionBody = item.querySelector('.custom-accordion-body');

    // Check if the item is currently active
    const isActive = item.classList.contains('active');

    // Close all accordion items
    document.querySelectorAll('.custom-accordion-item').forEach(i => {
      i.classList.remove('active');
      i.querySelector('.custom-accordion-body').style.display = 'none';
    });

    // Open the clicked item if it's not already active
    if (!isActive) {
      item.classList.add('active');
      accordionBody.style.display = 'block';
    }
  });
});




// Tabs Careers Oppoortunities Start

function openTab(tabName) {
  const tabContents = document.querySelectorAll('.tab-content');
  tabContents.forEach(tabContent => {
    tabContent.style.display = 'none';
  });

  const tabButtons = document.querySelectorAll('.tab-button');
  tabButtons.forEach(button => {
    button.classList.remove('active');
  });

  document.getElementById(tabName).style.display = 'block';

  event.target.classList.add('active');
}

document.addEventListener('DOMContentLoaded', () => {
  document.getElementById('all').style.display = 'block';
});

// Tabs Careers Oppoortunities End


$(window).scroll(function() {
if ($(this).scrollTop() > 1){  
    $('.header-tow').addClass("sticky");
  }
  else{
    $('.header-tow').removeClass("sticky");
  }
});

jQuery(document).ready(function($) {
      $('.slider-logo').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 8,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,
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
          arrows: true
        }
      }
    ]
  });
});




(function () {
  const quantityContainer = document.querySelector(".quantity");
  const minusBtn = quantityContainer.querySelector(".minus");
  const plusBtn = quantityContainer.querySelector(".plus");
  const inputBox = quantityContainer.querySelector(".input-box");

  updateButtonStates();

  quantityContainer.addEventListener("click", handleButtonClick);
  inputBox.addEventListener("input", handleQuantityChange);

  function updateButtonStates() {
    const value = parseInt(inputBox.value);
    minusBtn.disabled = value <= 1;
    plusBtn.disabled = value >= parseInt(inputBox.max);
  }

  function handleButtonClick(event) {
    if (event.target.classList.contains("minus")) {
      decreaseValue();
    } else if (event.target.classList.contains("plus")) {
      increaseValue();
    }
  }

  function decreaseValue() {
    let value = parseInt(inputBox.value);
    value = isNaN(value) ? 1 : Math.max(value - 1, 1);
    inputBox.value = value;
    updateButtonStates();
    handleQuantityChange();
  }

  function increaseValue() {
    let value = parseInt(inputBox.value);
    value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
    inputBox.value = value;
    updateButtonStates();
    handleQuantityChange();
  }

  function handleQuantityChange() {
    let value = parseInt(inputBox.value);
    value = isNaN(value) ? 1 : value;

    // Execute your code here based on the updated quantity value
    console.log("Quantity changed:", value);
  }
})();