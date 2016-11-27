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

<form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" method="get" action="<? echo $arResult["FORM_ACTION"] ?>"
      enctype="multipart/form-data" class="filter-form">
    <div class="first-line">
        <div class="label-name">Категория:</div>
        <ul class="categories" id="sections">
            <li class="categories__item cat-active" id="cat-all">
                Все
                <input type="hidden" value="" name="sections" title="">
            </li>
            <? foreach ($arResult['SECTIONS'] as $arSection): ?>
                <li class="categories__item" value="<? echo $arSection['ID'] ?>">
                    <? echo $arSection['NAME'] ?>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
    <div class="second-line">
        <div class="label-name">Дата:</div>
        <ul class="dates">
            <li class="dates__item">
                <input type="text" value="" name="date_start" id="date_start" title="">
            </li>
            <li class="dates__item">
                <input type="text" value="" name="date_end" id="date_end" title="">
            </li>
        </ul>
        <ul class="categories" id="months">
            <? foreach ($arResult['MONTHS'] as $arMonth): ?>
                <li class="categories__item" value="<? echo $arMonth['DATE'] ?>">
                    <? echo $arMonth['NAME'] ?>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
    <div class="filter-buttons">
        <div class="confirm">
            <input type="submit" name="set_filter" value="Применить">
        </div>
        <div class="reset"><a href="javascript:void(0)">Сбросить фильтр</a></div>
    </div>
</form>