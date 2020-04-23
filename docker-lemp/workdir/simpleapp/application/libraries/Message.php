<?php

class Message {

    private static $msgTypes = array('help', 'info', 'warning', 'success', 'error');
    private static $msgWrapper = "<div class=\"alert alert-%s\"><button class=\"close\" data-dismiss=\"alert\"></button>\n%s</div>\n";
    private static $msgBefore = '';
    private static $msgAfter = '';

    public static function add($type, $message, $redirect_to = null) {
        //Session::init();
        if (!array_key_exists('flash_messages', $_SESSION)){
            $_SESSION['flash_messages'] = array();
        }
            
        if (!isset($_SESSION['flash_messages'])){
            return false;
        }

        if (!isset($type) || !isset($message[0])){
            return false;
        }

        if (strlen(trim($type)) == 1) {
            $type = str_replace(array('h', 'i', 'w', 'e', 's'), array('help', 'info', 'warning', 'error', 'success'), $type);
        } else if ($type == 'information') {
            $type = 'info';
        }

        // Make sure it's a valid message type
        if (!in_array($type, self::$msgTypes)){
            die('"' . strip_tags($type) . '" is not a valid message type!');
        }
        
        // If the session array doesn't exist, create it
        if (!array_key_exists($type, $_SESSION['flash_messages'])){
            $_SESSION['flash_messages'][$type] = array();
        }

        $_SESSION['flash_messages'][$type][] = $message;

        if(empty($redirect_to)){
            return;
        }

        if ($redirect_to == 'back') {
            echo '<script type="text/javascript">history.go(-1);</script>';
        } else if ($redirect_to == 'now') {
            header("location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            if (headers_sent()) {
                echo "<script>document.location.href='$redirect_to';</script>\n";
            } else {    
                @ob_end_clean();
                header('HTTP/1.1 301 Moved Permanently');
                header("Location: " . $redirect_to);
                exit();
            }
        }
    }

    public static function display($type = 'all', $print = false) {
        $messages = '';
        $data = '';

        if (!isset($_SESSION['flash_messages'])){
            return false;
        }

        if ($type == 'g' || $type == 'growl') {
            //$this->displayGrowlMessages();
            return true;
        }

        // Print a certain type of message?
        if (in_array($type, self::$msgTypes)) {
            foreach ($_SESSION['flash_messages'][$type] as $msg) {
                $messages .= self::$msgBefore . $msg . self::$msgAfter;
            }

            $data .= sprintf(self::$msgWrapper, $type, $messages);

            // Clear the viewed messages
            self::clear($type);

            // Print ALL queued messages
        } else if ($type == 'all') {
            foreach ($_SESSION['flash_messages'] as $type => $msgArray) {
                $messages = '';
                foreach ($msgArray as $msg) {
                    $messages .= self::$msgBefore . $msg . self::$msgAfter;
                }
                $data .= sprintf(self::$msgWrapper, $type, $messages);
            }

            // Clear ALL of the messages
            self::clear();

            // Invalid Message Type?
        } else {
            return false;
        }

        // Print everything to the screen or return the data
        if ($print) {
            echo $data;
        } else {
            return $data;
        }
    }

    /**
     * Check to  see if there are any queued error messages
     * 
     * @return bool  true  = There ARE error messages
     *               false = There are NOT any error messages
     * 
     */
    public function hasErrors() {
        return empty($_SESSION['flash_messages']['error']) ? false : true;
    }

    /**
     * Check to see if there are any ($type) messages queued
     * 
     * @param  string   $type     The type of messages to check for
     * @return bool               
     * 
     */
    public function hasMessages($type = null) {
        if (!is_null($type)) {
            if (!empty($_SESSION['flash_messages'][$type]))
                return $_SESSION['flash_messages'][$type];
        } else {
            foreach (self::$msgTypes as $type) {
                if (!empty($_SESSION['flash_messages']))
                    return true;
            }
        }
        return false;
    }

    /**
     * Clear messages from the session data
     * 
     * @param  string   $type     The type of messages to clear
     * @return bool 
     * 
     */
    public static function clear($type = 'all') {
        if ($type == 'all') {
            unset($_SESSION['flash_messages']);
        } else {
            unset($_SESSION['flash_messages'][$type]);
        }
        return true;
    }

    public function __toString() {
        return self::hasMessages();
    }

}
