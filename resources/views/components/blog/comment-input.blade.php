<div class="mt-5">
    <div class="relative mt-2 rounded-md shadow-sm">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
        </div>
        <form action="{{ route('posts.comments.store', $post->slug) }}" method="POST">
            @csrf
            <textarea name="body" id="body"
                class="block w-full rounded-md border-0 py-1.5 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Leave a Comment" style="resize: none;"></textarea>
            <button class="mt-2 border p-2 rounded-md hover:bg-blue-400" type="submit" value="Submit">Submit
                Comment</button>
        </form>

        <div class="absolute inset-y-0 right-0 flex items-center">
        </div>
    </div>
</div>
