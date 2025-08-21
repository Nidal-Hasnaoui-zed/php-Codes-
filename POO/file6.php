<?php 
    // constant class : self method
    class GoodBye{
        const Message = 'Good my mother see u after my succes if god wnat !'; 
        public function print_message(){
            echo self::Message; 
        }
    }
    $good_bye = new GoodBye(); 
    $good_bye->print_message() ; 
    
    echo '<br>'; 

    class Gooodbye{
        const Messages = 'Bye Bye Wessal !';
        
    }
    echo Gooodbye::Messages;
?>