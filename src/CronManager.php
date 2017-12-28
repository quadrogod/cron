<?php

namespace Quadrogod\Cron;

abstract class CronManager {
    
    /**
     * 
     * @param string $task
     * @return \Quadrogod\Cron\Task
     * @throws \Exception
     */
    static function factory($task) {
        $class_name = '\App\Cron\\Task_' . ucfirst($task);
        //
        if ( ! class_exists($class_name)) {
            throw new \Exception('Class \'' . $class_name . '\' not found.');
        }
        
        return new $class_name;        
    }
    
    abstract public function execute();
} 

