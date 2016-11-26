<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Документы");
?>
    <div class="filter-years">
        <ul class="categories">
            <li class="categories__item cat-active">
               2016
                <input type="hidden" value="" name="YEAR" title="">
            </li>
            <li class="categories__item">
                2015
                <input type="hidden" value="" name="YEAR" title="">
            </li>
            <li class="categories__item">
                2014
                <input type="hidden" value="" name="YEAR" title="">
            </li>
            <li class="categories__item">
                2013
                <input type="hidden" value="" name="YEAR" title="">
            </li>
            <li class="categories__item">
                2012
                <input type="hidden" value="" name="YEAR" title="">
            </li>
            <li class="categories__item">
                2011
                <input type="hidden" value="" name="YEAR" title="">
            </li>
        </ul>
    </div>
<br><br>
    <ul class="documents">
        <li class="documents__item">
            <a href="#">
            <div class="doc-format">W</div>
            <div class="description">
                <div class="doc-name">Положение о смотр-фестивале детско юношеского творчества Большая Перемена</div>
                <div class="doc-size">(30 кб)</div>
            </div>
            </a>
        </li>
        <li class="documents__item">
            <a href="#">
            <div class="doc-format">X</div>
            <div class="description">
                <div class="doc-name">Правила обмена подарками и знаками делового гостеприимства</div>
                <div class="doc-size">(20 кб)</div>
            </div>
            </a>
        </li>
        <li class="documents__item">
            <a href="#">
            <div class="doc-format">pdf</div>
            <div class="description">
                <div class="doc-name">Правила обмена подарками и знаками делового гостеприимства</div>
                <div class="doc-size">(10 кб)</div>
            </div>
            </a>
        </li>
    </ul>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>