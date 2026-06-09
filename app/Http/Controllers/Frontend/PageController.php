<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::where("status", true)->get();
        View::share([
            "categories" => $categories
        ]);
    }

    public function home()
    {
<<<<<<< HEAD
        $latest_articles = Article::where("status",true)->latest()->take(2)->get();
        return view('Frontend.home',compact('latest_articles'));
=======
        $latest_articles = Article::where("status", true)->latest()->take(2)->get();
        return view('Frontend.home', compact('latest_articles'));
>>>>>>> 8b146641e214b8d0058c3f65b004ac7fcef8463b
    }
    public function category($slug)
    {
<<<<<<< HEAD
        $category = Category::where("slug",$slug)->first();
        $advertises = Advertise::where("expiry_date",">=",time())->get();
        return view('Frontend.category',compact('category','advertises'));
    }
        public function search(Request $request)
    {
        $q = $request->q;
        $articles = Article::where("title","like","%$q%")->get();
        $advertises = Advertise::where("expiry_date",">=",time())->get();
        return view('Frontend.search',compact('articles','advertises','q'));
=======
        // return $slug;
        $category = Category::where("slug", $slug)->first();
        $advertises = Advertise::where("expiry_date", ">=", time())->get();
        return view('Frontend.category', compact('category', 'advertises'));
    }
    public function search(Request $request)
    {
        $q = $request->q;
        $articles = Article::where("title", "like", "%$q%")->latest()->get();
        $advertises = Advertise::where("expiry_date", ">=", time())->get();
        return view('Frontend.search', compact('articles', 'advertises', 'q'));
    }
    public function article($slug)
    {
        // return $slug;
        $article = Article::where("slug", $slug)->first();
        $advertises = Advertise::where("expiry_date", ">=", time())->get();
        return view('Frontend.article', compact('article', 'advertises'));
>>>>>>> 8b146641e214b8d0058c3f65b004ac7fcef8463b
    }
}
