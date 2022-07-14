<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPostController extends Controller
{
    public function index(User $user) {
        $posts = $user->posts()->with(['user', 'likes'])->latest()->paginate(10);

        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
