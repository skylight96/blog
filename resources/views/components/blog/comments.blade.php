<ul role="list" class=" flex mx-20 justify-items-center divide-y divide-gray-100">
    <li class="my-5 w-full">
        <div class="flex flex-col">
            <div class="flex my-2 w-full">
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
                <div class="flex justify-between w-full items-center">
                    <div>
                        <p class="mx-2 truncate text-xs leading-5 text-gray-500">{{ $comment->user->name }}</p>
                        <p class="mx-2 truncate text-xs leading-5 text-gray-500">
                            {{ $comment->created_at->toFormattedDateString() }}</p>
                    </div>

                    @if (Auth::check() && Auth::id() === $comment->user_id || Auth::user()->is_admin)
                        <form action="{{ route('posts.comments.destroy', [$comment->post->slug, $comment->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="mt-2 border p-2 rounded-md hover:bg-blue-400" type="submit"
                                value="Submit">Delete
                                Comment</button>
                        </form>
                    @endif
                </div>
            </div>

            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $comment->body }}</p>
        </div>
    </li>
</ul>
