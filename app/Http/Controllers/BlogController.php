<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function create()
    {       
         return view('blog.add-blog'); 
    }

    public function index(){
        $blogs = Blog::all();
        return view('index', compact('blogs')); 
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);
    
        // Create a new blog post
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blog_pic'), $imageName);
            $blog->image = $imageName;
        }
    
        // Set the user ID
        $blog->user_id = auth()->id(); // Assuming you're using Laravel's built-in authentication
    
        // Save the blog post
        $blog->save();
    
        // Redirect the user after successful creation
        return redirect('add-blog')->with('success', 'Blog post created successfully!');
    }
    
    public function blogDetail($id){
        $blog = Blog::find($id);
        return view('blog.blog-detail', compact('blog'));
    }

  
}
