<?php

namespace OhhInk\Rrm\Layout;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class Header
{
    /**
     * 创建一个新的属性composer.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $locale = App::getLocale();
        $view->with('lang', $locale);
    }
}
