<div class="">
    @include('component.user.carousel')
    @livewire('user.category')
    @livewire('user.product', ['limit' => 10])
</div>
