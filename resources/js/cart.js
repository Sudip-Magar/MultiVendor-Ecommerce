document.addEventListener('alpine:init', () => {
    Alpine.data('cart', () => ({
        popup: false,

        show() {
            this.popup = true;
       },
    }))
})