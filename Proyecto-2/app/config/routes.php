<?php
    return [
        // Login
        "/login/init" => [
            "controller" => "App\Controllers\loginController",
            "action" => "initLogin"
        ],
        "/login/logout" => [
            "controller" => "App\Controllers\loginController",
            "action" => "logoutLogin"
        ],

         // Regionales
        "/regional/view" => [
            "controller" => "App\Controllers\RegionalController",
        "action" => "view"
        ],
        "/regional/new" => [
            "controller" => "App\Controllers\RegionalController",
            "action" => "new"
        ],
        "/regional/create" => [
            "controller" => "App\Controllers\RegionalController",
            "action" => "create"
        ],
        "/regional/edit/(\d+)" => [
            "controller" => "App\Controllers\RegionalController",
            "action" => "edit"
        ],
        "/regional/update" => [
            "controller" => "App\Controllers\RegionalController",
            "action" => "update"
        ],
        "/regional/delete/(\d+)" => [
            "controller" => "App\Controllers\RegionalController",
            "action" => "delete"
        ],
        "/regional/remove" => [
            "controller" => "App\Controllers\RegionalController",
            "action" => "remove"
        ],

        // Centros
        "/centro/view" => [
            "controller" => "App\Controllers\CentroController",
            "action" => "view"
        ],
        "/centro/new" => [
            "controller" => "App\Controllers\CentroController",
            "action" => "new"
        ],
        "/centro/create" => [
            "controller" => "App\Controllers\CentroController",
            "action" => "create"
        ],
        "/centro/edit/(\d+)" => [
            "controller" => "App\Controllers\CentroController",
            "action" => "edit"
        ],
        "/centro/update" => [
            "controller" => "App\Controllers\CentroController",
            "action" => "update"
        ],
        "/centro/delete/(\d+)" => [
            "controller" => "App\Controllers\CentroController",
            "action" => "delete"
        ],
        "/centro/remove" => [
            "controller" => "App\Controllers\CentroController",
            "action" => "remove"
        ],


        // Programas de Formación
        "/programaFormacion/view" => [
            "controller" => "App\Controllers\ProgramaFormacionController",
            "action" => "view"
        ],
        "/programaFormacion/new" => [
            "controller" => "App\Controllers\ProgramaFormacionController",
            "action" => "new"
        ],
        "/programaFormacion/create" => [
            "controller" => "App\Controllers\ProgramaFormacionController",
            "action" => "create"
        ],
        "/programaFormacion/edit/(\d+)" => [
            "controller" => "App\Controllers\ProgramaFormacionController",
            "action" => "edit"
        ],
        "/programaFormacion/update" => [
            "controller" => "App\Controllers\ProgramaFormacionController",
            "action" => "update"
        ],
        "/programaFormacion/delete/(\d+)" => [
            "controller" => "App\Controllers\ProgramaFormacionController",
            "action" => "delete"
        ],
        "/programaFormacion/remove" => [
            "controller" => "App\Controllers\ProgramaFormacionController",
            "action" => "remove"
        ],

        // Ambientes
        "/ambiente/view" => [
            "controller" => "App\Controllers\AmbienteController",
            "action" => "view"
        ],
        "/ambiente/new" => [
            "controller" => "App\Controllers\AmbienteController",
            "action" => "new"
        ],
        "/ambiente/create" => [
            "controller" => "App\Controllers\AmbienteController",
            "action" => "create"
        ],
        "/ambiente/edit/(\d+)" => [
            "controller" => "App\Controllers\AmbienteController",
            "action" => "edit"
        ],
        "/ambiente/update" => [
            "controller" => "App\Controllers\AmbienteController",
            "action" => "update"
        ],
        "/ambiente/delete/(\d+)" => [
            "controller" => "App\Controllers\AmbienteController",
            "action" => "delete"
        ],
        "/ambiente/remove" => [
            "controller" => "App\Controllers\AmbienteController",
            "action" => "remove"
        ],

        // Fichas
        "/ficha/view" => [
            "controller" => "App\Controllers\FichaController",
            "action" => "view"
        ],
        "/ficha/new" => [
            "controller" => "App\Controllers\FichaController",
            "action" => "new"
        ],
        "/ficha/create" => [
            "controller" => "App\Controllers\FichaController",
            "action" => "create"
        ],
        "/ficha/edit/(\d+)" => [
            "controller" => "App\Controllers\FichaController",
            "action" => "edit"
        ],
        "/ficha/update" => [
            "controller" => "App\Controllers\FichaController",
            "action" => "update"
        ],
        "/ficha/delete/(\d+)" => [
            "controller" => "App\Controllers\FichaController",
            "action" => "delete"
        ],
        "/ficha/remove" => [
            "controller" => "App\Controllers\FichaController",
            "action" => "remove"
        ],


    ];
?>