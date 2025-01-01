<?php

add_action('rest_api_init', 'tomcRegisterSettingsRoute');

function tomcRegisterSettingsRoute(){
    register_rest_route('tomcReaderSettings/v1', 'getReaderSettings', array(
        'methods' => 'GET',
        'callback' => 'getReaderSettings'
    ));
    register_rest_route('tomcReaderSettings/v1', 'saveLanguageSettings', array(
        'methods' => 'POST',
        'callback' => 'saveReaderLanguages'
    ));
    register_rest_route('tomcReaderSettings/v1', 'saveTriggerSettings', array(
        'methods' => 'POST',
        'callback' => 'saveReaderTriggers'
    ));
}

function getReaderSettings(){
    global $wpdb;
    $cw_table = $wpdb->prefix .  "tomc_content_warnings";
    $reader_triggers_table = $wpdb->prefix . "tomc_reader_triggers";
    $languages_table = $wpdb->prefix .  "tomc_publication_languages";
    $reader_languages_table = $wpdb->prefix . "tomc_reader_languages";
    // $user = wp_get_current_user();
    // $userid = get_current_user_id();
    $user = wp_get_current_user();
    $userId = $user->ID;
    $triggerQuery = 'WITH cte AS (SELECT triggerid FROM %i WHERE readerid = %d)
    SELECT a.id, a.warning_name, b.triggerid, "trigger" as "settingtype"
    FROM %i a
    LEFT JOIN cte b ON a.id = b.triggerid';
    $triggerResults = $wpdb->get_results($wpdb->prepare($triggerQuery, $reader_triggers_table, $userId, $cw_table), ARRAY_A);
    $languageQuery = 'WITH cte AS (SELECT languageid FROM %i WHERE readerid = %d)
    SELECT a.id, a.language_name, b.languageid, "language" as "settingtype"
    FROM %i a
    LEFT JOIN cte b ON a.id = b.languageid';
    $languageResults = $wpdb->get_results($wpdb->prepare($languageQuery, $reader_languages_table, $userId, $languages_table), ARRAY_A);
    return array_merge($triggerResults, $languageResults);
}

function saveReaderTriggers($data){
    $triggers = explode(',', trim(sanitize_text_field($data['triggers']), '[]'));
    $now = date('Y-m-d H:i:s');
    // $user = wp_get_current_user();
    // $userid = get_current_user_id();
    $user = wp_get_current_user();
    $userid = $user->ID;
    global $wpdb;
    $reader_triggers_table = $wpdb->prefix . "tomc_reader_triggers";
    if (is_user_logged_in()){
        $wpdb->delete(
            $reader_triggers_table,
            array('readerid' => $userid));
        $query = 'insert into ' . $reader_triggers_table . '(readerid, triggerid, createdate) values ';
        for($i = 0; $i < count($triggers); $i++){
            if($i == 0){
                $values = '(' . $userid . ', ' . $triggers[$i] . ', "' . $now . '")';                        
            }else{
                $values = ', (' . $userid . ', ' . $triggers[$i] . ', "' . $now . '")';  
            }
            $query .= $values;
        }
        $query .= ';';
        $wpdb->query($wpdb->prepare($query));
        return 'success';
    } else {
        wp_safe_redirect(site_url('/my-account'));
        return 'fail';
    }
}

function saveReaderLanguages($data){
    $languages = explode(',', trim(sanitize_text_field($data['languages']), '[]'));
    $now = date('Y-m-d H:i:s');
    // $user = wp_get_current_user();
    // $userid = get_current_user_id();
    $user = wp_get_current_user();
    $userId = $user->ID;
    global $wpdb;
    $reader_languages_table = $wpdb->prefix . "tomc_reader_languages";
    if (is_user_logged_in()){
        $wpdb->delete(
            $reader_languages_table,
            array('readerid' => $userid));
        $query = 'insert into ' . $reader_languages_table . '(readerid, languageid, createdate) values ';
        for($i = 0; $i < count($languages); $i++){
            if($i == 0){
                $values = '(' . $userid . ', ' . $languages[$i] . ', "' . $now . '")';                        
            }else{
                $values = ', (' . $userid . ', ' . $languages[$i] . ', "' . $now . '")';  
            }
            $query .= $values;
        }
        $query .= ';';
        $wpdb->query($wpdb->prepare($query));
        return $query;
    } else {
        wp_safe_redirect(site_url('/my-account'));
        return 'fail';
    }
}
