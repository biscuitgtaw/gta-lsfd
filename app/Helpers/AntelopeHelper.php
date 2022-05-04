<?php

if (!function_exists('config_trans')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function config_trans(string $string)
    {
        return __(config($string));
    }
}

if (!function_exists('fetch_config')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function fetch_config(string $string) {
        $array = [];
        $string_unprocessed = config($string);

        foreach($string_unprocessed as $string_key => $string_value) {
            $key_selector = $string_key;
            foreach($string_value as $key => $value) {
                $array[$string.'.'.$key_selector.'.'.$key] = config_trans($string.'.'.$key_selector.'.'.$key);
            }
        }

        return $array;
    }
}
