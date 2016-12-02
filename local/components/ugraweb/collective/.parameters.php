<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


$arComponentParameters = array(
	"GROUPS" => array(
		
	),
	"PARAMETERS" => array(
		"VARIABLE_ALIASES" => Array(
            "index" => Array("NAME" => 'Индексная'),
            "collective" => Array("NAME" => 'Коллектив'),
            "news" => Array("NAME" => 'Новости'),
            "afisha" => Array("NAME" => 'Афиша'),
            "search" => Array("NAME" => 'Поиск'),
            "photogal" => Array("NAME" => 'Фотоотчеты'),
			"detail" => Array("NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS_DETAIL")),
			"about" => Array("NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS_ABOUT")),
			"company_news" => Array("NAME" => 'Страничка с новостями'),
			"company_news_detail" => Array("NAME" => 'Детальная страничка с новостями'),
			"production" => Array("NAME" => 'Сраничка с продукцией'),
			"media" => Array("NAME" => 'Медиа-архив'),
			"media_detail" => Array("NAME" => 'Медиа-архив детальная'),
			"contacts" => Array("NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS_CONTACTS")),
		),		
		"SEF_MODE" => Array(
            "index" => array(
                "NAME" => 'Индексная',
                "DEFAULT" => "",
                "VARIABLES" => array(),
            ),
			"collective" => array(
				"NAME" => 'Коллектив',
				"DEFAULT" => "",
				"VARIABLES" => array("COLL_CODE"),
			),
			"news" => array(
				"NAME" => 'Новости',
				"DEFAULT" => "",
				"VARIABLES" => array("COLL_CODE"),
			),
			"afisha" => array(
				"NAME" => 'Афиша',
				"DEFAULT" => "",
				"VARIABLES" => array("COLL_CODE"),
			),
            "search" => array(
                "NAME" => 'Поиск',
                "DEFAULT" => "",
                "VARIABLES" => array("COLL_CODE"),
            ),
			"photogal" => array(
				"NAME" => 'Фотоотчеты',
				"DEFAULT" => "",
				"VARIABLES" => array("COLL_CODE"),
			),
			"messages" => array(
				"NAME" => 'Сообщения',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID"),
			),
			"black_list" => array(
				"NAME" => 'Черный список',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID"),
			),
			"visitors" => array(
				"NAME" => 'Мои посетители',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID"),
			),
			"posts" => array(
				"NAME" => 'Мои дневники',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID"),
			),
            "messages" => array(
                "NAME" => 'Мои сообщения',
                "DEFAULT" => "",
                "VARIABLES" => array("USER_ID"),
            ),
			"share_success" => array(
				"NAME" => 'Поделиться счастьем',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID"),
			),
			"settings" => array(
				"NAME" => 'Настройки',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID"),
			),
			"edit" => array(
				"NAME" => 'Редактирование профиля',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID"),
			),
			"login" => array(
				"NAME" => 'Вход',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID"),
			),
			"photos_detail" => array(
				"NAME" => 'Детальная страница альбома',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID","SECTION_ID"),
			),
			"posts_add" => array(
				"NAME" => 'Добавить запись',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID"),
			),
			"posts_detail" => array(
				"NAME" => 'Детальная страница поста',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID","POST_ID"),
			),
			"posts_edit" => array(
				"NAME" => 'Страница редактирования поста',
				"DEFAULT" => "",
				"VARIABLES" => array("USER_ID","POST_ID"),
			),
            "messages_detail" => array(
                "NAME" => 'Детальная страница с сообщениями',
                "DEFAULT" => "",
                "VARIABLES" => array("USER_ID","DIALOG_ID"),
            ),
			
		),
				
		"AJAX_MODE" => array(),
		
		"CACHE_TIME"  =>  Array("DEFAULT"=>36000000),
		"CACHE_FILTER" => array(
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => GetMessage("BN_P_CACHE_FILTER"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		),
		"CACHE_GROUPS" => array(
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => GetMessage("CP_BN_CACHE_GROUPS"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
		),
        "COL_NAME" => array(
            "PARENT" => "BASE",
            "NAME" => 'Название коллектива',
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
	),
);



?>
