<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Services\DateService;

class DateTimeTimeZoneCommand extends Command
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
    protected $signature = 'datetime:tz
            {date1 : first datetime(d-m-Y-H-i-s)}
            {date2 : second datetime(d-m-Y-H-i-s)}
            {tz1=UTC : first timezone}
            {tz2=UTC : second timezone}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display datetime difference in timezones';

    /**
     * DateTimeTimeZoneCommand constructor.
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
        $timezoneOne = $this->argument('tz1');
        $timezoneTwo = $this->argument('tz2');

        $this->info($this->date->timeZoneCompare($dateOne, $dateTwo, $timezoneOne, $timezoneTwo));
    }
}
