<section>
    <form>
        <div class="bg-white text-center backdrop-blur-2xl">
            <h1 class="inline text-2xl font-semibold leading-none">Name: {{$product->name}}</h1>
            <h2 class="inline text-2xl font-semibold leading-none">Type: {{$product->type->name}}</h2>
            <h2 class="inline text-2xl font-semibold leading-none">Weight: {{$product->weight}}</h2>
            <h2 class="inline text-2xl font-semibold leading-none">Price: {{$product->price}}</h2>
            <h2 class="inline text-2xl font-semibold leading-none">Brand: {{$product->brand->name}}</h2>
            <h2 class="inline text-2xl font-semibold leading-none">Country: {{$product->country->name}}</h2>
        </div>
        <button type="submit"
                class="inline-block px-6 py-2.5 bg-white text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
            {{__('Buy')}}
        </button>
    </form>
</section>

