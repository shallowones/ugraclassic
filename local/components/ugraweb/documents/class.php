<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

\Bitrix\Main\Loader::includeModule('iblock');

class OrderBindingToCourierComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        global $APPLICATION;
        $matches = [];
        $curDir = $APPLICATION->GetCurDir();
        preg_match_all('/\/(\d+){1}/', $curDir, $matches);
        $backUrls = [];

        if ($currentSection = end($matches[1])) {
            $arParams['CURRENT_SECTION'] = $currentSection;
            $rootFolder = $this->getRootFolder($arParams['IBLOCK_ID']);
            foreach ($matches[1] as $sectionId) {
                if ($name = $this->getSectionName($sectionId)) {
                    $rootFolder .= "{$sectionId}/";
                    $APPLICATION->AddChainItem($name, $rootFolder);
                    $backUrls[] = $rootFolder;
                } else {
                    break;
                }
            }
        }

        if ($curDir !== $this->getRootFolder($arParams['IBLOCK_ID'])) {
            $arParams['BACK_URL'] =
                ($backUrls[count($backUrls) - 2])
                    ? $backUrls[count($backUrls) - 2]
                    : $this->getRootFolder($arParams['IBLOCK_ID']);
        }

        return $arParams;
    }


    private function getSectionName($sectionId)
    {
        $rsSections = \CIBlockSection::GetList(
            [],
            ['ID' => $sectionId, 'ACTIVE' => 'Y'],
            false,
            ['NAME']
        );

        return ($arSection = $rsSections->Fetch()) ? $arSection['NAME'] : '';
    }

    private function getRootFolder($iblockId)
    {
        $rsBlock = \CIBlock::GetByID($iblockId);

        return ($arBlock = $rsBlock->Fetch()) ? $arBlock['LIST_PAGE_URL'] : [];
    }

    private function getParentSectionUrl($sectionId)
    {
        global $APPLICATION;
        $link = $APPLICATION->GetCurDir() . $sectionId . '/';

        // проверка на наличие подразделов
        $rsSections = \CIBlockSection::GetList(
            ['SORT' => 'ASC', 'CREATED' => 'ASC'],
            ['SECTION_ID' => $sectionId, 'ACTIVE' => 'Y'],
            false,
            ['ID']
        );
        if ($arSection = $rsSections->Fetch()) {
            return $link;
        }

        // проверка на наличие элементов
        $rsElements = \CIBlockElement::GetList(
            ['SORT' => 'ASC', 'DATE_ACTIVE_FROM' => 'ASC'],
            ['SECTION_ID' => $sectionId, 'ACTIVE' => 'Y'],
            false,
            false,
            ['ID']
        );
        if ($arElement = $rsElements->Fetch()) {
            return $link;
        }

        return '';
    }

    private function checkLink($link)
    {
        if (strripos($link, 'http') !== false) {
            return (strripos($link, 'ugraclassic') !== false) ? true : false;
        }

        return true;
    }

    private function getYearsForFilter()
    {
        global $APPLICATION;

        $this->arResult['FILTER_YEARS'][] = [
            'NAME' => 'ВСЕ',
            'LINK' => $APPLICATION->GetCurPageParam('year=all', ['year']),
            'ACTIVE' => (!$_SESSION['YEAR_FILTER']) ? true : false
        ];

        for ($i = (intval(date('Y'))); $i >= 2012; $i--) {
            $year = strval($i);
            $this->arResult['FILTER_YEARS'][] = [
                'NAME' => $year,
                'LINK' => $APPLICATION->GetCurPageParam('year=' . $year, ['year']),
                'ACTIVE' => ($_SESSION['YEAR_FILTER'] === $year) ? true : false
            ];
        }

        return $this;
    }

    private function getSectionsAndElements($sectionId = '', $iblockId = '')
    {
        $arFilter = [
            'ACTIVE' => 'Y'
        ];

        if ($iblockId) {
            $arFilter['IBLOCK_ID'] = $iblockId;
            $arFilter['SECTION_ID'] = false;
        }
        if ($sectionId) {
            $arFilter['SECTION_ID'] = $sectionId;
        }
        $arFilterForElements = $arFilter;
        if ($_SESSION['YEAR_FILTER']) {
            $arFilter['>=UF_DATE'] = '01.01.' . $_SESSION['YEAR_FILTER'];
            $arFilter['<=UF_DATE'] = '31.12.' . $_SESSION['YEAR_FILTER'];

            $arFilterForElements['>=DATE_ACTIVE_FROM'] = '01.01.' . $_SESSION['YEAR_FILTER'];
            $arFilterForElements['<=DATE_ACTIVE_FROM'] = '31.12.' . $_SESSION['YEAR_FILTER'];

            $this->arResult['CURRENT_YEAR'] = $_SESSION['YEAR_FILTER'];
        }
        // ---------------------------------------------------------------------------------------- список разделов
        $rsSections = \CIBlockSection::GetList(
            ['SORT' => 'ASC', 'CREATED' => 'ASC'],
            $arFilter,
            true,
            ['ID', 'NAME', 'UF_LINK']
        );
        while ($arSection = $rsSections->Fetch()) {
            $this->arResult['LIST'][] = [
                'ID' => $arSection['ID'],
                'NAME' => $arSection['NAME'],
                'LINK' => ($arSection['UF_LINK']) ? $arSection['UF_LINK'] : $this->getParentSectionUrl($arSection['ID']),
                'IS_INNER' => $this->checkLink($arSection['UF_LINK'])
            ];
        }

        // ---------------------------------------------------------------------------------------- список элементов
        $rsElements = \CIBlockElement::GetList(
            ['SORT' => 'ASC', 'DATE_ACTIVE_FROM' => 'ASC'],
            $arFilterForElements,
            false,
            false,
            ['ID', 'NAME', 'PROPERTY_FILE', 'PROPERTY_LINK']
        );
        while ($arElement = $rsElements->Fetch()) {
            $this->arResult['LIST'][] = [
                'ID' => $arElement['ID'],
                'NAME' => $arElement['NAME'],
                'LINK' => ($arElement['PROPERTY_LINK_VALUE']) ? $arElement['PROPERTY_LINK_VALUE'] : \CFile::GetPath($arElement['PROPERTY_FILE_VALUE']),
                'IS_INNER' => ($arElement['PROPERTY_LINK_VALUE']) ? $this->checkLink($arElement['PROPERTY_LINK_VALUE']) : true
            ];
        }

        // сортируем массив по полю SORT
        foreach ($this->arResult['LIST'] as $key => $arItem) {
            $sort[$key] = $arItem['SORT'];
        }

        array_multisort($sort, SORT_ASC, $this->arResult['LIST']);

        return $this;
    }

    private function prepareNavigation()
    {
        $rsObjectList = new \CDBResult;
        $rsObjectList->InitFromArray($this->arResult['LIST']);
        $rsObjectList->NavStart($this->arParams['COUNT_SHOW_ELEMENTS'], false);
        $this->arResult['NAV_STRING'] = $rsObjectList->GetPageNavString("", '.default');
        $this->arResult['PAGE_START'] = $rsObjectList->SelectedRowsCount() - ($rsObjectList->NavPageNomer - 1) * $rsObjectList->NavPageSize;
        while ($arField = $rsObjectList->Fetch()) {
            $this->arResult['ITEMS'][] = $arField;
        }

        unset($this->arResult['LIST']);

        return $this;
    }

    public function executeComponent()
    {
        global $APPLICATION;

        if ($_GET['year'] === 'all') {
            unset($_SESSION['YEAR_FILTER']);
            LocalRedirect($APPLICATION->GetCurDir());
        }
        elseif (!empty($_GET['year']) && $_SESSION['YEAR_FILTER'] !== $_GET['year']) {
            $_SESSION['YEAR_FILTER'] = $_GET['year'];
            LocalRedirect($APPLICATION->GetCurDir() . 'index.php');
        }

        $this
            ->getSectionsAndElements(
                ($this->arParams['CURRENT_SECTION']) ? $this->arParams['CURRENT_SECTION'] : '',
                $this->arParams['IBLOCK_ID']
            )
            ->prepareNavigation()
            ->getYearsForFilter()
            ->IncludeComponentTemplate();
    }
}