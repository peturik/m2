<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PostAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:update,post', ['only' => ['edit', 'update']]);
        $this->middleware('can:destroy,post', ['only' => ['show', 'destroy']]);
    }
    public function index()
    {
        return view('home.posts.posts_index', ['posts' => Auth::user()->post()->latest()->get()]);
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('home.posts.post_create', compact('categories'));
    }

    private const POST_VALIDATOR = [
        'category' => 'required|numeric',
        'title' => 'required|min:6|max:50',
        'body' => 'required',
        'image' => 'image|max:2048|nullable',
    ];

    private const POST_ERROR_MESSAGES = [
        'title.required' => "The title field is required.",
        'body.required' => 'The body field is required.',
        'min' => 'At least :min characters.',
        'max' => 'At max :max characters'
    ];

    public function store(Request $request)
    {
        $validated = $request->validate(self::POST_VALIDATOR, self::POST_ERROR_MESSAGES);

        $img = '';
        if (isset($validated['image'])) {
            $img = $validated['image'];
        }

        Auth::user()->post()->create([
            'user_id' => auth()->user()->id,
            'category_id' =>$request->category,
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title'], '-'),
            'body' => $validated['body'],
            'image' => $img,
            
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('home.posts.post_edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate(self::POST_VALIDATOR, self::POST_ERROR_MESSAGES);

        $img = '';
        if (isset($validated['image'])) {
            $img = $validated['image'];
        }

        $post->fill([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'title' =>$validated['title'],
            'slug' => Str::slug($validated['title'], '-'),
            'body' => $validated['body'],
            'image' => $img,
        ]);
        $post->save();
        return redirect()->route('post', [$post->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('home.posts.post_delete', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
