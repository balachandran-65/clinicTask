<div>
    <button wire:click="create" class="btn btn-primary">send message</button>


    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
</div>
