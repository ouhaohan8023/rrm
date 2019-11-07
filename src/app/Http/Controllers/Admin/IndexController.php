<?php

namespace OhhInk\Rrm\Admin;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class IndexController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('rrm::admin.index');
    }

    public function setLang($lang)
    {
        Cache::put('user_lang_'.Auth::user()->id,$lang);
        return Redirect::back();
    }

    public function error(){
        return view('rrm::500');
    }
}

