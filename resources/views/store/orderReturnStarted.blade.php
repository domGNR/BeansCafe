<x-layouts.app>
    <div class="container my-5 py-5">
        <div class="col-12">
            <h3>Reso avviato con successo, sarai reindirizzato alla home page</h3>
        </div>
    </div>
    <script>
        localStorage.setItem('cart', JSON.stringify([]));
        localStorage.setItem('checkout', JSON.stringify([]));
        setTimeout(() => {
            window.location.href = "/";
        }, 3000);
    </script>
    </x-layouts.app>