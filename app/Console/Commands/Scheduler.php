<?php

namespace App\Console\Commands;

use App\Jobs\ProcessVaccineScheduleMail;
use App\Models\User;
use App\Models\VaccineCenter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Scheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaccine:scheduler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today=now()->addDay()->format('Y-m-d');
         $dayOfWeek = now()->addDay()->format('l');
        
          // Skip weekends (Sunday-Thursday)
        if (in_array($dayOfWeek, ['Friday', 'Saturday'])) {
            $this->info('Skipping weekends.');
            return;
        }
        $centers = VaccineCenter::all();
        Log::info($centers);

          foreach ($centers as $center) {
            $users = User::where('vaccine_center_id', $center->id)
                ->where('status', 'Not scheduled')
                ->orderBy('created_at')
                ->take($center->daily_limit)
                ->get();

            foreach ($users as $user) {
               DB::table('users')->where('email',$user->email)->update(['status'=>'Scheduled']);

                // Dispatch email notification
                ProcessVaccineScheduleMail::dispatch($user);
            }
        }
    }
}
