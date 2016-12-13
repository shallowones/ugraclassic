<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Добавление новой области");

if (!$USER->IsAdmin()) LocalRedirect('/');

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs($APPLICATION->GetCurDir() . '/common.js');
Asset::getInstance()->addJs($APPLICATION->GetCurDir() . '/scripts.js');
Asset::getInstance()->addCss($APPLICATION->GetCurDir() . '/styles.css');
?>

<div class="preview" id="preview">
    <div class="inner" id="draw">
        <canvas id="canvas"></canvas>
        <img src="<? echo SITE_TEMPLATE_PATH . '/img/content/30.png' ?>" width="598" height="358" class="map-img">
        <div class="points" id="points"></div>
    </div>
</div>

<div class="bar" id="bar"></div>

<div class="info" id="info"></div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
