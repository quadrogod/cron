<?php

namespace Quadrogod\Cron;

trait CronTrait {
    
    /**
     * 
     * @return array
     */
    public static function getParams() 
    {
        if (PHP_SAPI == 'cli') {
            //
            $values = [];
            for ($i = 1; $i < $_SERVER['argc']; $i++)
            {
                if ( ! isset($_SERVER['argv'][$i]))
                {                
                        break;
                }        
                $opt = $_SERVER['argv'][$i];
                if (substr($opt, 0, 2) !== '--')
                {                
                        $values[] = $opt;
                        continue;
                }
                // Remove the "--" prefix
                $opt = substr($opt, 2);
                if (strpos($opt, '=')) {                
                    //
                    list ($opt, $value) = explode('=', $opt, 2);
                }
                else {
                    $value = NULL;
                }
                //
                $values[$opt] = $value;                
            }            
            $options = $values;        
        } else {
            $options = $_GET;
        }
        //
        return $options;
    }
    
    public static function write($text = []) {
        //
        $isCli = boolval(PHP_SAPI == 'cli');
        
        if (!empty($text) && is_array($text)) {
            foreach ($text as $k=>$v) {
                if ($isCli) {
                    fwrite(STDOUT, $v.PHP_EOL);
                } else {
                    echo $v . nl2br("\r\n");
                }
            }
        } elseif (!empty($text) && is_string($text)) {
            if ($isCli) {
                fwrite(STDOUT, $text.PHP_EOL);
            } else {
                echo $text . nl2br("\r\n");   
            }
        }
    }
    
}
