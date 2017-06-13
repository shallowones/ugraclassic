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

    <ul>
        <? foreach ($arResult['FILTER_YEARS'] as $arYear): ?>
            <li>
                <a href="<? echo $arYear['LINK'] ?>"><? echo $arYear['NAME'] ?><? echo ($arYear['ACTIVE']) ? '+' : '' ?></a>
            </li>
        <? endforeach; ?>
    </ul>

    <div>
        <? foreach ($arResult['ITEMS'] as $arItem): ?>
            <? if ($arItem['LINK']): ?>
                <a href="<? echo $arItem['LINK'] ?>"<? echo (!$arItem['IS_INNER']) ? ' target="_blank"' : '' ?>><? echo $arItem['NAME'] ?></a>
                <br>
            <? else: ?>
                <span><? echo $arItem['NAME'] ?></span><br>
            <? endif; ?>
        <? endforeach; ?>
    </div>

<? echo ($arResult['NAV_STRING']) ? $arResult['NAV_STRING'] : '' ?>