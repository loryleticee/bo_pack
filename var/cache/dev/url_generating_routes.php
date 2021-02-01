<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'congres_home' => [['id'], ['_controller' => 'App\\Controller\\CongresController::home'], [], [['text', '/'], ['variable', '/', '[^/]++', 'id', true], ['text', '/congres']], [], []],
    'congres_contact' => [['id'], ['_controller' => 'App\\Controller\\CongresController::contact'], [], [['text', '/contact'], ['variable', '/', '[^/]++', 'id', true], ['text', '/congres']], [], []],
    'congres_documents' => [['id'], ['_controller' => 'App\\Controller\\CongresController::documents'], [], [['text', '/documents'], ['variable', '/', '[^/]++', 'id', true], ['text', '/congres']], [], []],
    'search_doc' => [['id'], ['_controller' => 'App\\Controller\\CongresController::searchDoc'], [], [['text', '/search/documents'], ['variable', '/', '[^/]++', 'id', true], ['text', '/congres']], [], []],
    'question_send' => [['id'], ['_controller' => 'App\\Controller\\CongresController::questionSend'], [], [['text', '/send'], ['variable', '/', '[^/]++', 'id', true], ['text', '/congres']], [], []],
    'add_stat' => [['id'], ['_controller' => 'App\\Controller\\CongresController::addStatDocument'], [], [['text', '/add/stat'], ['variable', '/', '[^/]++', 'id', true], ['text', '/congres']], [], []],
    'home_redirect' => [[], ['_controller' => 'App\\Controller\\HomeController::homeRedirect'], [], [['text', '/']], [], []],
    'meeting_accept' => [['idEncrypt'], ['_controller' => 'App\\Controller\\MeetingController::meetingAccept'], [], [['variable', '/', '[^/]++', 'idEncrypt', true], ['text', '/meeting/accept']], [], []],
    'meeting_refuse' => [['idEncrypt'], ['_controller' => 'App\\Controller\\MeetingController::meetingRefuse'], [], [['variable', '/', '[^/]++', 'idEncrypt', true], ['text', '/meeting/refuse']], [], []],
    'planning_user' => [['email', 'idCongres'], ['_controller' => 'App\\Controller\\PlanningController::userPlanning'], [], [['variable', '/', '[^/]++', 'idCongres', true], ['variable', '/', '[^/]++', 'email', true], ['text', '/planning/user']], [], []],
    'planning_user_send' => [[], ['_controller' => 'App\\Controller\\PlanningController::sendMeeting'], [], [['text', '/planning/send/meeting']], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], []],
    'admin_home' => [[], ['_controller' => 'App\\Controller\\admin\\AdminController::home'], [], [['text', '/admin/']], [], []],
    'admin_categorie' => [[], ['_controller' => 'App\\Controller\\admin\\AdminController::categories'], [], [['text', '/admin/categories']], [], []],
    'admin_create_catUser' => [[], ['_controller' => 'App\\Controller\\admin\\AdminController::createCategoryUser'], [], [['text', '/admin/new/categorie/user']], [], []],
    'admin_create_catDoc' => [[], ['_controller' => 'App\\Controller\\admin\\AdminController::createCategoryDoc'], [], [['text', '/admin/new/categorie/doc']], [], []],
    'admin_create_reason' => [[], ['_controller' => 'App\\Controller\\admin\\AdminController::createReason'], [], [['text', '/admin/new/reason']], [], []],
    'admin_edit_reason' => [['id'], ['_controller' => 'App\\Controller\\admin\\AdminController::editReason'], [], [['text', '/reason'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin/edit']], [], []],
    'admin_catDoc_reason' => [['id'], ['_controller' => 'App\\Controller\\admin\\AdminController::editcatDoc'], [], [['text', '/catDoc'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin/edit']], [], []],
    'admin_catUser_reason' => [['id'], ['_controller' => 'App\\Controller\\admin\\AdminController::editcatUser'], [], [['text', '/catUser'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin/edit']], [], []],
    'admin_catDoc_delete' => [['id'], ['_controller' => 'App\\Controller\\admin\\AdminController::deleteCatDoc'], [], [['text', '/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin/cat/doc']], [], []],
    'admin_catUser_delete' => [['id'], ['_controller' => 'App\\Controller\\admin\\AdminController::deleteCatUser'], [], [['text', '/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin/cat/user']], [], []],
    'admin_reason_delete' => [['id'], ['_controller' => 'App\\Controller\\admin\\AdminController::deleteReason'], [], [['text', '/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin/reason/user']], [], []],
    'admin_create_congres' => [[], ['_controller' => 'App\\Controller\\admin\\AdminController::createCongres'], [], [['text', '/admin/new/congres']], [], []],
    'admin_logout' => [[], ['_controller' => 'App\\Controller\\admin\\AdminController::logout'], [], [['text', '/admin/logout']], [], []],
    'admin_congres_delete' => [['id'], ['_controller' => 'App\\Controller\\admin\\CongresController::delete'], [], [['text', '/congres/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin']], [], []],
    'admin_congres_edit' => [['id'], ['_controller' => 'App\\Controller\\admin\\CongresController::editCongres'], [], [['text', '/congres/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin']], [], []],
    'admin_congres_documents' => [['id'], ['_controller' => 'App\\Controller\\admin\\DocumentController::documents'], [], [['text', '/documents'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin']], [], []],
    'admin_create_document_in_congres' => [['id'], ['_controller' => 'App\\Controller\\admin\\DocumentController::createDocumentInCongres'], [], [['text', '/new/document'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin']], [], []],
    'admin_edit_document' => [['idCongres', 'id'], ['_controller' => 'App\\Controller\\admin\\DocumentController::editDocument'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/edit/document'], ['variable', '/', '[^/]++', 'idCongres', true], ['text', '/admin']], [], []],
    'admin_doc_delete' => [['id'], ['_controller' => 'App\\Controller\\admin\\DocumentController::delete'], [], [['text', '/document/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin']], [], []],
    'admin_congres_user' => [['id'], ['_controller' => 'App\\Controller\\admin\\UserController::user'], [], [['text', '/user'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin']], [], []],
    'admin_create_user_in_congres' => [['id'], ['_controller' => 'App\\Controller\\admin\\UserController::createUserInCongres'], [], [['text', '/new/user'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin']], [], []],
    'admin_planning_user' => [['idCongres', 'idUser'], ['_controller' => 'App\\Controller\\admin\\UserController::planningUser'], [], [['variable', '/', '[^/]++', 'idUser', true], ['text', '/planning/user'], ['variable', '/', '[^/]++', 'idCongres', true], ['text', '/admin']], [], []],
    'open_meeting' => [[], ['_controller' => 'App\\Controller\\admin\\UserController::addStatDocument'], [], [['text', '/admin/open/meeting']], [], []],
    'admin_edit_user' => [['idCongres', 'id'], ['_controller' => 'App\\Controller\\admin\\UserController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/edit/user'], ['variable', '/', '[^/]++', 'idCongres', true], ['text', '/admin']], [], []],
    'admin_user_delete' => [['id'], ['_controller' => 'App\\Controller\\admin\\UserController::delete'], [], [['text', '/user/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/admin']], [], []],
];
