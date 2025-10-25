<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller

{
    public function index()
    {
        $posts = Post::paginate(4);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $posts = Post::latest()->paginate(4);
        return view('posts.create', compact('posts'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title'   => 'required|string|max:255',
            // 'content' => 'required',
            // 'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

        Post::create([
            'title' => $request->title
            // 'content' => $request->content,
            // 'image' => $request->image
        ]);


        // 'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        // $data = $validated;

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('posts','public');
        //     $data['image'] = $imagePath;
        // } else {
        //     unset($data['image']);
        // }

        // Post::create($data);

        return redirect()->route('posts.index')->with('success','Post created successfully!!!');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit',['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $validated;
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('posts','public');
            $data['image'] = $imagePath;
        } else {
            unset($data['image']);
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success','Post updated successfully!!!');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully!!!');
    }
}
// Fin du fichier, ne rien ajouter après cette accolade
