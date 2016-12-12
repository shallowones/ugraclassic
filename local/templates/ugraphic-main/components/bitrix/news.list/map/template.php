<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<? if (!empty($arResult['ITEMS'])): ?>
    <a name="items"></a>
    <div class="timetable-block">
        <h2 class="h2">Расписание</h2>
        <ul class="timetable">
            <? foreach ($arResult['ITEMS'] as $arItem): ?>
                <li class="timetable__item">
                    <a href="<? echo $arItem['DETAIL_PAGE_URL'] ?>">
                        <? if (!empty($arItem['PREVIEW_PICTURE']['SRC'])): ?>
                            <div class="t-img">
                                <img src="<? echo $arItem['PREVIEW_PICTURE']['SRC'] ?>">
                            </div>
                        <? endif; ?>
                        <div class="executor"><? echo $arItem['SECTION']['NAME'] ?></div>
                        <div class="t-name"><? echo $arItem['NAME'] ?></div>
                        <div class="t-desc">
                            <? if (!empty($arItem['D-PLACE'])): ?>
                                <div class="d-place"><? echo $arItem['D-PLACE'] ?></div>
                            <? endif; ?>
                            <? if (!empty($arItem['PROPERTIES']['age']['VALUE'])): ?>
                                <div class="age"><? echo $arItem['PROPERTIES']['age']['VALUE'] ?></div>
                            <? endif; ?>
                        </div>
                    </a>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
<? endif; ?>


<div id="title">
    <img src="images/ecctitle.png" width="640" height="158"></div>
<map name="Navigation">
    <area shape="poly" coords="113,24,211,24,233,0,137,0" href="inform.html" alt="Информация">
    <area shape="poly" coords="210,24,233,0,329,0,307,24" href="activity.html" alt="Мероприятия">
    <area shape="poly" coords="304,24,385,24,407,0,329,0" href="depart.html" alt="Отделения">
    <area shape="poly" coords="384,24,449,24,473,0,406,0" href="techinfo.html" alt="Техническая информация">
    <area shape="poly" coords="449,24,501,24,525,0,473,0" href="study.html" alt="Обучение">
    <area shape="poly" coords="501,24,560,24,583,0,525,0" href="work.html" alt="Работа">
    <area shape="poly" coords="560,24,615,24,639,0,585,0" href="misk.html" alt="Разное">
</map>
