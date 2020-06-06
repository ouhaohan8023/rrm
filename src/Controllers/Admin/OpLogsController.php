<?php

namespace OhhInk\Rrm\Controllers\Admin;

use OhhInk\Rrm\Model\OperationLogs;

class OpLogsController extends BaseController
{
    /**
     * 操作记录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $search = request()->all();
        $data = OperationLogs::query()->select('id', 'name', 'url', 'ip', 'data', 'created_at', 'updated_at');

        if (!empty($search)) {
            foreach ($search as $k => $v) {
                if ($v == null || $k == 'page') {
                    continue;
                }
                if ($k == 'start') {
                    $data = $data->where('created_at', '>=', $v);
                    continue;
                }

                if ($k == 'stop') {
                    $data = $data->where('created_at', '<=', $v);
                    continue;
                }

                if ($k == 'keyword') {
                    $data = $data->where('data', 'like', "%".$v."%");
                    continue;
                }

                $data = $data->where($k, $v);
            }
        }
        $data = $data->orderBy('id', 'DESC')->paginate(config('admin.per_page'));
        request()->flash();
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

