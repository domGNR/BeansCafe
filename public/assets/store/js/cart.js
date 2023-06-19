if (!localStorage.getItem('cart')) {
    localStorage.setItem('cart', '[]');
}

createItem = (code, name, price, qty) => {
    return {
        code: code,
        name: name,
        price: price,
        qty: qty
    }
}

// Funzione per aggiungere un elemento al carrello
addToCart = (item) => {
    // Recupera il carrello dal local storage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const selectedItem = cart.find(el => el?.code === item.code)
    if (selectedItem) {
        selectedItem.qty = selectedItem.qty + item.qty
    } else cart.push(item);

    // Salva il carrello aggiornato nel local storage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Aggiorna il numero degli articoli nel carrello
    updateCartCount(cartCount())
    window.dispatchEvent( new Event('storage') );
    showAlert('Prodotto aggiunto al carrello');
}

// Funzione per rimuovere un elemento dal carrello
removeFromCart = (item) => {
    const removeItem = (cart,item) => {
        // Rimuove l'elemento dal carrello
        const index = cart.findIndex(item => item.code === item.code);
        if (index !== -1) {
            // Rimuovi l'oggetto dall'array
            cart.splice(index, 1);
        }
        return cart
    }


    // Recupera il carrello dal local storage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];


    if (item.qty) {
        const selectedItem = cart.find(el => el?.code === item.code)
        if (selectedItem) {
            selectedItem.qty = selectedItem.qty - item.qty
            if (selectedItem.qty === 0) cart = removeItem(cart,item)
        }
    }
    else cart = removeItem(cart,item)


    // Salva il carrello aggiornato nel local storage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Aggiorna il numero degli articoli nel carrello
    updateCartCount(cartCount())
    window.dispatchEvent( new Event('storage') );
    showAlert('Prodotto rimosso al carrello');
}

cartCount = () => {
    // Recupera il carrello dal local storage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length < 1) return 0
    return cart.map(el => el.qty).reduce((t, n) => t + n)
}

updateCartCount = (count) => {
    const cart = document.querySelector("#cartCount")
    cart.innerText = count
}

updateCartCount(cartCount())

updateCartRender = () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cartCount() < 1) {
        cartSection.classList.add("d-none")
        emptyCartSection.classList.remove("d-none")
    }
    if (cartCount() > 0) {
        const subtotalEl = document.querySelector("#subtotal")
        const deliveryEl = document.querySelector("#delivery")
        const totalEl = document.querySelector("#total")
        const subtotal = cart.map(el => el.qty*el.price).reduce((t, n) => t + n)
        const delivery = subtotal > 49.99 ? 'Spedizione gratuita' : 9.99
        const total = subtotal > 49.99 ? subtotal : subtotal + delivery
        subtotalEl.innerText = '€ ' + subtotal.toFixed(2)
        deliveryEl.innerText = subtotal > 49.99 ? 'Spedizione gratuita' : '€ ' + delivery.toFixed(2)
        totalEl.innerText = '€ ' + total.toFixed(2)
        cartSection.classList.remove("d-none")
        emptyCartSection.classList.add("d-none")
        const cartTableEl = document.querySelector("#cartTable")
        let htmlString = ''
        const cartRows = cart.map(row => {
            htmlString += (`<tr class="text-center" id="product-${row.code}">
        <td class="product-remove"><button class="bg-transparent" onClick="removeFromCart(createItem( ${row.code} , '${row.name}' , ${row.price} ))"><span class="icon-close"></span></button>
        </td>
        <td class="product-name">
            <h3>${row.name}</h3>
        </td>
        <td class="price">${row.price}</td>
        <td class="quantity">
        <div class="input-group mb-3">
        <button class="mx-3"
        style="background: transparent;border:0px !important;cursor:pointer" onClick="removeFromCart(createItem( ${row.code} , '${row.name}' , ${row.price}, 1 ))">-</button>
                <input type="text" name="quantity"
                    class="quantity form-control input-number" value="${row.qty}" min="1"
                    max="100" disabled>
                <button class="mx-3"
                style="background: transparent;border:0px !important;cursor:pointer" onClick="addToCart(createItem( ${row.code} , '${row.name}' , ${row.price}, 1 ))">+</button>
            </div>
            </td>
            <td class="total">€ ${(row.price * row.qty).toFixed(2)}</td>`);
        })
        cartTableEl.innerHTML = htmlString
    }
}

const cartSection = document.querySelector("#cartSection")
const emptyCartSection = document.querySelector("#emptyCartSection")

if (cartSection && emptyCartSection) {
    updateCartRender()
    window.addEventListener('storage', function (event) {
        updateCartRender();
        if (event.key === 'cart') {
        }
    });

}

const showAlert = (message) => {
    const el = document.querySelector("#alertBox")
    el.innerText = message
    el.classList.toggle("show")
    setTimeout(function() {
        el.classList.toggle("show")
      }, 1000);
  };
