<?php

namespace Quadrogod\Cron;

abstract class CronManager {
    
    use \Quadrogod\Helpers\InputTrait;
    
    /**
     * 
     * @param string $task
     * @return \Quadrogod\Cron\Task
     * @throws \Exception
     */
    static function factory($task = null, $params = null) 
    {
        // get Params
        if ( ($params === null) OR ! is_array($params) ) {
            $params = static::getInputParams();
        }
        // get Task Name OR Default
        if ( ($task === null) OR ! is_string($task) ) {
            $task = (empty($params['task'])) ? 'Default' : $params['task'];
        }
        
        $class_name = '\App\Cron\\Task_' . ucfirst($task);
        //
        if ( ! class_exists($class_name) ) {
            throw new \Exception('Class \'' . $class_name . '\' not found.');
        }                
        
        return new $class_name($params);        
    }        


    abstract public function execute();
} 

