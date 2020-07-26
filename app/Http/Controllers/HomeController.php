<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tweet  = DB::table('post')
                ->orderBy('created_at', 'desc')
                ->get();
        return view('home', ['tweet' => $tweet ]);
    }

    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'context' => 'required'
        ]);
        $tweet = new Post([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'context' => $request->get('context')
        ]);
        $tweet->save();
        return redirect('home');
    }

    // profile

    public function insert_post(Request $request)
    {
        $this->validate($request, [
            'context' => 'required'
        ]);
        $tweet = new Post([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'context' => $request->get('context')
        ]);
        $tweet->save();
        return redirect('/profile');
    }

    public function edit($id)
    {
        $edit = Post::find($id);
        return view('edit_tweet')->with('edit',$edit);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'context' => 'required'
        ]);
        $update = Post::find($id);
        $update->context = $request->get('context');
        $update->save();
        return redirect('profile')->with('update',$update);
    }

    public function delete($id)
    {
        $delete = Post::find($id);
        $delete->delete();
        return redirect('profile')->with('delete',$delete);
    }

    public function p_tweet()
    {
        $own  = DB::table('post')
                ->select('*')
                ->where('name', Auth::user()->name)
                ->orderBy('created_at', 'desc')
                ->get();
        return view('profile', ['own' => $own ]);
    }
}
