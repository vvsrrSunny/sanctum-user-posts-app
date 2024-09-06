<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Console\Command;

class WelcomeEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:welcome {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a welcome email to a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument('userId');
        $user = User::find($userId);

        if (!$user) {
            $this->error('User not found');
            return;
        }

        // Dispatch the job
        SendEmailJob::dispatch($user);

        $this->info('Job dispatched successfully');
    }
}
