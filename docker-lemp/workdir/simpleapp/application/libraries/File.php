<?php

class File {
    public static function fileDownload($filename = '', $data = '') {
        if ($filename == '' OR $data == '') {
            return false;
        }

        if (false === strpos($filename, '.')) {
            return false;
        }

        // Grab the file extension
        $x = explode('.', $filename);
        $extension = end($x);

        // Load the mime types
        if (is_file(BASEPATH . 'helper/mimes.php')) {
            include(BASEPATH . 'helper/mimes.php');
        }

        if (!isset($mimes[$extension])) {
            $mime = 'application/octet-stream';
        } else {
            $mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
        }

        // Generate the server headers
        if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== false) {
            header('Content-Type: "' . $mime . '"');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header("Content-Transfer-Encoding: binary");
            header('Pragma: public');
            header("Content-Length: " . filesize($data));
        } else {
            header('Content-Type: "' . $mime . '"');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header("Content-Transfer-Encoding: binary");
            header('Expires: 0');
            header('Pragma: no-cache');
            header("Content-Length: " . filesize($data));
        }

        ob_clean();
        flush();
        readfile($data);
        exit;
    }

    public static function fileOutput($filename = '', $data = '') {
        if ($filename == '' OR $data == '') {
            return false;
        }

        if (false === strpos($filename, '.')) {
            return false;
        }

        // Grab the file extension
        $x = explode('.', $filename);
        $extension = end($x);

        // Load the mime types
        if (is_file(BASEPATH . 'helper/mimes.php')) {
            include(BASEPATH . 'helper/mimes.php');
        }

        if (!isset($mimes[$extension])) {
            $mime = 'application/octet-stream';
        } else {
            $mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
        }

        $mime = 'application/octet-stream';

        // Generate the server headers
        if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== false) {
            header('Content-Type: "' . $mime . '"');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header("Content-Transfer-Encoding: binary");
            header('Pragma: public');
            header("Content-Length: " . strlen($data));
        } else {
            header('Content-Type: "' . $mime . '"');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header("Content-Transfer-Encoding: binary");
            header('Expires: 0');
            header('Pragma: no-cache');
            header("Content-Length: " . strlen($data));
        }

        exit($data);
    }
}
