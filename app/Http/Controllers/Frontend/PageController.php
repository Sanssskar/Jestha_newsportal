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
        $categories = Category::where("status",true)->get();
        View::share([
            "categories" => $categories
        ]);
    }

    public function home()
    {
        $latest_articles = Article::where("status",true)->latest()->take(2)->get();
        return view('Frontend.home',compact('latest_articles'));
    }
       public function category($slug)
    {
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
    }
}
