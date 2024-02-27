<x-app-layout>
    <div class="flex flex-col relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1"
                        patternUnits="userSpaceOnUse">
                        <path d="M100 200V.5M.5 .5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path
                        d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0"
                    fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
            </svg>
        </div>
        <div class="mx-20 flex flex-col justify-center gap-x-8 gap-y-16 ">
            <div>
                <div class="lg:pr-4">
                    <div>
                        <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            {{ $post->excerpt }}
                        </h1>
                        <a href="#">
                            <p class="mt-6 text-xl leading-8 text-gray-700">{{ $post->user->name }}
                        </a>
                        <p class="text-base font-semibold leading-7 text-indigo-600">
                            {{ $post->created_at->toFormattedDateString() }}</p>

                    </div>
                </div>
            </div>
            <div class="lg:pr-4">
                <div class="text-base leading-7 text-gray-700 ">
                    <p>{{ $post->body }}</p>
                </div>
            </div>
            <div class="flex flex-row">
                <div class="flex justify-center rounded-md w-28 border-solid border-2 border-black hover:text-blue-600">
                    <a href="{{ route('posts.index') }}"><button>Back to Posts</button></a>
                </div>

                @if (Auth::id() === $post->user_id)
                    <div
                        class="flex justify-center rounded-md w-28 border-solid border-2 border-black hover:text-blue-600">
                        <a href="{{ route('posts.edit', $post) }}"><button>Edit Post</button></a>
                    </div>
                    <div
                        class="flex justify-center rounded-md w-28 border-solid border-2 border-black hover:text-red-600">
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Delete Post</button>
                        </form>
                    </div>
                @endif

            </div>
        </div>

        <div class="mx-20 my-5 max-w-7xl ">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Comments</h2>
            @auth
                <x-blog.comment-input :post="$post" />
            @endauth
        </div>

        <div>
            @foreach ($post->comments->reverse() as $comment)
                <x-blog.comments :comment="$comment" />
            @endforeach
        </div>


    </div>



</x-app-layout>
