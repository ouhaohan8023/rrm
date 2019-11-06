<?php

namespace OhhInk\Rrm\Jobs;

use Illuminate\Support\Facades\Log;
use OhhInk\Rrm\Model\OperationLogs;
use OhhInk\Rrm\Model\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LogsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;
    protected $username;
    protected $path;
    protected $ip;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Request $request)
    {
        $this->user_id = $user->id;
        $this->username = $user->name;
        $this->path = $request->path();
        $this->ip = $request->ip();
        $this->data = $request->input();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('doing');
        if (isset($this->data['password'])) {
            unset($this->data['password']);
        }
        if (isset($this->data['password_confirmation'])) {
            unset($this->data['password_confirmation']);
        }
        OperationLogs::create([
            'user_id' => $this->user_id,
            'name'    => $this->username,
            'url'     => $this->path,
            'ip'      => $this->ip,
            'data'    => json_encode($this->data)
        ]);
    }
}
