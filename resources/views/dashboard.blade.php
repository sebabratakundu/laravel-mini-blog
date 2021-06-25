<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-5">
                    {{ __('All Posts') }}
                </h2>
                    <hr class="mb-5">
                    <div class="flex flex-wrap justify-evenly">
                        @forelse(cache()->get('posts') as $post)
                            <div class="w-64 max-w-sm rounded overflow-hidden shadow-lg mb-10">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2"><a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a></div>
                                    <p class="text-gray-700 text-base">
                                    {{ $post->excerpt }}
                                    </p>
                                    <span class="inline-block py-1 text-sm font-semibold text-grey-500 mr-2 mb-2">Author : {{ $post->user->name }}</span>
                                </div>
                                @canany(['update','delete'],$post)
                                <div class="px-6 pt-4 pb-2">
                                    <a href="{{ route('posts.edit',$post) }}" class="bg-yellow-100 inline-block rounded-full px-3 py-1 text-sm font-semibold text-yellow-700 mr-2 mb-2">Edit</a>
                                    <form action="{{ route('posts.destroy',$post) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-100 inline-block rounded-full px-3 py-1 text-sm font-semibold text-red-700 mr-2 mb-2" onclick="return confirm('Are you sure ?');">Delete</button>
                                    </form>
                                </div>
                                @endcanany
                            </div>
                            @empty
                            <p class="bg-red-100 rounded-full px-5 py-2 font-semibold text-red-700">No post found !</p>
                        @endforelse 
                    </div>
                    @if(session()->has('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{session('status')}}</strong>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
