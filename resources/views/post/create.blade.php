<x-app-layout>
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">

        <div class="mx-auto max-w-7xl lg:grid-cols-3">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Create a Post</h2>
        </div>

        <div class="mx-auto mt-10 max-w-7xl gap-x-8 gap-y-16 border-t border-gray-200">
        </div>

        <form action="{{ route('posts.store') }}" method="POST" class="mx-auto mt-8 max-w-7xl">
            @csrf
            <div class="grid grid-cols-1 gap-y-6">
                <div>
                    <label for="title" class="block text-sm font-semibold leading-6 text-gray-900">Title</label>
                    <div class="mt-2.5">
                        <input type="text" name="title" id="title" autocomplete="title"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="body" class="block text-sm font-semibold leading-6 text-gray-900">Body</label>
                    <div class="mt-2.5">
                        <textarea name="body" id="body" rows="4"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>
                <div class="flex flex-row items-stretch">
                    <div class="basis-1/2">
                        <label for="category"
                            class="block text-sm font-semibold leading-6 text-gray-900">Category</label>
                        <select name="category" id="category"
                            class="mt-2 block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @foreach ($categories as $category)
                                <option value="{{ $category }}"> {{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="basis-1/2">
                        <label for="status"
                            class="mb-2 block text-sm font-semibold leading-6 text-gray-900">Status</label>
                        <select name="status" id="status"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @foreach ($statuses as $status)
                            <option value="{{ $status }}"> {{ $status }}</option>
                        @endforeach
                        </select>
                        
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </div>

                </div>
            </div>
            <div class="mt-10">
                <button type="submit"
                    class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
