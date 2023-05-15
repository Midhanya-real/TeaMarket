<section>
    <div class="block bg-blue-200 absolute left-0 top-2 space-y-4">
        <div class="block py-2 space-y-4 dark:bg-gray-800 shadow-sm sm:rounded-lg mx-auto left-0 top-3">
            <form method="GET" action="{{route('products.index')}}">
                @csrf
                <div class="bg-white rounded-lg w-auto h-auto ml-2 mr-2 mb-2"> <!-- категория товара -->
                    <span class="text-gray-700  justify-center ml-3">Categories</span>
                    <div class="mt-2">
                        <div class="flex flex-col ml-3 mb-4">
                            @foreach($filters['categories'] as $category)
                                <label name="Country">
                                    <input type="checkbox" name="categories[]" class="form-checkbox"
                                           value="{{$category->id}}">

                                    <span class="ml-2">{{$category->name}}</span> <!-- значение из базы -->
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="block py-2"></div>

                <div class="bg-white rounded-lg ml-2 mr-2 mb-2"> <!-- тип товара -->
                    <span class="text-gray-700  justify-center ml-3">Types</span>
                    <div class="mt-2">
                        <div class="flex flex-col ml-3 mb-4">
                            @foreach($filters['types'] as $type)
                                <label name="type">
                                    <input type="checkbox" name="types[]" class="form-checkbox" value="{{$type->id}}">

                                    <span class="ml-2">{{$type->name}}</span> <!-- значение из базы -->
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="block py-2"></div>

                <div class="block bg-white rounded-lg ml-2 mr-2 mb-2"> <!-- вес товара -->
                    <span class="text-gray-700 ml-3">Weights</span>
                    <div class="mt-2">
                        <div class="flex flex-col ml-3 mb-4">
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

                <div class="block py-2"></div>

                <div class="block bg-white rounded-lg space-y-5 ml-2 mr-2 mb-2"> <!-- цена -->
                    <span class="text-gray-700 ml-3">Price</span>
                    <div class="rounded-lg flex flex-col w-3/4">
                        <div class="min-price price-field-wrapper rounded-lg ml-2 mr-2">
                            <input type="text" name="prices[]" value="{{$filters['prices']['min']}}"
                                   data-curr-slider-val="{{$filters['prices']['min']}}"
                                   maxlength="6" class="js-min-price price-field price-field-min" autocomplete="off"
                                   autocorrect="off" autocapitalize="off" aria-describedby="group-price-min"
                                   id="group-price-min">
                        </div>
                        <div class="max-price price-field-wrapper rounded-lg ml-2 mr-2 mb-4">
                            <input type="tel" name="prices[]" value="{{$filters['prices']['max']}}"
                                   data-curr-slider-val="{{$filters['prices']['max']}}"
                                   maxlength="6" class="js-max-price price-field price-field-max" autocomplete="off"
                                   autocorrect="off" autocapitalize="off" aria-describedby="group-price-max"
                                   id="group-price-max">
                        </div>
                    </div>
                </div>

                <div class="block py-2"></div>

                <div class="block bg-white rounded-lg ml-2 mr-2 mb-2"> <!-- бренд -->
                    <span class="text-gray-700 ml-3">Brands</span>
                    <div class="mt-2">
                        <div class="flex flex-col ml-3 mb-4">
                            @foreach($filters['brands'] as $brand)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="brands[]" class="form-checkbox" value="{{$brand->id}}">
                                    <span class="ml-2">{{$brand->name}}</span> <!-- значение из базы -->
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="block py-2"></div>

                <div class="block bg-white rounded-lg ml-2 mr-2 mb-2"> <!-- страна -->
                    <span class="text-white-700 ml-3">Countries</span>
                    <div class="mt-2">
                        <div class="flex flex-col ml-3 mb-4">
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
                        class="inline-block px-6 py-2.5 bg-white text-black font-black text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-2 mr-2 mb-2">
                    {{__('Search')}}
                </button>
            </form>
        </div>
    </div>
</section>
