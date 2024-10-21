var stripe = Stripe('pk_test_51Q2tKfED8VewSJCObuc0jYzkv40MQSkdiPhxK1gG3elxGKJpe4ywdq0uPVtXejJyluY7NOp7sA7HoOVOIGyJttuy00e15h4ILI');

var elements = stripe.elements({
  fonts: [
    {
      cssSrc: 'https://fonts.googleapis.com/css?family=Roboto',
    },
  ],
 
  locale: window.__exampleLocale
});

var card = elements.create('card', {
  iconStyle: 'solid',
  style: {
    base: {
      iconColor: '#000',
      color: '#000',
      fontWeight: 500,
      fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
      fontSize: '16px',
      fontSmoothing: 'antialiased',

      ':-webkit-autofill': {
        color: '#000',
      },
      '::placeholder': {
        color: '#000',
      },
    },
    invalid: {
      iconColor: '#FFC7EE',
      color: '#FFC7EE',
    },
  },
});

card.mount('#card-element');
// Apply padding to the container of the card element
document.getElementById('card-element').style.padding = '10px';
var submitButton = document.getElementById('submit_btn');
submitButton.addEventListener('click', function(ev) {
    ev.preventDefault();
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            showError(result.error.message);
        } else {
            // Call your function to handle form submission with token id
            handleFormSubmission(result.token.id);
        }
    });
});

function showError(errorMsg) {
    var errorDiv = document.getElementById('payment-response');
    errorDiv.textContent = errorMsg;
}

function handleFormSubmission(tokenId) {
    // Serialize form data
    var formData = $("#membership_form").serialize();
    // Append token id to form data
    formData += '&stripeToken=' + tokenId;
    // Show loader
    $('#loader').show();
    // Submit form using AJAX
    $.ajax({
        url: 'submit_membership_form.php',
        type: 'POST',
        data: formData,
        success: function(response) {
            // Hide loader
            $('#loader').hide();
            if(response.success){
            // Display response message
            $(".response_message").html(response);
            }else{       
            // Handle errors
            $(".response_message").html(response);
            }
        }
    });
}