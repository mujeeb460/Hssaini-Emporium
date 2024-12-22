<div>
    <form wire:submit.prevent="addToCart">
        <div class="product__details__quantity">
            <div class="quantity">
                <div class="pro-qty">
                    <input type="number" wire:model="qty" min="1" max="{{ $productStock }}" value="1">
                </div>
            </div>
        </div>
        <button class="btn primary-btn">ADD TO CART</button>
                            {{-- <a href="#" class="primary-btn">ADD TO CARD</a> --}}
                            {{-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> --}}
        @if (session()->has('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>

<script>
    // Listen for the Livewire event to refresh the cart
    Livewire.on('cartUpdated', () => {
        alert('ok');
        // Perform any additional logic if needed
        location.reload(); // Reloads the page to reflect cart changes
    });
</script>