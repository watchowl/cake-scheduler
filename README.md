# CakeScheduler
Cron Scheduler Plugin for CakePHP 3

## Introduction 
CakeScheduler allows you to write cron jobs right from PHP files. 
It works for CakePHP shell as well as any other valid PHP code. 
Basically it is a replacement of the conventional crontab file. 

## Why Use It
The conventional way of writing a cron job is to place an entry in the crontab file each time you 
need to schedule a job. The problem with this approach is that you have to login(SSH) to the server 
each time. 

By using CakeScheduler, we are able to place the cron jobs in the source control system and deploy 
them to production just like any other PHP code.  

## Installation

+ To install the CakeScheduler plugin, you can use composer. From your application's ROOT directory (where composer.json file is located) run the following:

    ```composer require watchowl/cake-scheduler```

+ You will need to add the following line to your application's `config/bootstrap.php` file:

    ```Plugin::load('Watchowl/CakeScheduler');```

    
## Starting The Scheduler

We only need to install one ordinary cron job which runs every minute.
This cron job will enable CakeScheduler to schedule all the subsequent jobs:

```* * * * * /path-to-project/bin/cake cake_scheduler run schedule:run```

## Defining Schedules
A schedule is basically a PHP file ending with **Tasks.php** and it must return the **CakeSchedule** object.
All schedules should be place inside a folder called **schedule**. This folder must reside at the root directory 
where composer.json file is located.

For example:
```php
// schdule/BackTasks.php
$schedule = new \WatchOwl\CakeScheduler\Schedule\CakeSchedule();
$schedule
    ->run('/usr/bin/php backup.php')
    ->description('Test');
return $schedule;
```

### Scheduling CakePHP Shell
To schedule a CakePHP shell, call *CakeSchedule::shell*:

```$schedule->shell('MyCake awesome')```

### Scheduling Any Other Commands
To schedule any other commands, call *CakeSchedule::run*:

```$cakeSchedule->run()```

### Frequency of Execution



Under the hood, CakeSchedule is using the great 
[lavary/crunz](https://github.com/lavary/crunz#frequency-of-execution) library.
It has a large number of options for us to configure the frequency of the execution.
Check out its official documentation if you are looking for more available frequency.   

### Hooks
Hooks make it easy to integrate with other services such as [www.watchowl.io](http://www.watchowl.io). 
