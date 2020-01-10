<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use OhhInk\Rrm\Model\User;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * 测试登陆页面是否正常展示
     */
    public function testLoginForm()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
    }

    /**
     * 测试未登陆状态下，跳转到登陆页面
     */
    public function testHomeWithoutAuthenticated()
    {
        $response = $this->get('/admin/');

        $response->assertRedirect('/login');  // 用户未认证则跳转到登录页
        $this->assertGuest();  // 断言用户未认证
    }

    /**
     * 测试lang能否正常转换
     */
    public function testLangSet()
    {
        $user = User::first();
        $lang = Cache::get('user_lang_'.$user->id);
        $arr = ['zh-cn','en'];
        if ($lang == $arr[0]) {
            $lang = $arr[1];
        } else {
            $lang = $arr[0];
        }
        Cache::put('user_lang_'.$user->id,$lang);
        $this->assertEquals($lang, Cache::get('user_lang_'.$user->id));
    }

    /**
     * 测试错误页面能否正常打开
     */
    public function testErrorView()
    {
        $response = $this->get('/error');

        $response->assertViewIs('rrm::500');
    }
}
