/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require("./bootstrap")

var registerForm = document.getElementById("register-form")

if (registerForm) {
    // Create a Stripe client
    var stripe = Stripe("pk_test_F1SWZFakdurPk6JrWvuTXwgb")

    // Create an instance of Elements
    var elements = stripe.elements()

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: "#32325d",
            lineHeight: "24px",
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#aab7c4",
            },
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a",
        },
    }

    // Create an instance of the card Element
    var card = elements.create("card", { style: style })

    // Add an instance of the card Element into the `card-element` <div>
    card.mount("#card-element")

    // Handle real-time validation errors from the card Element.
    card.addEventListener("change", function(event) {
        var displayError = document.getElementById("card-errors")
        if (event.error) {
            displayError.textContent = event.error.message
        } else {
            displayError.textContent = ""
        }
    })

    // Handle form submission
    const button = document.querySelector("[name=register]")
    button.addEventListener("click", function(event) {
        console.log("submitting form")

        event.preventDefault()

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById("card-errors")
                errorElement.textContent = result.error.message
            } else {
                // Send the token to your server
                // stripeTokenHandler(result.token)

                console.log("submitted form", result.token)

                const token = document.querySelector("[name='stripe_token']")
                token.value = result.token.id

                registerForm.submit()
            }
        })
    })
}
