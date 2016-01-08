<?php
global $jw_googlefonts;
$twWebinkFonts=array();
if(function_exists('getProject')&&  function_exists('getProjectFonts')){
    $jw_webink_projects = getProject('','');
    foreach ($jw_webink_projects as $jw_webink_project){
        $jw_webink_projectfonts = getProjectFonts('',$jw_webink_project->GUID);
        if($jw_webink_projectfonts){
            foreach($jw_webink_projectfonts as $jw_webink_font){
                 $twWebinkFonts[$jw_webink_font->PSName]=$jw_webink_font->Name;
            }
        }
    }
}
$jw_googlefonts=array_merge($twWebinkFonts, $jw_googlefonts);