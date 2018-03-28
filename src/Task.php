<?php

namespace Quadrogod\Cron;

abstract class Task {
    
    use \Quadrogod\Helpers\InputTrait;
        
    private $action = '';

    public function __construct($params = []) 
    {              
        $this->action = 'action_' . (( !empty($params['action']) ) ? mb_strtolower($params['action']) : 'default' );
        $this->inputParams = $this->inputParams + (is_array($params) && count($params)) ? $params : []; 
		
        if ( ! method_exists($this, $this->action)) {
            throw new \Exception('Action \'' . $this->action . '\' NOT declared in Class \'' . static::class . '\'');
        }
        
        return $this;
    }        

    abstract public function action_default();
    
    public function execute() 
    {        
        return $this->{$this->action}();
    }
}