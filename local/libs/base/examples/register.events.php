<?php

/**
 * Пример кода, показывающий, как правильно приготовить массив для метода \UW\SystemBase::registerHandlers()
 *
 */

$arEvents = [

    /*Список событий, не призанных к конкретному модулю*/
    '' => [
        /*Регистрация обработчика (метод класса) NameSpace\MyOwnClass::MyOwnMethod для события с кодом MyCustomEventCode*/
        'MyCustomEventCode1' => [
            ['NameSpace\\MyOwnClass', 'MyOwnMethod']
        ],
        /*Регистрация нескольких обработчиков для события с кодом MyCustomEventCode*/
        'MyCustomEventCode2' => [
            ['NameSpace\\MyOwnClass', 'MyOwnMethod1'],
            ['NameSpace\\MyOwnClass', 'MyOwnMethod2']
        ],
        /*Регистрация обработчика (функция) MyOwnFunction для события с кодом MyCustomEventCode3*/
        'MyCustomEventCode3' => [
            'MyOwnFunction'
        ]
    ],

    /*Список событий, привязанных к модулю iblock*/
    'iblock' => [
        /*
         * Пример обработчика события описан в /local/base/examples/event.listener.php
         * Регистрация обработчика (метод класса) NameSpace\MyOwnClass::MyOwnMethod для события с кодом OnBeforeIBlockElementAdd
         * */
        'OnBeforeIBlockElementAdd' => [
            ['UW\\EventListener', 'OnBeforeIBlockElementAdd']
        ],

    ]
];

