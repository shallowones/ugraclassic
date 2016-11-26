<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!CModule::IncludeModule("iblock"))
	return;


$arComponentParameters = array(
	"PARAMETERS" => array(
		"CURRENT_USER"=>array(
			"PARENT" => "ADDITIONAL_SETTINGS",
			"NAME" => "Текущий пользователь",
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
		"DAY_COUNT"=>array(
			"PARENT" => "ADDITIONAL_SETTINGS",
			"NAME" => "Количество дней для вывода",
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
		"CLUB_ID"=>array(
			"PARENT" => "ADDITIONAL_SETTINGS",
			"NAME" => "Идентификатор клуба",
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
	),
);
?>