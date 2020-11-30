<?php
    
    namespace alglyzin\Json;
    
    class Json
    {
        
        /**
         * Превращаем числа с плавающей запятой в строки для предотвращения потери или искажения
         * точности при декодировании строки с помощью json_decode()
         * @param string $json
         * @return string
         */
        public static function float_safe($json)
        {
            $regexp = '/"(\s*)\:(\s*)(\-?\d+([eE][\+|\-]?\d+|\.\d+)+)(\s*[,(\s*)|\}])/';
            $json_string = preg_replace($regexp, "\"$1:$2\"$3\"$5", $json);
            
            if ($json_string === null) {
                $message = 'An error occurred when converting a json string';
                trigger_error($message, E_USER_WARNING);
                return $json;
            }
            
            return $json_string;
        }
        
    }