<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Если не мой профиль
if(!$arResult['MyProfile']) {
	// определяем группу прошедших модерацию анкет
	$rsGroups = CGroup::GetList(($field = "c_sort"), ($f_order = "desc"), Array("STRING_ID" => 'user_moder'));
	if ($arGroup = $rsGroups->Fetch()) {
		// проверяем активирована ли анкета
		$CurUser = \CUser::GetID();
		$rsU = CUser::GetList(
			($by = 'id'), ($order = 'asc'),
			array('ID' => $arResult['VARIABLES']['USER_ID'], 'GROUPS_ID' => array($arGroup['ID'])),
			array('FIELDS' => array('ID'))
		);
		if(!$arU = $rsU->Fetch())
			LocalRedirect('/profile/'.$CurUser.'/posts/');
	}
}

if(\UW\UserHelper::isModerator())
    $ProfileBlock = false;
else
    $ProfileBlock = \UW\RegisteredUser::CheckBlackList($arResult['VARIABLES']['USER_ID'], $arResult['CURRENT_USER']);
?>

<?if(((!$ProfileBlock && !$arResult['MyProfile']) || $arResult['MyProfile'])) {
$GLOBALS['draftFilter'] = Array("ACTIVE" => "N", "PROPERTY_AUTHOR_ID" => $arResult['VARIABLES']['USER_ID']);
$APPLICATION->IncludeComponent("bitrix:news.list", "draft", Array(
    "DISPLAY_DATE" => "Y",	// Выводить дату элемента
    "DISPLAY_NAME" => "Y",	// Выводить название элемента
    "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
    "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
    "AJAX_MODE" => "N",	// Включить режим AJAX
    "IBLOCK_TYPE" => "lists",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" => "1",	// Код информационного блока
    "NEWS_COUNT" => "2",	// Количество новостей на странице
    "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
    "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
    "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
    "FILTER_NAME" => "draftFilter",	// Фильтр
    "FIELD_CODE" => array(	// Поля
        0 => "",
        1 => "",
    ),
    "PROPERTY_CODE" => array(	// Свойства
        0 => "AUTHOR_ID",
        1 => "LIKE",
        2 => "",
    ),
    "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
    "SET_TITLE" => "N",	// Устанавливать заголовок страницы
    "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
    "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
    "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
    "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
    "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
    "PARENT_SECTION" => "",	// ID раздела
    "PARENT_SECTION_CODE" => "",	// Код раздела
    "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CACHE_TIME" => "86400",	// Время кеширования (сек.)
    "CACHE_NOTES" => "",
    "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
    "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
    "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
    "PAGER_TITLE" => "Новости",	// Название категорий
    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
    "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
    "SET_STATUS_404" => "N",	// Устанавливать статус 404
    "SHOW_404" => "N",	// Показ специальной страницы
    "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
    "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
    "COMPONENT_TEMPLATE" => ".default"
),
    false
);?>

<?} else {?>
    <div style="background-color: #f2f2f2; padding: 10px;">
        Пользователь заблокировал доступ к анкете
    </div>
<?}?>
