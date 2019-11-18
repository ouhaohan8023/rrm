<?php

namespace OhhInk\Rrm\Admin;

use OhhInk\Rrm\Model\OperationLogs;

class OpLogsController extends BaseController
{
    /**
     * 操作记录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = OperationLogs::query()->select('id','name', 'url', 'ip', 'data', 'created_at',
            'updated_at')->orderBy('id','DESC')->paginate(config('admin.per_page'));
        return view('rrm::admin.op-log.index', ['data' => $data]);
    }

    public function view($id)
    {
        $data = OperationLogs::find($id)->getOriginal();
        return view('rrm::admin.op-log.form', ['data' => $data]);
    }

    public function clear()
    {
        OperationLogs::truncate();
        $success = __('rrm::op-log.model').__('rrm::base.success');
        return redirect()->route('admin.op-log.index')->with('success', $success);
    }
}

