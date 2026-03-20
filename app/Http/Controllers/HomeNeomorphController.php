<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Category;
use App\Models\IndexSlide;
use App\Models\News;
use App\Models\Product;
use App\Services\PageService;

class HomeNeomorphController extends Controller
{
    public function __construct(PageService $pageService)
    {
        parent::__construct($pageService);
    }

    public function index()
    {
        return view('home-neomorph', [
            'slides' => IndexSlide::orderBy('pos', 'asc')->where('is_active', 1)->get(),
            'advantages' => Advantage::orderBy('pos')->where('is_active', 1)->get(),
            'categories' => Category::whereIsActive(1)->whereShowMain(1)->orderBy('pos')->limit(6)->get(),
            'products' => Product::whereIsActive(1)->orderBy('pos')->limit(8)->get(),
            'news' => News::whereIsActive(1)->orderBy('created_at', 'desc')->limit(3)->get(),
        ]);
    }
}
