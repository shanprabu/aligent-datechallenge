<?php

namespace App\Services;

use Carbon\Carbon;

class DateService
{
    /**
     * @var Carbon
     */
    protected $carbon;

    /**
     * DateService constructor.
     *
     * @param Carbon $carbon
     */
    public function __construct(Carbon $carbon)
    {
        $this->carbon = $carbon;
    }

    /**
     * Gives the difference between 2 dates in days
     *
     * @param        $dateOne
     * @param        $dateTwo
     * @param string $param
     * @param null   $timeZoneOne
     * @param null   $timeZoneTwo
     *
     * @return string
     */
    public function diffOfDays($dateOne, $dateTwo, $param = 'n', $timeZoneOne = null, $timeZoneTwo = null)
    {
        $dateOne = $this->carbon->createFromFormat('d-m-Y-H-i-s', $dateOne, $timeZoneOne);
        $dateTwo = $this->carbon->createFromFormat('d-m-Y-H-i-s', $dateTwo, $timeZoneTwo);

        $diffInDays = $dateOne->diffInDays($dateTwo);

        if ($param != 'n') {
            return $this->getDateTime($diffInDays, $param);
        }

        return $diffInDays . ' days';
    }

    /**
     * Gives the difference between 2 dates in weekdays
     *
     * @param        $dateOne
     * @param        $dateTwo
     * @param string $param
     * @param null   $timeZoneOne
     * @param null   $timeZoneTwo
     *
     * @return string
     */
    public function diffOfWeekdays($dateOne, $dateTwo, $param = 'n', $timeZoneOne = null, $timeZoneTwo = null)
    {
        $dateOne = $this->carbon->createFromFormat('d-m-Y-H-i-s', $dateOne, $timeZoneOne);
        $dateTwo = $this->carbon->createFromFormat('d-m-Y-H-i-s', $dateTwo, $timeZoneTwo);

        $diffInWeekdays = $dateOne->diffInWeekdays($dateTwo);

        if ($param != 'n') {
            return $this->getDateTime($diffInWeekdays, $param);
        }

        return $diffInWeekdays . ' days';
    }

    /**
     * Gives the difference between 2 dates in weeks
     *
     * @param        $dateOne
     * @param        $dateTwo
     * @param string $param
     * @param null   $timeZoneOne
     * @param null   $timeZoneTwo
     *
     * @return string
     */
    public function diffOfWeeks($dateOne, $dateTwo, $param = 'n', $timeZoneOne = null, $timeZoneTwo = null)
    {
        $dateOne = $this->carbon->createFromFormat('d-m-Y-H-i-s', $dateOne, $timeZoneOne);
        $dateTwo = $this->carbon->createFromFormat('d-m-Y-H-i-s', $dateTwo, $timeZoneTwo);

        $diffInWeeks = $dateOne->diffInWeeks($dateTwo);

        if ($param != 'n') {
            return $this->getDateTime($diffInWeeks * 7, $param);
        }

        return $diffInWeeks . ' weeks';
    }

    /**
     * Compares timezones between two dates
     *
     * @param      $dateOne
     * @param      $dateTwo
     * @param null $timeZoneOne
     * @param null $timeZoneTwo
     *
     * @return string
     */
    public function timeZoneCompare($dateOne, $dateTwo, $timeZoneOne = null, $timeZoneTwo = null)
    {
        $dateOne = $this->carbon->createFromFormat('d-m-Y-H-i-s', $dateOne, $timeZoneOne);
        $dateTwo = $this->carbon->createFromFormat('d-m-Y-H-i-s', $dateTwo, $timeZoneTwo);

        $diff = $dateOne->diff($dateTwo);

        return $diff->y . ' years ' . $diff->m . ' months ' . $diff->d . ' days ' . $diff->h . ' hours ' . $diff->i . ' minutes ' . $diff->s . ' seconds';
    }

    /**
     * Formats Date
     *
     * @param $diff
     * @param $key
     *
     * @return string
     */
    protected function getDateTime($diff, $key)
    {
        if ($key == 'y') {
            $years = floor($diff / (365));

            return (($years > 0) ? $years . ' Year' . ($years > 1 ? 's' : '') : '0 Year');
        }

        if ($key == 'h') {
            $hours = floor($diff * 24);

            return (($hours > 0) ? $hours . ' Hour' . ($hours > 1 ? 's' : '') : '0 Hour');
        }

        if ($key == 'i') {
            $hours = floor($diff * 24 * 60);

            return (($hours > 0) ? $hours . ' Minute' . ($hours > 1 ? 's' : '') : '0 Minute');
        }

        if ($key == 's') {
            $hours = floor($diff * 24 * 60 * 60);

            return (($hours > 0) ? $hours . ' Second' . ($hours > 1 ? 's' : '') : '0 Second');
        } else {
            return 'unknown output format';
        }
    }
}
