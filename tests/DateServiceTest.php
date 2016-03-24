<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery as m;

class DateServiceTest extends TestCase
{
    public function testDiffOfDays()
    {
    	$date = app('App\Services\DateService');

    	$diffOfDaysOne = $date->diffOfDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'n');
        $diffOfDaysTwo = $date->diffOfDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'y');
        $diffOfDaysThree = $date->diffOfDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'h');
        $diffOfDaysFour = $date->diffOfDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'i');
        $diffOfDaysFive = $date->diffOfDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 's');

    	$this->assertEquals('14 days', $diffOfDaysOne);
        $this->assertEquals('0 Year', $diffOfDaysTwo);
        $this->assertEquals('336 Hours', $diffOfDaysThree);
        $this->assertEquals('20160 Minutes', $diffOfDaysFour);
        $this->assertEquals('1209600 Seconds', $diffOfDaysFive);
    }

    public function testDiffOfWeekDays()
    {
        $date = app('App\Services\DateService');

        $diffOfWeekDaysOne = $date->diffOfWeekDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'n');
        $diffOfWeekDaysTwo = $date->diffOfWeekDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'y');
        $diffOfWeekDaysThree = $date->diffOfWeekDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'h');
        $diffOfWeekDaysFour = $date->diffOfWeekDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'i');
        $diffOfWeekDaysFive = $date->diffOfWeekDays('01-01-2013-20-20-00', '15-01-2013-23-30-00', 's');

        $this->assertEquals('11 days', $diffOfWeekDaysOne);
        $this->assertEquals('0 Year', $diffOfWeekDaysTwo);
        $this->assertEquals('264 Hours', $diffOfWeekDaysThree);
        $this->assertEquals('15840 Minutes', $diffOfWeekDaysFour);
        $this->assertEquals('950400 Seconds', $diffOfWeekDaysFive);
    }

    public function testDiffOfWeeks()
    {
        $date = app('App\Services\DateService');

        $diffOfWeeksOne = $date->diffOfWeeks('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'n');
        $diffOfWeeksTwo = $date->diffOfWeeks('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'y');
        $diffOfWeeksThree = $date->diffOfWeeks('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'h');
        $diffOfWeeksFour = $date->diffOfWeeks('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'i');
        $diffOfWeeksFive = $date->diffOfWeeks('01-01-2013-20-20-00', '15-01-2013-23-30-00', 's');

        $this->assertEquals('2 weeks', $diffOfWeeksOne);
        $this->assertEquals('0 Year', $diffOfWeeksTwo);
        $this->assertEquals('336 Hours', $diffOfWeeksThree);
        $this->assertEquals('20160 Minutes', $diffOfWeeksFour);
        $this->assertEquals('1209600 Seconds', $diffOfWeeksFive);
    }

    public function testTimeZoneCompare()
    {
        $date = app('App\Services\DateService');

        $timeZoneCompareOne = $date->timeZoneCompare('01-01-2013-20-20-00', '15-01-2013-23-30-00', 'Europe/London', 'Asia/Kolkata');

        $this->assertEquals('0 years 0 months 13 days 21 hours 40 minutes 0 seconds', $timeZoneCompareOne);
    }
}
