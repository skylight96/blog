<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Enums\Status;
use App\Enums\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('post.index', [
            'posts' => Post::query()->where('status', Status::Published)->latest()->when($request->input('category'), function ($query, $term) { //$term is value of 'category' when in the URL
                return $query->where('category', Category::from($term));
            })->when($request->input('author'), function ($query, $term) {
                return $query->whereHas('user', function ($query2) use ($term) {
                    return $query2->where('name', 'like', '%' . $term . '%');
                });
            })->paginate(10)
        ]);
        
        // $query = Post::query()->where('status', Status::Published)->latest();

        // if ($request->has('category')) {
        //     $query->where('category', Category::from($request->query('category')));
        // }

        // // if a category is in the request, show me the published posts that have that category 
        // return view('post.index', [
        //     'posts' => $query->paginate(10)
        // ]);
    }

    public function data(array $array) {

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', [
            'categories' => Category::cases(),
            'statuses' => Status::cases(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => [Rule::enum(Category::class), 'required'],
            'status' => [Rule::enum(Status::class), 'required'],
        ]);

        $validated['user_id'] = auth()->id();
        $validated['excerpt'] = Str::limit($validated['body'], 50);

        Post::create($validated);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view(
            'post.show',
            [
                'post' => $post,
                'categories' => Category::cases(),
                'statuses' => Status::cases(),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('post.edit', [
            'post' => $post,
            'categories' => Category::cases(),
            'statuses' => Status::cases(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => [Rule::enum(Category::class), 'required'],
            'status' => [Rule::enum(Status::class), 'required'],
        ]);

        $validated['user_id'] = auth()->id();
        $validated['excerpt'] = Str::limit($validated['body'], 50);

        $post->update($validated);

        return redirect()->route('posts.show', [
            'post' => $post,
            'categories' => Category::cases(),
            'statuses' => Status::cases(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id)
            return abort(403, "This isn't your post bitch");

        $post->delete();
        return redirect()->route('posts.index');
    }
}
