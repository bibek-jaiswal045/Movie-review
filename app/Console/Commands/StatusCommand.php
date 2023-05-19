<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class StatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:status-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        $movies = Movie::all();

        $currentDate = Carbon::now();

        foreach ($movies as $movie) {
            $release = $movie->released_date;

            $date = Carbon::parse($movie->released_date);
            $difference = $currentDate->diffInDays($date);
            // Log::info($difference.'--'.$movie->id);
            if ($release > $currentDate) {
                $movie->status = 'upcoming';
            } else if (in_array($difference, range(0, 7))) {
                $movie->status = 'ongoing';
            } else {
                $movie->status = 'out of theatres';
               

            }
            $movie->save();
        }
    }
}
