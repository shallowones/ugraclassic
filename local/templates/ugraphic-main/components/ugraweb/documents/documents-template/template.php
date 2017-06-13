<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
$this->setFrameMode(true);
?>

    <div class="filter-years">
        <div class="categories">
            <? foreach ($arResult['FILTER_YEARS'] as $arYear): ?>
                <a href="<? echo $arYear['LINK'] ?>"
                   class="categories__item<? echo ($arYear['ACTIVE']) ? ' cat-active' : '' ?>">
                    <? echo $arYear['NAME'] ?>
                </a>
            <? endforeach; ?>
        </div>
    </div>

    <br><br>

<? if ($arResult['ITEMS']): ?>
    <ul class="documents">
        <? foreach ($arResult['ITEMS'] as $arItem): ?>
            <li class="documents__item">
                <a href="<? echo $arItem['LINK'] ?>">
                    <div class="doc-format"><? echo $arItem['FILE_TYPE'] ?></div>
                    <div class="description">
                        <div class="doc-name"><? echo $arItem['NAME'] ?></div>
                        <? if ($arItem['FILE_SIZE']): ?>
                            <div class="doc-size">(<? echo $arItem['FILE_SIZE'] ?>)</div>
                        <? endif; ?>
                    </div>
                </a>
            </li>
        <? endforeach; ?>
    </ul>
<? else: ?>
    <p>Нет подходящих элементов. Измените параметры фильтрации.</p>
<? endif; ?>


<? if ($arParams['BACK_URL']): ?>
    <br><a href="<? echo $arParams['BACK_URL'] ?>">НАЗАД</a><br><br>
<? endif; ?>

<? echo ($arResult['NAV_STRING']) ? $arResult['NAV_STRING'] : '' ?>