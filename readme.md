# Instruction

0. Create your composer.json and run "composer require quadrogod\cron"
1. Create your App/Cron/Task\_{TaskName or Task\_Name}.php files with Class Task\_{TaskName or Task\_Name} extends \Quadrogod\Cron\Task
2. Create method action\_default() OR action\_{action_name}() with your logic
3. Execute script in console "php cron.php --task={TaskName} --action={action\_name}*" OR use web browser "http(s)://site.name/cron.php?task={TaskName}", 
    \** \- optional param, default use action_default() method
4. All params available in task class in $_params
5. Use Autoload section in your composer.json
```
    "autoload": {
        "psr-4": {
            "App\\": "App/"           
        }
    }
```
More info from Alex <admin@tech-con.kz>

