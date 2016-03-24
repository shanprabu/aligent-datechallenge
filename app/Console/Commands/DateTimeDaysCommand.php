<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Services\DateService;

class DateTimeDaysCommand extends Command
{
    /**
     * @var DateService
     */
    protected $date;
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'datetime:days
            {date1 : first datetime(d-m-Y-H-i-s)}
            {date2 : second datetime(d-m-Y-H-i-s)}
            {--output=n : output type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display datetime difference in days';

    /**
     * DateTimeDaysCommand constructor.
     *
     * @param DateService $date
     */
    public function __construct(DateService $date)
    {
        parent::__construct();

        $this->date = $date;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dateOne = $this->argument('date1');
        $dateTwo = $this->argument('date2');
        $output = $this->option('output');

        $this->info($this->date->diffOfDays($dateOne, $dateTwo, $output));
    }
}
