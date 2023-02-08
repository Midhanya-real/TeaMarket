<div class="bg-white text-center backdrop-blur-2xl">
    <h1 class="inline text-2xl font-semibold leading-none">Name: {{$product->name}}</h1>
    <h2 class="inline text-2xl font-semibold leading-none">Type: {{$product->type->name}}</h2>
    <h2 class="inline text-2xl font-semibold leading-none">Weight: {{$product->weight}}</h2>
    <h2 class="inline text-2xl font-semibold leading-none">Price: {{$product->price}}</h2>
    <h2 class="inline text-2xl font-semibold leading-none">Brand: {{$product->brand->name}}</h2>
    <h2 class="inline text-2xl font-semibold leading-none">Country: {{$product->country->name}}</h2>
</div>
