<div class="space-y-8">

    @foreach($categories as $category)
        <div class="block p-6 rounded-lg shadow-lg bg-white sm:max-w-sm ml-3 mt-3">
            <a class="text-gray-900 text-xl leading-tight font-medium mb-2">
                {{__('Category: ')}}
                {{$category->name}}
            </a>

            <a class="block">

            </a>

            <div class="inline-flex mx-auto">
                <form method="GET" action="{{route('admin.categories.edit', $category)}}">
                    @csrf
                    @method('patch')

                    <div class="flex items-center gap-4 mt-3">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                    </div>
                </form>

                <div class="block p-2 rounded-lg max-w-xl"></div>

                <form method="POST" action="{{route('admin.categories.destroy', $category)}}">
                    @csrf
                    @method('delete')

                    <div class="flex items-center gap-4 mt-3">
                        <x-primary-button>{{ __('Delete') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="block p-6 rounded-lg max-w-xl"></div>
    @endforeach
</div>
