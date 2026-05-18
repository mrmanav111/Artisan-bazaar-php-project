let cartCount =0;   


function updateCartCount() {
    document.getElementById('cart-count').textContent=`(${cartCount})`;

}   

document.querySelectorAll('.add-to-cart').forEach(button=>{
    button.addEventListener('click', event=>{
        cartCount++; 
        updateCartCount();
        const productName = event.target.getAttribute('data-product');
        alert(`${productName} added to cart!`);
    });
});

function toggleMenu(){
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active'); 
}

