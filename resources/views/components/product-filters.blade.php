<section>
    <div class="block bg-blue-100 absolute left-0 top-2 space-y-4">
        <div class="block py-2 space-y-4">
            <form method="GET" action="{{route('products.index')}}">
                @csrf
                <div class="bg-white rounded-lg"> <!-- категория товара -->
                    <span class="text-gray-700  justify-center">Categories</span>
                    <div class="mt-2">
                        <div class="flex flex-col">
                            @foreach($filters['categories'] as $category)
                                <label name="Country">
                                    <input type="checkbox" name="categories[]" class="form-checkbox" value="{{$category->id}}">

                                    <span class="ml-2">{{$category->name}}</span> <!-- значение из базы -->
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="block py-2"> </div>

                <div class="bg-white rounded-lg"> <!-- тип товара -->
                    <span class="text-gray-700  justify-center">Types</span>
                    <div class="mt-2">
                        <div class="flex flex-col">
                            @foreach($filters['types'] as $type)
                                <label name="type">
                                    <input type="checkbox" name="types[]" class="form-checkbox" value="{{$type->id}}">

                                    <span class="ml-2">{{$type->name}}</span> <!-- значение из базы -->
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="block py-2"> </div>

                <div class="block bg-white rounded-lg"> <!-- вес товара -->
                    <span class="text-gray-700">Weights</span>
                    <div class="mt-2">
                        <div class="flex flex-col">
                            @foreach($filters['weights'] as $weight)
                                <label class="items-center">
                                    <input type="checkbox" name="weights[]" class="form-checkbox"
                                           value="{{$weight->weight}}">
                                    <span class="ml-2">{{$weight->weight}}</span> <!-- значение из базы -->
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="block py-2"> </div>

                <div class="block bg-white rounded-lg space-y-5"> <!-- цена -->
                    <span class="text-gray-700">Price</span>
                    <div class="rounded-lg flex flex-col">
                        <div class="min-price price-field-wrapper rounded-lg">
                            <input type="text" name="prices[]" value="{{$filters['prices']['min']}}"
                                   data-curr-slider-val="{{$filters['prices']['min']}}"
                                   maxlength="6" class="js-min-price price-field price-field-min" autocomplete="off"
                                   autocorrect="off" autocapitalize="off" aria-describedby="group-price-min"
                                   id="group-price-min">
                        </div>
                        <div class="max-price price-field-wrapper rounded-lg">
                            <input type="tel" name="prices[]" value="{{$filters['prices']['max']}}"
                                   data-curr-slider-val="{{$filters['prices']['max']}}"
                                   maxlength="6" class="js-max-price price-field price-field-max" autocomplete="off"
                                   autocorrect="off" autocapitalize="off" aria-describedby="group-price-max"
                                   id="group-price-max">
                        </div>
                    </div>
                </div>

                <div class="block py-2"> </div>

                <div class="block bg-white rounded-lg"> <!-- бренд -->
                    <span class="text-gray-700">Brands</span>
                    <div class="mt-2">
                        <div class="flex flex-col">
                            @foreach($filters['brands'] as $brand)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="brands[]" class="form-checkbox" value="{{$brand->id}}">
                                    <span class="ml-2">{{$brand->name}}</span> <!-- значение из базы -->
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="block py-2"> </div>

                <div class="block bg-white rounded-lg"> <!-- страна -->
                    <span class="text-white-700">Countries</span>
                    <div class="mt-2">
                        <div class="flex flex-col">
                            @foreach($filters['countries'] as $country)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="countries[]" class="form-checkbox"
                                           value="{{$country->id}}">
                                    <span class="ml-2">{{$country->name}}</span> <!-- значение из базы -->
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- кнопка -->
                <button type="submit"
                        class="inline-block px-6 py-2.5 bg-white text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    {{__('Search')}}
                </button>
            </form>
        </div>
    </div>
</section>
