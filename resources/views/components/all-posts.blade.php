<div class="w-full rounded bg-white overflow-hidden shadow-lg mb-10">
                                <div class="px-4 py-4">
                                    <div class="font-bold text-xl mb-2"><a href="{{ route('show-post',$post->id) }}">{{ $post->title }}</a></div>
                                    <p class="text-gray-700 text-base mb-3">
                                    {{ $post->excerpt }}
                                    </p>
                                    <span class="bg-green-100 inline-block py-1 rounded-full px-3 text-xs font-semibold text-green-500 mr-2 mb-2">{{ $post->user->name }}</span>
                                    <span class="bg-yellow-100 py-1 rounded-full px-3 text-xs font-normal text-yellow-500 mr-2 mb-2">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>