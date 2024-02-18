    <x-app-layout >
        <x-blog.blog-header>
            @foreach ($posts as $post)
                <x-blog.blog-item :post='$post' />
            @endforeach
        </x-blog.blog-header>
        {{ $posts->links() }}

    </x-app-layout>
