<?php

namespace Quadrogod\Cron;

abstract class CronManager {
    
    use CronTrait;
    
    /**
     * 
     * @param string $task
     * @return \Quadrogod\Cron\Task
     * @throws \Exception
     */
    static function factory($task, $params = null) 
    {
        $class_name = '\App\Cron\\Task_' . ucfirst($task);
        //
        if ( ! class_exists($class_name)) {
            throw new \Exception('Class \'' . $class_name . '\' not found.');
        }
        
        if ( ($params === null) OR ! is_array($params) ) {
            $params = static::getParams();
        }
        
        return new $class_name($params);        
    }        


    abstract public function execute();
} 

