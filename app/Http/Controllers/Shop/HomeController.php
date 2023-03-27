<?php

namespace App\Http\Controllers\Shop;

use App\Domain\LogSearch\Models\LogSearch;
use App\Domain\Page\Models\Page;
use App\Domain\Post\Models\Post;
use App\Domain\Taxonomy\Models\Taxon;
use App\Enums\PostState;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Spatie\SchemaOrg\Schema;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoryParent = Taxon::where('taxonomy_id', setting('post_taxonomy', 1))->whereNull('parent_id')->first();
        $categories = Taxon::where('taxonomy_id', setting('post_taxonomy', 1))
            ->whereNotNull('parent_id')
            ->where('parent_id', $categoryParent->id)
            ->get();
        foreach ($categories as $category) {
            $category->posts = Post::whereHas('taxons', function($q) use($category){
                $q->where('id', $category->id);
            })->where('status', PostState::Active)->latest()->paginate(5);
        }

        $homeSchemaMarkup = $this->schemaMarkup();
        return view('shop.home', compact('categories', 'homeSchemaMarkup'));
    }

    public function search(SearchRequest $request)
    {
        $search = $request->search;
        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")->get();
        $pages = Page::where('title', 'like', "%$search%")->get();

        LogSearch::updateOrCreate([
            'key_word' => $search
        ])->increment('hits');

        return view('shop.search', compact('posts', 'pages'));
    }

    public function schemaMarkup()
    {
        return Schema::organization()
            ->url(config('app.url'))
            ->contactPoint(Schema::contactPoint()
                ->name(setting('store_name', null))
                ->description(setting('store_description', null))
                ->telephone(setting('store_phone', null))
                ->email(setting('store_email', null))
                ->image(Schema::imageObject()
                    ->url(\Storage::url(setting('store_logo')))
                    ->width('60')
                    ->height('60'))
            );
    }
}
