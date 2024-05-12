<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; // Assuming your Blog model is named Blog

class MyPostsController extends Controller
{
    public function userBlogs(){
        // Get the ID of the logged-in user
        $userId = auth()->id();

        // Fetch blogs added by the logged-in user
        $blogs = Blog::where('user_id', $userId)->get();

        // Pass the user's blogs to the view
        return view('blog.my-blogs', compact('blogs'));
    }

    public function edit($id)
    {
        // Find the blog by its ID
        $blog = Blog::findOrFail($id);
        
        // Return the view with the blog data
        return view('blog.edit', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('/')->with('success', 'Blog deleted successfully!');
    }

       public function update(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
    ]);

    // Find the blog post by ID
    $blog = Blog::findOrFail($id);

    // Update the blog post
    $blog->title = $request->input('title');
    $blog->content = $request->input('content');

    // Check if there's a new image uploaded
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('blog_pic'), $imageName);
        
        // Delete the old image if exists
        if ($blog->image) {
            $oldImagePath = public_path('blog_pic') . '/' . $blog->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $blog->image = $imageName;
    }

    // Save the updated blog post
    $blog->save();

    // Redirect the user after successful update
    return redirect('/')->with('success', 'Blog post updated successfully!');
}

    }
    





