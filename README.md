# Cake Scheduler
Cron Scheduler Plugin for CakePHP 3

## Installation

+ To install the CakeScheduler plugin, you can use composer. From your application’s ROOT directory (where composer.json file is located) run the following:

    ```composer require watchowl/cake-scheduler```

+ You will need to add the following line to your application's `config/bootstrap.php` file:

    ```Plugin::load('Watchowl/CakeScheduler');```
    
## Starting The Scheduler

## Defining Schedules

You may define all of your scheduled tasks in `config/bootstrap.php`.

### Scheduling CakePHP Shell

```$cakeSchedule->shell()```

### Scheduling CLI Commands

```$cakeSchedule->exec()```