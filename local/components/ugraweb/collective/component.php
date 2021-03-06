<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
\CModule::IncludeModule('iblock');
/*$arU = array();
\UW\UserHelper::addUserProfileCast($arU);*/

$arDefaultUrlTemplates404 = array(
    "nf_404" => "",
    'index' => '',
    "collective" => "#COLL_CODE#/",
    "news" => "#COLL_CODE#/news/",
    "control" => "#COLL_CODE#/o-nas/control/",
    "news_detail" => "#COLL_CODE#/news/#ELEMENT_ID#/",
    "control_detail" => "#COLL_CODE#/o-nas/control/#ELEMENT_ID#/",
    "afisha" => "#COLL_CODE#/afisha/",
    "afisha_archive" => "#COLL_CODE#/afisha_archive/",
    "afisha_detail" => "#COLL_CODE#/afisha/#ELEMENT_ID#/",
    "search" => "#COLL_CODE#/search/",
    "o_nas" => "#COLL_CODE#/o-nas/",
    "jobs" => "#COLL_CODE#/o-nas/jobs/",
    "photogal" => "#COLL_CODE#/o-nas/photogal/",
    "history" => "#COLL_CODE#/o-nas/history/",
    "contacts" => "#COLL_CODE#/contacts/",
    "photogal_detail" => "#COLL_CODE#/o-nas/photogal/#ELEMENT_ID#/",
    "artisty" => "#COLL_CODE#/o-nas/artisty/",
    "documents" => "#COLL_CODE#/o-nas/documents/",
    "artisty_detail" => "#COLL_CODE#/o-nas/artisty/#ELEMENT_ID#/",
    "video" => "#COLL_CODE#/o-nas/video/",
    "video_detail" => "#COLL_CODE#/o-nas/video/#ELEMENT_ID#/",
    "login" => "login/",
    "photos_detail" => "#USER_ID#/photos/#SECTION_ID#/",
    "posts_add" => "#USER_ID#/posts/add/",
    "posts_draft" => "#USER_ID#/posts/draft/",
    "posts_detail" => "#USER_ID#/posts/#POST_ID#/",
    "posts_edit" => "#USER_ID#/posts/#POST_ID#/edit/",
    "messages_detail" => "#USER_ID#/messages/#DIALOG_ID#/",
);

$arDefaultVariableAliases404 = array();

$arDefaultVariableAliases = array(

);

$arComponentVariables = array(
    "COLL_CODE",
);

if($arParams["SEF_MODE"] == "Y")
{
    $arVariables = array();

    $arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates404, $arParams["SEF_URL_TEMPLATES"]);
    $arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases404, $arParams["VARIABLE_ALIASES"]);
    
    $engine = new CComponentEngine($this);
    /*
    if (CModule::IncludeModule('iblock'))
    {
        $engine->addGreedyPart("#SECTION_CODE_PATH#");
        $engine->setResolveCallback(array("CIBlockFindTools", "resolveComponentEngine"));
    }
    */
    $componentPage = $engine->guessComponentPath(
        $arParams["SEF_FOLDER"],
        $arUrlTemplates,
        $arVariables
    );

    $b404 = false;
    if(!$componentPage || $componentPage == 'nf_404')
    {
        $componentPage = "nf_404";
        $b404 = true;
    }


    if($b404 && $arParams["SET_STATUS_404"]==="Y")
    {
        $folder404 = str_replace("\\", "/", $arParams["SEF_FOLDER"]);
        if ($folder404 != "/")
            $folder404 = "/".trim($folder404, "/ \t\n\r\0\x0B")."/";
        if (substr($folder404, -1) == "/")
            $folder404 .= "index.php";

            if($folder404 != $APPLICATION->GetCurPage(true))
            CHTTP::SetStatus("404 Not Found");
    }
    
    
    CComponentEngine::InitComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);

    $arResult = array(
        "FOLDER" => $arParams["SEF_FOLDER"],
        "URL_TEMPLATES" => $arUrlTemplates,
        "VARIABLES" => $arVariables,
        "ALIASES" => $arVariableAliases,
    );
}
//echo '######'.$componentPage;
$this->IncludeComponentTemplate($componentPage);

?>