<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::where("status",true)->get();
        View::share([
            "categories" => $categories
        ]);
    }

    public function home()
    {
<<<<<<< HEAD
        $latest_articles = Article::where("status",true)->latest()->take(2)->get();
        return view('Frontend.home',compact('latest_articles'));
    }
       public function category($slug)
    {
        // return $slug;
        $category = Category::where("slug",$slug)->latest()->first();
        return view('Frontend.category',compact('category'));
=======
        $latest_articles = Article::where("status", true)->latest()->take(3)->get();
        return view('Frontend.home',compact('latest_articles'));
    }

    public function category($slug){
        $category = Category::where("slug",$slug)->first();
        $advertises = Advertise::where("expiry_date",">=",today())->get();
        return view('Frontend.category',compact('category','advertises'));
>>>>>>> 7a4e38b0929d0efb47732e3e849a30c056c60208
    }
}
