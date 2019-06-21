<?php
date_default_timezone_set('Asia/Manila');
/* Function for redirect
/*--------------------------------------------------------------*/
function redirect($url)
{
    if (headers_sent() === false) {
        header('Location: ' . $url, true);
    }
    exit();
}
/*--------------------------------------------------------------*/
/* Function for  Readable Make date time
/*--------------------------------------------------------------*/
function makeDate()
{
    return strftime("%Y-%m-%d %H:%M:%S", time());
}

/**
 * Save image file in public location
 *
 * @param string $tmp_image_file_name Temporary image uploaded in tmp directory
 * @param string $dir Directory of images
 * @param  string $ext for file extension
 * @param string $newFilename for custom file name
 * @return string Image file name
 */
function imageSave($tmp_image_file_name, $dir, $ext, $newFilename = null)
{
    $file_name = $newFilename ?: generateImageFileName();
    try {
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $file_name = rtrim($file_name, '.');
        $ext = '.' . ltrim($ext, '.');
        if (!move_uploaded_file($tmp_image_file_name, $dir . $file_name . $ext)) {
            return false;
        }

        return $file_name . $ext;
    } catch (Exception $e) {
        // Write error log
        Log::write('error', "upload : " . $e->getMessage());

        return false;
    }
}

/**
 * Generate image file name
 *
 * @return string MD5 hashed current timestamp with millisecond
 */
function generateImageFileName()
{
    return md5(microtime(true)) . '.';
}

function get($name, $def = '')
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $def;
}
