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