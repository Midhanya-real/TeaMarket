<section>
    <div class="bloc px-1 mx-1 justify-center  space-x-2 space-y-2">
        @foreach($users as $user)
            <div class="justify-center inline-flex mt-3 mx-px">
                <div
                    class="block p-6 w-52 rounded-lg shadow-lg bg-white max-w-xl space-x-2 space-y-2 ml-12 mt-3 mx-10 mb-6">
                    <p class="text-gray-700 text-base mb-4">
                        {{__('Name:')}}
                        {{$user->name}}
                    </p>
                    <p class="text-gray-700 text-base mb-4">
                        {{__('Email:')}}
                        {{$user->email}}
                    </p>

                    <div class="inline-flex mx-auto">
                        <form method="GET" action="{{route('admin.users.edit', $user)}}">
                            @csrf
                            @method('patch')

                            <div class="flex items-center gap-4 mt-3">
                                <x-primary-button>{{ __('Update') }}</x-primary-button>
                            </div>
                        </form>

                        <div class="block p-2 rounded-lg max-w-xl"></div>

                        <form method="POST" action="{{route('admin.users.destroy', $user)}}">
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
</section>
