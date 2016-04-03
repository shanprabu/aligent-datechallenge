#**Solution for**

1.Find out the number of days between two datetime parameters.

**Usage**
php artisan datetime:days datetime1 datetime2

datetime1 and datetime2 should be of the format dd-mm-yyyy-hh-mm-ss

There is no space between yyyy and hh in the format. Introducing a space between them will split date and time into two different parameters

**Usage example**

    php artisan datetime:days 01-01-2016-10-30-00 15-01-2016-11-00-00

2.Find out the number of weekdays between two datetime parameters.
**Usage**
php artisan datetime:weekdays datetime1 datetime2

datetime1 and datetime2 should be of the format dd-mm-yyyy-hh-mm-ss

**Usage example**

    php artisan datetime:weekdays 01-01-2016-10-30-00 15-01-2016-11-00-00

3.Find out the number of complete weeks between two datetime parameters.
**Usage**
php artisan datetime:weeks datetime1 datetime2

datetime1 and datetime2 should be of the format dd-mm-yyyy-hh-mm-ss

**Usage example**

    php artisan datetime:weeks 01-01-2016-10-30-00 15-01-2016-11-00-00

4.Accept a third parameter to convert the result of (1, 2 or 3) into one of seconds, minutes, hours, years.
For all the above 3 commands adding an optional parameter --output=**x** will convert the result into the value required.
Options for **x** are
**s** convert the result in seconds
**i** convert the result in minutes
**h** convert the result in hours
**y** convert the result in years

**Usage example**

    php artisan datetime:days datetime1 datetime2 --output=s
    php artisan datetime:weekdays datetime1 datetime2 --output=i
    php artisan datetime:weeks datetime1 datetime2 --output=h
    php artisan datetime:weeks datetime1 datetime2 --output=y

5.Allow the specification of a timezone for comparison of input parameters from different timezones. 

**Usage**
php artisan datetime:tz datetime1 datetime2 timezone1 timezone2

datetime1 and datetime2 should be of the format dd-mm-yyyy-hh-mm-ss
timezone1 and timezone2 can be any standard time-zone string. Please refer to http://php.net/manual/en/timezones.php for list of valid time-zone strings

timezone1 is for datetime1 and timezone2 is for datetime2

**Usage example**

    php artisan datetime:tz 01-01-2016-00-00-00 01-01-2016-00-00-00 Australia/Adelaide Australia/Melbourne
    php artisan datetime:tz 01-01-2016-00-00-00 01-01-2016-12-30-30 Australia/Adelaide Australia/Melbourne

6.Check for DST time difference in hours for a specific timezone. 

**Usage**
php artisan datetime:dst datetime1 datetime2 timezone

datetime1 and datetime2 should be of the format dd-mm-yyyy-hh-mm-ss
timezone can be any standard time-zone string. Please refer to http://php.net/manual/en/timezones.php for list of valid time-zone strings

**Usage example**

    php artisan datetime:dst 01-04-2016-00-00-00 04-04-2016-00-00-00 Australia/Melbourne
    php artisan datetime:dst 01-03-2016-00-00-00 04-03-2016-00-00-00 Australia/Melbourne

In the above examples, first command will return 73 hours and the second command will return 72 hours

**Validate test cases by running phpunit from the command prompt**

