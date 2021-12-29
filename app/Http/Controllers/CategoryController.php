<?php

namespace App\Http\Controllers;

use App\Inposter\Gateways\CategoryGateway;
use App\Inposter\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, CategoryGateway $categoryGateway)
    {
        $this->middleware('auth');
        $this->cR = $categoryRepository;
        $this->cG = $categoryGateway;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function create(Request $request)
    {

        if ($request->isMethod('get')) {


            return view('categories.create',
                ['title' => 'Dodaj kategorie',
                    'category' => null,

                ]
            );

        } elseif ($request->isMethod('post')) {

            $savePost = $this->cG->saveCategory($request);
            return  $savePost;

        } else {

            return redirect('posts/create')->with('status', 'Ups! Coś poszło nie tak.');

        }
    }


}
