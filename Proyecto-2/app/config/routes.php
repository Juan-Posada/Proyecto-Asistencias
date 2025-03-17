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

    // Ambientes
    "/ambiente/view" => [
        "controller" => "App\Controllers\AmbienteController",
        "action" => "view"
    ],
    "/ambiente/view/(\d+)" => [
        "controller" => "App\Controllers\AmbienteController",
        "action" => "viewOne"
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

    // Aprendices
    "/aprendiz/view" => [
        "controller" => "App\Controllers\AprendizController",
        "action" => "view"
    ],
    "/aprendiz/view/(\d+)" => [
        "controller" => "App\Controllers\AprendizController",
        "action" => "viewOne"
    ],
    "/aprendiz/new" => [
        "controller" => "App\Controllers\AprendizController",
        "action" => "new"
    ],
    "/aprendiz/create" => [
        "controller" => "App\Controllers\AprendizController",
        "action" => "create"
    ],
    "/aprendiz/edit/(\d+)" => [
        "controller" => "App\Controllers\AprendizController",
        "action" => "edit"
    ],
    "/aprendiz/update" => [
        "controller" => "App\Controllers\AprendizController",
        "action" => "update"
    ],
    "/aprendiz/delete/(\d+)" => [
        "controller" => "App\Controllers\AprendizController",
        "action" => "delete"
    ],
    "/aprendiz/remove" => [
        "controller" => "App\Controllers\AprendizController",
        "action" => "remove"
    ],

    // Asistencias
    "/asistencia/view" => [
        "controller" => "App\Controllers\AsistenciaController",
        "action" => "view"
    ],
    "/asistencia/view/(\d+)" => [
        "controller" => "App\Controllers\AsistenciaController",
        "action" => "viewOne"
    ],
    "/asistencia/new" => [
        "controller" => "App\Controllers\AsistenciaController",
        "action" => "new"
    ],
    "/asistencia/create" => [
        "controller" => "App\Controllers\AsistenciaController",
        "action" => "create"
    ],
    "/asistencia/edit/(\d+)" => [
        "controller" => "App\Controllers\AsistenciaController",
        "action" => "edit"
    ],
    "/asistencia/update" => [
        "controller" => "App\Controllers\AsistenciaController",
        "action" => "update"
    ],
    "/asistencia/delete/(\d+)" => [
        "controller" => "App\Controllers\AsistenciaController",
        "action" => "delete"
    ],
    "/asistencia/remove" => [
        "controller" => "App\Controllers\AsistenciaController",
        "action" => "remove"
    ],

    // Centros
    "/centro/view" => [
        "controller" => "App\Controllers\CentroController",
        "action" => "view"
    ],
    "/centro/view/(\d+)" => [
        "controller" => "App\Controllers\CentroController",
        "action" => "viewOne"
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

    // Fichas
    "/ficha/view" => [
        "controller" => "App\Controllers\FichaController",
        "action" => "view"
    ],
    "/ficha/view/(\d+)" => [
        "controller" => "App\Controllers\FichaController",
        "action" => "viewOne"
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

    // Programas de Formación
    "/programaFormacion/view" => [
        "controller" => "App\Controllers\ProgramaFormacionController",
        "action" => "view"
    ],
    "/programaFormacion/view/(\d+)" => [
        "controller" => "App\Controllers\ProgramaFormacionController",
        "action" => "viewOne"
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

    // Regionales
    "/regional/view" => [
        "controller" => "App\Controllers\RegionalController",
        "action" => "view"
    ],
    "/regional/view/(\d+)" => [
        "controller" => "App\Controllers\RegionalController",
        "action" => "viewOne"
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

    // Usuarios
    "/usuario/view" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "view"
    ],
    "/usuario/view/(\d+)" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "viewOne"
    ],
    "/usuario/new" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "new"
    ],
    "/usuario/create" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "create"
    ],
    "/usuario/edit/(\d+)" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "edit"
    ],
    "/usuario/update" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "update"
    ],
    "/usuario/delete/(\d+)" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "delete"
    ],
    "/usuario/remove" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "remove"
    ],

    'asistencia/getAsistenciasByFicha/{id}' => [
        'controller' => 'AsistenciaController',
        'action' => 'getAsistenciasByFicha'
    ],
    // Página Principal
    "/main" => [
        "controller" => "App\Controllers\MainController",
        "action" => "view"
    ],
];