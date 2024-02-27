<article class="flex max-w-xl flex-col items-start justify-between">
    <div class="group relative">
        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
            <a href="/posts/{{ $post->slug }}">
                <span class="absolute inset-0"></span>
                {{ $post->excerpt }}
            </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->comment }}</p>
    </div>
    <div class="relative mt-8 flex items-center gap-x-4">
        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="" class="h-10 w-10 rounded-full bg-gray-50">
        <div class="text-sm leading-6">
            <p class="font-semibold text-gray-900">
                <a href="{{route('posts.index', ['author' => $post->user->name])}}">
                    <span class="absolute inset-0"></span>
                    {{ $post->user->name }}
                </a>
            </p>
        </div>
        <div class="flex flex-col items-left text-xs">
            <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->toFormattedDateString() }}</time>

        </div>

    </div>

    <div class="flex flex-row">
        <a href="{{route('posts.index', ['category' => $post->category])}}"
            class="flex justify-center mt-5 p-2 rounded-full bg-gray-500 font-medium text-gray-900 hover:text-slate-100 hover:bg-gray-700">{{ $post->category }}</a>
        @if (Route::is('dashboard')) 
            <p
                class="flex justify-center mt-5 p-2 rounded-full bg-gray-500 font-medium text-gray-900 hover:text-slate-100 hover:bg-gray-700">{{ $post->status }}</p>
        @endif

    </div>
</article>