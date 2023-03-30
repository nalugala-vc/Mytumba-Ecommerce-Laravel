let addItems = document.getElementById('quantity-controll')
let removeItems = document.getElementById('quantity-control')
let quantity = document.getElementById('quantity')
let price = document.getElementById('price')
let total = document.getElementById('total')
let subtotal = document.getElementById('order-subtotal')
let ordertotal = document.getElementById('order-total')

addItems.addEventListener('click',function(){
    
})

<script>
    const cartItems = @json($cartItems);
    console.log(cartItems)

    cartItems.forEach(item => {
        const removeItems = document.getElementById(`quantity-control-${item.id}`);
        const addItems = document.getElementById(`quantity-controll-${item.id}`);
        const quantity = document.getElementById(`quantity-${item.id}`);
        const price = item.product.price;
        const total = document.getElementById(`total-${item.id}`);
        console.log(quantity.innerText)

        addItems.addEventListener('click', function(event) {
            console.log(event.target); 
            quantity.innerHTML = parseInt(quantity.innerHTML) + 1;
                console.log('inner',quantity.innerText)
        });

        
        removeItems.addEventListener('click', (event) => {
            console.log('quant')
            if (event.target.classList.contains('fa-plus')) {
                // increment quantity
                console.log(quantity.innerText);
                quantity.innerText = parseInt(quantity.innerText) + 1;
                console.log(quantity.innerText);
            } else if (event.target.classList.contains('fa-minus')) {
                // decrement quantity
                if (parseInt(quantity.innerText) > 1) {
                    quantity.innerText = parseInt(quantity.innerText) - 1;
                }
            }
            // update total price
            const itemTotal = price * parseInt(quantity.innerText);
            total.innerText = `KSH. ${itemTotal}`;
        });
    });
</script>