<?php
    class Error_Handler
    {
        //private constructor to prevent direct creation of Object
        private function __construct()
        {
            
        }
        //set user handler method for Error_Handler method
        public static function set_Handler($error_types = ERROR_TYPES)
        {
            return set_error_handler(array('Error_Handler', 'Handler'), $error_types);
        }
        //error handler method
        public static function Handler($err_No, $errStr, $errFile, $errLine)
        {
            //the first 2 elements of backtrace array are irrelevant:
            //errorHandler.GetBacktrace
            //errorHanlder.Handler
            $backtrace = Error_Handler::GetBacktrace(2);
            //error message to be displayed, logged or mailed
            $error_message = "\nERRNO:$err_No\nTEXT:$errStr".
                             "\nLOCATION:$errFile, line " .
                             "$errLine, at" .date('F j, Y, g:i a') .
                             "\nShowing backtrace:\n$backtrace\n\n";
            //Email the error details, in case SEND_ERROR_MAIL is true
            if(SEND_ERROR_MAIL == true)
                error_log($error_message, 1, ADMIN_ERROR_MAIL, "From :". SENDMAIL_FROM . "\r\nTo: ". ADMIN_ERROR_MAIL);
            //Log the error, in case LOG_ERRORS is TRUE
            if(LOG_ERRORS == true)
                error_log($error_message, 3, LOG_ERRORS_FILE);
            /**Warning don't abort execution if IS_WARNING_FATAL is false 
                *E_NOTICE and E_USER_NOTICE errors don't abort execution
            */
            if(($err_No == E_WARNING && IS_WARNING_FATAL == false)||
               ($err_No == E_NOTICE || $err_No == E_USER_ERROR))
                //if the error is nonfatal ...
            {
                //show message only if DEBUGGING is true
                if(DEBUGGING == true)
                echo '<div class = "error_box"><pre>'.$error_message.'</pre></div>';
                else
                echo SITE_GENERIC_ERROR_MESSAGE;
                //stop processing request
                exit(); 
            }
        }
        //Builds backtrace message
        public static function GetBacktrace($irrelavent_First_Entries)
        {
            $s = '';
            $MAXSTRLEN = 64;
            $trace_array = debug_backtrace();

            for($i = 0; $i<$irrelavent_First_Entries; $i++)
            {
                array_shift($trace_array);
            }
            $tabs = sizeof($trace_array) -1;
            foreach($trace_array as $arr)
            {
                $tabs -= 1;
                if(isset ($arr['class']))
                    $s .= $arr['calss']. '.';
                $args = array();
                if(!empty($arr['args']))
                {
                    foreach($arr['args'] as $v)
                    {
                        if(is_null($v))
                            $args[]='null';
                        elseif(is_array($v))
                            $args[] = 'Array[' .sizeof($v) .']';
                        elseif(is_object($v))
                            $args[] = 'Object: '.get_class($v);
                        elseif(is_bool($v))
                            $args[] =$v? 'true':'false';
                        else
                        {
                            $v = (string)@$v;
                            $str = htmlspecialchars(substr($v, 0, $MAXSTRLEN));
                            if(strlen($v)>$MAXSTRLEN)
                                $str .= '...';
                            $args[] = '"' . $str . '"';
                        }
                    }
                    $s .= $arr['function'] . '('. implode(',', $args) . ')';
                    $line = (isset($arr['line']) ? $arr['line']: 'unknown');
                    $file = (isset($arr['file']) ? $arr['file']: 'unknown');
                    $s .= sprintf('#line %4d, file: %s', $line, $file);
                    $s .= "\n";
                }
                
            }
            return $s;
        }
    }
?>