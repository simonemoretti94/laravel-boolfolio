<div class="bg-dark bg-gradient py-1">
    <div class="container">
        <h1 {{$attributes->merge([
            'class' => 'text-white',
            ])}}>{{ $slot }}</h1>
    </div>
</div>