<?php
/**
 * Get value from GET variable or return default value.
 *
 * @param string $key     to look for
 * @param mixed  $default value to set if key does not exists
 *
 * @return mixed value from GET or the default value
 */
function getGet($key, $default = null)
{
    return isset($_GET[$key])
        ? $_GET[$key]
        : $default;
}



/**
 * Get value from POST variable or return default value.
 *
 * @param mixed $key     to look for, or value array
 * @param mixed $default value to set if key does not exists
 *
 * @return mixed value from POST or the default value
 */
function getPost($key, $default = null)
{
    if (is_array($key)) {
        // $key = array_flip($key);
        // return array_replace($key, array_intersect_key($_POST, $key));
        foreach ($key as $val) {
            $post[$val] = getPost($val);
        }
        return $post;
    }

    return isset($_POST[$key])
        ? $_POST[$key]
        : $default;
}



/**
 * Check if key is set in POST.
 *
 * @param mixed $key     to look for
 *
 * @return boolean true if key is set, otherwise false
 */
function hasKeyPost($key)
{
    return array_key_exists($key, $_POST);
}



/**
 * Sanitize value for output in view.
 *
 * @param string $value to sanitize
 *
 * @return string beeing sanitized
 */
function esc($value)
{
    return htmlentities($value);
}



/**
 * Create a slug of a string, to be used as url.
 *
 * @param string $str the string to format as slug.
 * 
 * @return str the formatted slug.
 */
function slugify($str)
{
    $str = mb_strtolower(trim($str));
    $str = str_replace(['å','ä'], 'a', $str);
    $str = str_replace('ö', 'o', $str);
    $str = preg_replace('/[^a-z0-9-]/', '-', $str);
    $str = trim(preg_replace('/-+/', '-', $str), '-');
    return $str;
}
