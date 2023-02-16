<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('addresses.store') }}" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="country" :value="__('country')"/>
                        <x-text-input id="country" name="country" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="city" :value="__('city')"/>
                        <x-text-input id="city" name="city" type="text" class="mt-1 block" autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="street" :value="__('street')"/>
                        <x-text-input id="street" name="street" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="house" :value="__('house')"/>
                        <x-text-input id="house" name="house" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="apartment" :value="__('apartment')"/>
                        <x-text-input id="apartment" name="apartment" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    <div>
                        <x-input-label for="postcode" :value="__('postcode')"/>
                        <x-text-input id="postcode" name="postcode" type="text" class="mt-1 block"
                                      autocomplete="new-password"/>
                    </div>

                    @if(Auth::user()->isAdmin() || Auth::user()->isModer())
                        <div>
                            <x-input-label for="user_id" :value="__('user')"/>
                            <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block"
                                          autocomplete="new-password"/>
                        </div>
                    @else
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    @endif

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
