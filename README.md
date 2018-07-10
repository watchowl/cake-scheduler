# CakeScheduler
Cron Scheduler Plugin for CakePHP 3

## Table of Contents  
- [Introduction](#installation)
- [Why Use It](#why-use-it)
- [Installation](#installation)
- [Starting The Scheduler](#starting-the-scheduler)
- [Defining Schedules](#defining-schedules)
    - [Scheduling CakePHP Shell](#scheduling-cakephp-shell)
    - [Scheduling Any Other Commands](#scheduling-any-other-commands)
    - [Frequency Options](#frequency-options)
- [Hooks](#hooks)
    - [Before A Job Runs](#before-a-job-runs)
    - [After A Job Is Finished](#after-a-job-is-finished)
		
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

    ```Plugin::load('WatchOwl/CakeScheduler');```

    
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
// schedule/BackTasks.php
$schedule = new \WatchOwl\CakeScheduler\Schedule\CakeSchedule();
$schedule
    ->run('/usr/bin/php backup.php')
    ->daily()
    ->description('Test');
return $schedule;
```

### Scheduling CakePHP Shell
To schedule a CakePHP shell, call *CakeSchedule::shell*:

```$schedule->shell('MyCake awesome')```

### Scheduling Any Other Commands
To schedule any other commands, call *CakeSchedule::run*:

```$cakeSchedule->run('/usr/bin/php backup.php')```

### Frequency Options

There is plenty of ways to define the frequency of the execution:


| Method        |   	Description |
|---            |       ---     |
| ->cron()        |  the classic way of defining a schedule |
| ->hourly()      |  beginning of each hour|
| ->daily()   	|  daily at midnight|
| ->weekly    	|  sunday of each week	|
| ->monthly()   	|  first day of each month	|
| ->quarterly()   |  first day of each quarter	|
| ->yearly()   	|  first day of each year	|
| ->everyFiveMinutes() |    every five minutes      |
| ->everyMinute()     |   every minute        |
| ->everyTwelveHours() |   every twelve hours       |
| ->everyMonth()    | every month          |
| ->everySixMonths()  |  every six months          |
| ->everyFifteenDays()    |  every fifteen days        |
| ->on('13:30 2016-03-01') | at a specific date and time |
| ->at('13:30') | at a specific time |


Under the hood, CakeSchedule is using the great 
[lavary/crunz](https://github.com/lavary/crunz#frequency-of-execution) library.
It has a large number of options for us to configure the frequency of the execution.
Check out its official documentation if you are looking for more available frequency.   

## Hooks
Hooks make it easy to integrate with other services such as [www.watchowl.io](http://www.watchowl.io). 

### Before A Job Runs
To do something before a job is executed, we can use the *before()* hook:

For example:

```php
$schedule = new \WatchOwl\CakeScheduler\Schedule\CakeSchedule();

$schedule
    ->run('/usr/bin/php backup.php')
    ->before(function() { 
        // Do something before the job runs
     })
    ->daily()
    ->description('Test');
    
return $schedule;
```

### After A Job Is Finished
To do something after a job is executed, we can use the *after()* hook:

For example:

```php
$schedule = new \WatchOwl\CakeScheduler\Schedule\CakeSchedule();

$schedule
    ->run('/usr/bin/php backup.php')
    ->after(function() { 
        // Do something after the job is finished
     })
    ->daily()
    ->description('Test');
    
return $schedule;
```


