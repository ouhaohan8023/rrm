<?php

namespace OhhInk\Rrm\Commands;

use Illuminate\Support\Facades\Log;
use OhhInk\Rrm\Model\OperationLogs;
use Illuminate\Console\Command;

class CacheOnlineUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin-tool:cache-online-users';

    /**
     * The console command description.
     * 统计5分钟内有操作的用户作为在线用户，存入cache，方便前台调用展示
     * @var string
     */
    protected $description = 'find users who have operation in 5 minutes to store in cache, used for right bar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info(123);
        OperationLogs::cacheOnlineUsers();
    }
}
