<?php

namespace OhhInk\Rrm\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use OhhInk\Rrm\Model\Google;

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
    public function index(Request $request)
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

    public function bind(Request $request)
    {
        $user = $request->user();
        if ($request->method() == 'POST') {
            if (empty($request->onecode) && strlen($request->onecode) != 6) return back()->with('msg','请正确输入手机上google验证码 ！')->withInput();
            // google密钥，绑定的时候为生成的密钥；如果是绑定后登录，从数据库取以前绑定的密钥
            $google = $request->google;
            // 验证验证码和密钥是否相同
            if(Google::CheckCode($google,$request->onecode)) {
                // 绑定场景：绑定成功，向数据库插入google参数，跳转到登录界面让用户登录
                // 登录认证场景：认证成功，执行认证操作
                $user->updateGoogle($google);
                return redirect()->route('admin.index');
            }
            else
            {
                // 绑定场景：认证失败，返回重新绑定，刷新新的二维码
                return back()->with('msg','请正确输入手机上google验证码 ！')->withInput();
            }
        } else {
            $createSecret = Google::CreateSecret($user->email);
            return view('rrm::admin.google',['createSecret' => $createSecret,"parameter" => []]);
        }
    }
}

