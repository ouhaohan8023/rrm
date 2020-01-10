<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use OhhInk\Rrm\Model\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function login()
    {
        // 默认使用admin用户
        $user = User::first();
        return $this->actingAs($user);
    }

    /**
     * 测试用户创建test
     */
    public function testCreate()
    {
        $photo = UploadedFile::fake()->image('picture.jpg');  // 伪造上传图片
        $user = $this->login();
        $randUser = 'test_unit_'.rand(1000,9999);
        $email = $randUser.'@gmail.com';
        Cache::put('php_unit_username',$email);
        $response = $user->post('/admin/user/create', [
            'name' => $randUser,
            'email' => $email,
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'avatar' => $photo,
            'is_test' => 1
        ]);

        // 临时赋值super_admin
        $user = User::findByEmail($email);
        $user->syncRoles('super_admin');
        flushPermission();

        $response
            ->assertRedirect(route('admin.user.index'))
            ->assertSessionHas('success');
    }

    /**
     * 测试用户表单登陆
     */
    public function testPostLogin()
    {
        $username = Cache::get('php_unit_username');
        $response = $this->post('/login', [
            'email' => $username,
            'password' => '12345678',
        ]);

        $response->assertRedirect('/admin');
    }

    /**
     * 测试登陆页面是否正常赋值
     */
    public function testUserIndex()
    {
        $username = Cache::get('php_unit_username');
        $user = User::findByEmail($username);
        $response = $this->actingAs($user)->get('/admin/user');
        $response
            ->assertViewHas('data')
            ->assertViewIs('rrm::admin.user.index');
    }

    /**
     * 测试用户修改密码
     */
    public function testUpdatePwd()
    {
        $username = Cache::get('php_unit_username');
        $user = User::findByEmail($username);
        $email = 'update_'.$user->email;
        Cache::put('php_unit_username',$email);
        $response = $this->actingAs($user)->post('/admin/user/update/'.$user->id,[
            'name' => 'update_'.$user->name,
            'email' => $email,
            'password' => '87654321',
        ]);
        $response
            ->assertRedirect(route('admin.user.index'))
            ->assertSessionHas('success');
    }

    /**
     * 修改密码后尝试登陆
     */
    public function testPostLoginAgain()
    {
        $username = Cache::get('php_unit_username');
        $response = $this->post('/login', [
            'email' => $username,
            'password' => '87654321',
        ]);

        $response->assertRedirect('/admin');
    }

    /**
     * 测试删除用户
     */
    public function testDelete()
    {
        $username = Cache::get('php_unit_username');
        $user = User::findByEmail($username);
        $response = $this->actingAs($user)->post('/admin/user/delete',[
            'id' => $user->id,
        ]);
        $response->assertSessionHas('success');
    }

    /**
     * 删除所有is_test的测试账户
     */
    public function testDeleteTestAccount()
    {
        User::query()->where('is_test',1)->delete();
        $this->assertTrue(Cache::forget('php_unit_username'));
    }
}
