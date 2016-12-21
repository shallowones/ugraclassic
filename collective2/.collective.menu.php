<?
$CODE_SITE = \UW\Services::GetCodeSite();

$ibEventsID 		= 	\UW\IBBase::getIBIdByCode("events_collective");
$ibNewsID 			= 	\UW\IBBase::getIBIdByCode("news_collective");
$ibPhotogalID		=	\UW\IBBase::getIBIdByCode("photogal_collective");
$ibArtistyID		=	\UW\IBBase::getIBIdByCode("artisty_collective");
$ibVideoID			=	\UW\IBBase::getIBIdByCode("online_collective");
$ibJobsID			=	\UW\IBBase::getIBIdByCode("jobs_collective");
$ibHistoryID		=	\UW\IBBase::getIBIdByCode("history_collective");
$ibContactsID		=	\UW\IBBase::getIBIdByCode("contacts_collective");
$ibDocumentsID		=	\UW\IBBase::getIBIdByCode("documents_visits");
$ibControlID 		= 	\UW\IBBase::getIBIdByCode("peoples_visits");

$SiteID    = \UW\Services::GetSiteParam('ID');


$boolDocuments = \UW\Services::IsSectionVis($ibDocumentsID, $SiteID);
$boolArtisty = \UW\Services::IsSectionVis($ibArtistyID, $SiteID);
$boolHistory = \UW\Services::IsSectionVis($ibHistoryID, $SiteID);
$boolControl = \UW\Services::IsSectionVis($ibControlID, $SiteID);
$boolVideo = \UW\Services::IsSectionVis($ibVideoID, $SiteID);
$boolJobs = \UW\Services::IsSectionVis($ibJobsID, $SiteID);
$boolPhotogal = \UW\Services::IsSectionVis($ibPhotogalID, $SiteID);

$boolOnas = $boolDocuments || $boolArtisty || $boolHistory ||
    $boolControl || $boolVideo || $boolJobs || $boolPhotogal;

$aMenuLinks = [];
$aMenuLinks[] = [
        "Главная",
        $CODE_SITE."/index.php",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"1"),
        ""
];
if($boolOnas)
{
    $aMenuLinks[] = [
        "О нас",
        "#",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"1", "DEPTH_LEVEL"=>"1"),
        ""
    ];
}
if($boolDocuments)
{
    $aMenuLinks[] = [
        "Документация",
        $CODE_SITE."/o-nas/documents/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ];
}
if($boolArtisty)
{
    $aMenuLinks[] = [
        "Артисты",
        $CODE_SITE."/o-nas/artisty/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ];
}
if($boolHistory)
{
    $aMenuLinks[] = [
        "История",
        $CODE_SITE."/o-nas/history/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ];
}
if($boolControl)
{
    $aMenuLinks[] = [
        "Руководство",
        $CODE_SITE."/o-nas/control/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ];
}
if($boolVideo)
{
    $aMenuLinks[] = [
        "Видео",
        $CODE_SITE."/o-nas/video/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ];
}
if($boolJobs)
{
    $aMenuLinks[] = [
        "Вакансии",
        $CODE_SITE."/o-nas/jobs/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ];
}
if($boolPhotogal)
{
    $aMenuLinks[] = [
        "Фотоотчеты",
        $CODE_SITE."/o-nas/photogal/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ];
}
if(\UW\Services::IsSectionVis($ibEventsID, $SiteID))
{
    $aMenuLinks[] = [
        "Афиша",
        $CODE_SITE."/afisha/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"1"),
        ""
    ];
}
if(\UW\Services::IsSectionVis($ibNewsID, $SiteID))
{
    $aMenuLinks[] = [
        "Новости",
        $CODE_SITE."/news/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"1"),
        ""
    ];
}
if(\UW\Services::IsSectionVis($ibContactsID, $SiteID))
{
    $aMenuLinks[] = [
        "Контакты",
        $CODE_SITE."/contacts/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"1"),
        ""
    ];
}
?>