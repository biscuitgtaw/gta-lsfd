<?php

/*
|------------------------------------------------------------------------------------
|                            ANTELOPE.IO CONSTANTS FILES
|------------------------------------------------------------------------------------
|
|	 -- READ THIS, IT'S IMPORTANT
|
|    This constants file is the heart of the entire application, here you can modify
|    pretty much the entire website through one file. Through this file you are also
|	 able to disable the default Antelope.io modules if you wish to recreate your
|    own through the use of plugins.
|
|    Global Constants:
|    The global constants are a series of variables that control the website. You
|    are able to edit all global constants through this file (excluding enviroment
|    constants).
|
|    Enviroment Constants:
|    These constants can be edited through the .env file and should not be edited
|    within this file, enviroment constants will be marked with the following text:
|    [@ENV]
|
|    Array Constants:
|    This is what I like to call "construction" constants and where you are able to
|    add, modify and remove ranks as an example, follow instructions for each
|    constant as each have their own rules.
|
|-----------------------------------------------------------------------------------
|                             ANTELOPE.IO LICENSE INFO
|-----------------------------------------------------------------------------------
|
|    MIT License
|
|    Copyright (c) 2020 Antelope.io
|
|    Permission is hereby granted, free of charge, to any person obtaining a copy
|    of this software and associated documentation files (the "Software"), to deal
|    in the Software without restriction, including without limitation the rights
|    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
|    copies of the Software, and to permit persons to whom the Software is
|    furnished to do so, subject to the following conditions:
|
|    The above copyright notice and this permission notice shall be included in all
|    copies or substantial portions of the Software.
|
|    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
|    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
|    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
|    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
|    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
|    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
|    SOFTWARE.
|
*/

/*
|--------------------------------------------------------------------------
| Main Website constants [@ENV]
| ------------------------
| ! THESE CONSTANTS ARE ALL ENVIROMENT CONSANTS AND CAN BE EDITED THROUGH
| THE .ENV FILE - EDITING IT HERE WILL NOT DO ANYTHING !
| + Here you can change and edit stuff such as the website name, footer
| information and other general website stuff.
|--------------------------------------------------------------------------
|
*/

define("APPLICATION_NAME", env('APP_NAME', 'Antelope'));
define("APPLICATION_SUB_NAME", env('APP_SUB_NAME', 'Antelope'));
define("APPLICATION_FULL_NAME", env('APP_FULL_NAME', 'Antelope.io'));
define("COMMUNITY_NAME", env('COMMUNITY_NAME', 'The Best Community'));
define("COMMUNITY_DISCORD", env('COMMUNITY_DISCORD', 'https://discord.gg/'));
define("APP_VERSION", '1.0.0');

return [

    /*
    |--------------------------------------------------------------------------
    | Incident Prefixing
    | ------------------------
    | + Here you can modify the naming prefix for incidents, the actual
    | display language can be found in the language files.
    |--------------------------------------------------------------------------
    |
    */

    'incidents' => [
        'status' => [
            1 => 'incidents.unresolved',
            2 => 'incidents.resolved',
            99 => 'incidents.unknown',
        ],

        'severeness' => [
            1 => 'incidents.lvl1',
            2 => 'incidents.lvl2',
            3 => 'incidents.lvl3',
            99 => 'incidents.other',
        ],

        'report' => [
            1 => 'incidents.emergency_call',
            2 => 'incidents.department_report',
            3 => 'incidents.event',
            99 => 'incidents.other',
        ],

        'type' => [
            1 => 'incidents.medical_emergency',
            2 => 'incidents.fire_rescue_emergency',
            3 => 'incidents.technical_emergency',
            4 => 'incidents.hazardous_materials_emergency',
            5 => 'incidents.department_operation',
            98 => 'incidents.unknown_emergency',
            99 => 'incidents.other_emergency',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Incident Coloring
    | ------------------------
    | + Here you can modify the colors for incidents.
    |--------------------------------------------------------------------------
    |
    */

    'incident_colors' => [
        'status' => [
            1 => 'warning',
            2 => 'success',
            99 => 'secondary',
        ],

        'severeness' => [
            1 => 'success',
            2 => 'warning',
            3 => 'danger',
            99 => 'info',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Map Configuration
    | ------------------------
    | + Here you can modify the icons for incidents and colors for incident
    | markers.
    |
    | Marker Colors: 'red', 'darkred', 'orange', 'green', 'darkgreen', 'blue', 
    | 'purple', 'darkpurple', 'cadetblue'
    |
    | Icons: Only Font Awesome Solid icons are supported. fas fa prefix
    | is already applied.
    |--------------------------------------------------------------------------
    |
    */

    'map_config' => [
        'severeness_marker_color' => [
            1 => 'green',
            2 => 'orange',
            3 => 'darkred',
            99 => 'blue',
        ],

        'type_marker_icon' => [
            1 => 'briefcase-medical',
            2 => 'fire',
            3 => 'wrench',
            4 => 'biohazard',
            5 => 'tower-observation',
            98 => 'question',
            99 => 'fire-extinguisher',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Site Permissions
    | ------------------------
    | + Don't edit this if you don't know what you're doing, this is the list
    | of all permissions on the site, it is ran during the installation script
    |--------------------------------------------------------------------------
    |
    */

    'site_permissions' => [
        'get_superadmin_tab',
        'get_admin_tab',
        'get_incident_reporter_tab',
        'view_user_management',
        'view_rank_management',
        'create_user',
        'edit_user',
        'create_rank',
        'edit_rank',
        'view_incident_details',
        'view_incident_timeline',
        'view_universe_settings',
        'edit_own_profile',
        'edit_own_password',
        'view_incident_center',
        'view_incident_manager_panel',
        'create_incident',
        'edit_incident',
        'manage_incident_timeline',
    ],
];
