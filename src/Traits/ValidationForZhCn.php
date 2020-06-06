<?php

namespace OhhInk\Rrm\Traits;

trait ValidationForZhCn
{

    public function message()
    {
        $lang = [
            'accepted'             => ':attribute 是被接受的',
            'active_url'           => ':attribute 必须是一个合法的 URL',
            'after'                => ':attribute 必须是 :date 之后的一个日期',
            'alpha'                => ':attribute 必须全部由字母字符构成。',
            'alpha_dash'           => ':attribute 必须全部由字母、数字、中划线或下划线字符构成',
            'alpha_num'            => ':attribute 必须全部由字母和数字构成',
            'array'                => ':attribute 必须是个数组',
            'before'               => ':attribute 必须是 :date 之前的一个日期',
            'between'              => [
                'numeric' => ':attribute 必须在 :min 到 :max 之间',
                'file'    => ':attribute 必须在 :min 到 :max KB之间',
                'string'  => ':attribute 必须在 :min 到 :max 个字符之间',
                'array'   => ':attribute 必须在 :min 到 :max 项之间',
            ],
            'boolean'              => ':attribute 字符必须是 true 或 false',
            'confirmed'            => ':attribute 二次确认不匹配',
            'date'                 => ':attribute 必须是一个合法的日期',
            'date_format'          => ':attribute 与给定的格式 :format 不符合',
            'different'            => ':attribute 必须不同于:other',
            'digits'               => ':attribute 必须是 :digits 位',
            'digits_between'       => ':attribute 必须在 :min and :max 位之间',
            'dimensions'           => ':attribute 图像尺寸不合法',
            'distinct'             => ':attribute 字段值不能重复.',
            'email'                => ':attribute 必须是一个合法的电子邮件地址。',
            'exists'               => '选定的 :attribute 是无效的',
            'file'                 => ':attribute 必须是文件',
            'filled'               => ':attribute 的字段是必填的',
            'image'                => ':attribute 必须是一个图片 (jpeg, png, bmp 或者 gif)',
            'in'                   => '选定的 :attribute 是无效的',
            'in_array'             => ':attribute 不在 :other 中',
            'integer'              => ':attribute 必须是个整数',
            'ip'                   => ':attribute 必须是一个合法的 IP 地址。',
            'json'                 => ':attribute 必须是一个合法的 JSON 字符串',
            'max'                  => [
                'numeric' => ':attribute 的最大长度为 :max 位',
                'file'    => ':attribute 的最大为 :max',
                'string'  => ':attribute 的最大长度为 :max 字符',
                'array'   => ':attribute 的最大个数为 :max 个',
            ],
            'mimes'                => ':attribute 的文件类型必须是:values',
            'mimetypes'            => ':attribute 的文件类型必须是:values',
            'min'                  => [
                'numeric' => ':attribute 的最小长度为 :min 位',
                'file'    => ':attribute 大小至少为:min KB',
                'string'  => ':attribute 的最小长度为 :min 字符',
                'array'   => ':attribute 至少有 :min 项',
            ],
            'not_in'               => '选定的 :attribute 是无效的',
            'numeric'              => ':attribute 必须是数字',
            'present'              => ':attribute 字段必须存在',
            'regex'                => ':attribute 格式是无效的',
            'required'             => ':attribute 字段必须填写',
            'required_if'          => ':attribute 字段是必须的当 :other 是 :value',
            'required_unless'      => ':attribute 字段是必须的除非 :other 在 :values 中',
            'required_with'        => ':attribute 字段是必须的当 :values 是存在的',
            'required_with_all'    => ':attribute 字段是必须的当 :values 是存在的',
            'required_without'     => ':attribute 字段是必须的当 :values 是不存在的',
            'required_without_all' => ':attribute 字段是必须的当 没有一个 :values 是存在的',
            'same'                 => ':attribute 和 :other 必须匹配',
            'size'                 => [
                'numeric' => ':attribute 必须是 :size 位',
                'file'    => ':attribute 必须是 :size KB',
                'string'  => ':attribute 必须是 :size 个字符',
                'array'   => ':attribute 必须包括 :size 项',
            ],
            'string'               => ':attribute 必须是字符串',
            'timezone'             => ':attribute 必须个有效的时区',
            'unique'               => ':attribute 已存在',
            'uploaded'             => ':attribute 上传失败',
            'url'                  => ':attribute 无效的格式',
        ];
        return $lang;
    }

    public function attribute()
    {
        $lang = [
            'name' => '用户名',
            'username' => '用户名',
            'account'  => '账号',
            'captcha'  => '验证码',
            'mobile'   => '手机号',
            'password' => '密码',
            'content'  => '内容',
            'identity' => '手机号/用户名',
            'email'    => '邮箱/账号',
            'avatar'   => '头像'


        ];
        return $lang;
    }

}
