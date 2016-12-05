<?
$CODE_SITE = \UW\Services::GetCodeSite();

$aMenuLinks = Array(
    Array(
        "Главная",
        $CODE_SITE."/index.php",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"1"),
        ""
    ),
    Array(
        "О нас",
        $CODE_SITE."/o-nas/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"1", "DEPTH_LEVEL"=>"1"),
        ""
    ),
    Array(
        "Документация",
        $CODE_SITE."/o-nas/documents/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ),
    Array(
        "Артисты",
        $CODE_SITE."/o-nas/artisty/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ),
    Array(
        "История",
        $CODE_SITE."/o-nas/history/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ),
    Array(
        "Руководство",
        $CODE_SITE."/o-nas/control/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ),
    Array(
        "Видео",
        $CODE_SITE."/o-nas/video/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ),
    Array(
        "Вакансии",
        $CODE_SITE."/o-nas/jobs/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ),
    Array(
        "Фотоотчеты",
        $CODE_SITE."/o-nas/photogal/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"2"),
        ""
    ),
    Array(
        "Афиша",
        $CODE_SITE."/afisha/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"1"),
        ""
    ),
    Array(
        "Новости",
        $CODE_SITE."/news/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"1"),
        ""
    ),
    Array(
        "Контакты",
        $CODE_SITE."/contacts/",
        Array(),
        Array("FROM_IBLOCK"=>"1","IS_PARENT"=>"", "DEPTH_LEVEL"=>"1"),
        ""
    )
);
?>