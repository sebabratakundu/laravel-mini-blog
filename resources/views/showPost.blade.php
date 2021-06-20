<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
                    {{ $post->title }}
                </h2>
                <span class="bg-green-100 inline-block rounded-full px-3 py-1 text-sm font-semibold text-green-700 mr-2 mb-2">{{$post->user->name}}</span>
                <span class="bg-yellow-100 inline-block rounded-full px-3 py-1 text-sm font-semibold text-yellow-700 mr-2 mb-2">{{$post->created_at->diffForHumans()}}</span>
                <p class="mt-5">
                    {{ $post->body }}
                </p>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
