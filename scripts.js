document.querySelector(".checkout-form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    let quantity = document.getElementById("quantity").value;
    let name = document.getElementById("name").value;
    let address = document.getElementById("address").value;
    let phone = document.getElementById("phone").value;
    let district = document.getElementById("district").value;

    if (!name || !address || !phone || !district) {
        alert("Please fill all fields.");
    } else {
        window.location.href = "https://wa.me/94775211827?text=I'm%20interested%20in%20buying%20the%20product%20with%20details:%20Color%20-%20" + 
            document.getElementById("product-color").value + "&Quantity=" + quantity + "&Name=" + name + "&Address=" + address + "&Phone=" + phone + "&District=" + district;
    }
});
function changeColor(color) {
    let productImage = document.getElementById('product-image');
    
    // Change the product image based on the selected color
    if (color === 'black') {
        productImage.src = 'black-product.jpg'; // Replace with the actual image URL for the black color
    } else if (color === 'gold') {
        productImage.src = 'gold-product.jpg'; // Replace with the actual image URL for the gold color
    } else if (color === 'silver') {
        productImage.src = 'silver-product.jpg'; // Replace with the actual image URL for the silver color
    }
}
function changeColor(color, price, image) {
    // Update the product image
    document.getElementById('product-image').src = image;
    
    // Update the price based on the color
    document.getElementById('product-price').textContent = price.toFixed(2);
    
    // Update hidden input fields with color, price, and image for submission
    document.getElementById('selected-color').value = color;
    document.getElementById('selected-price').value = price.toFixed(2);
    document.getElementById('selected-image').value = image;
}

