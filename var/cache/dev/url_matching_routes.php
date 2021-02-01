<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home_redirect', '_controller' => 'App\\Controller\\HomeController::homeRedirect'], null, null, null, false, false, null]],
        '/planning/send/meeting' => [[['_route' => 'planning_user_send', '_controller' => 'App\\Controller\\PlanningController::sendMeeting'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin_home', '_controller' => 'App\\Controller\\admin\\AdminController::home'], null, null, null, true, false, null]],
        '/admin/categories' => [[['_route' => 'admin_categorie', '_controller' => 'App\\Controller\\admin\\AdminController::categories'], null, null, null, false, false, null]],
        '/admin/new/categorie/user' => [[['_route' => 'admin_create_catUser', '_controller' => 'App\\Controller\\admin\\AdminController::createCategoryUser'], null, null, null, false, false, null]],
        '/admin/new/categorie/doc' => [[['_route' => 'admin_create_catDoc', '_controller' => 'App\\Controller\\admin\\AdminController::createCategoryDoc'], null, null, null, false, false, null]],
        '/admin/new/reason' => [[['_route' => 'admin_create_reason', '_controller' => 'App\\Controller\\admin\\AdminController::createReason'], null, null, null, false, false, null]],
        '/admin/new/congres' => [[['_route' => 'admin_create_congres', '_controller' => 'App\\Controller\\admin\\AdminController::createCongres'], null, null, null, false, false, null]],
        '/admin/logout' => [[['_route' => 'admin_logout', '_controller' => 'App\\Controller\\admin\\AdminController::logout'], null, ['GET' => 0], null, false, false, null]],
        '/admin/open/meeting' => [[['_route' => 'open_meeting', '_controller' => 'App\\Controller\\admin\\UserController::addStatDocument'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/congres/([^/]++)(?'
                    .'|(*:189)'
                    .'|/(?'
                        .'|contact(*:208)'
                        .'|documents(*:225)'
                        .'|se(?'
                            .'|arch/documents(*:252)'
                            .'|nd(*:262)'
                        .')'
                        .'|add/stat(*:279)'
                    .')'
                .')'
                .'|/meeting/(?'
                    .'|accept/([^/]++)(*:316)'
                    .'|refuse/([^/]++)(*:339)'
                .')'
                .'|/planning/user/([^/]++)/([^/]++)(*:380)'
                .'|/admin/(?'
                    .'|edit/([^/]++)/(?'
                        .'|reason(*:421)'
                        .'|cat(?'
                            .'|Doc(*:438)'
                            .'|User(*:450)'
                        .')'
                    .')'
                    .'|cat/(?'
                        .'|doc/([^/]++)/delete(*:486)'
                        .'|user/([^/]++)/delete(*:514)'
                    .')'
                    .'|reason/user/([^/]++)/delete(*:550)'
                    .'|([^/]++)/(?'
                        .'|congres/(?'
                            .'|delete(*:587)'
                            .'|edit(*:599)'
                        .')'
                        .'|document(?'
                            .'|s(*:620)'
                            .'|/delete(*:635)'
                        .')'
                        .'|new/(?'
                            .'|document(*:659)'
                            .'|user(*:671)'
                        .')'
                        .'|edit/(?'
                            .'|document/([^/]++)(*:705)'
                            .'|user/([^/]++)(*:726)'
                        .')'
                        .'|user(?'
                            .'|(*:742)'
                            .'|/delete(*:757)'
                        .')'
                        .'|planning/user/([^/]++)(*:788)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        189 => [[['_route' => 'congres_home', '_controller' => 'App\\Controller\\CongresController::home'], ['id'], null, null, true, true, null]],
        208 => [[['_route' => 'congres_contact', '_controller' => 'App\\Controller\\CongresController::contact'], ['id'], null, null, false, false, null]],
        225 => [[['_route' => 'congres_documents', '_controller' => 'App\\Controller\\CongresController::documents'], ['id'], null, null, false, false, null]],
        252 => [[['_route' => 'search_doc', '_controller' => 'App\\Controller\\CongresController::searchDoc'], ['id'], null, null, false, false, null]],
        262 => [[['_route' => 'question_send', '_controller' => 'App\\Controller\\CongresController::questionSend'], ['id'], null, null, false, false, null]],
        279 => [[['_route' => 'add_stat', '_controller' => 'App\\Controller\\CongresController::addStatDocument'], ['id'], null, null, false, false, null]],
        316 => [[['_route' => 'meeting_accept', '_controller' => 'App\\Controller\\MeetingController::meetingAccept'], ['idEncrypt'], null, null, false, true, null]],
        339 => [[['_route' => 'meeting_refuse', '_controller' => 'App\\Controller\\MeetingController::meetingRefuse'], ['idEncrypt'], null, null, false, true, null]],
        380 => [[['_route' => 'planning_user', '_controller' => 'App\\Controller\\PlanningController::userPlanning'], ['email', 'idCongres'], null, null, false, true, null]],
        421 => [[['_route' => 'admin_edit_reason', '_controller' => 'App\\Controller\\admin\\AdminController::editReason'], ['id'], null, null, false, false, null]],
        438 => [[['_route' => 'admin_catDoc_reason', '_controller' => 'App\\Controller\\admin\\AdminController::editcatDoc'], ['id'], null, null, false, false, null]],
        450 => [[['_route' => 'admin_catUser_reason', '_controller' => 'App\\Controller\\admin\\AdminController::editcatUser'], ['id'], null, null, false, false, null]],
        486 => [[['_route' => 'admin_catDoc_delete', '_controller' => 'App\\Controller\\admin\\AdminController::deleteCatDoc'], ['id'], ['DELETE' => 0], null, false, false, null]],
        514 => [[['_route' => 'admin_catUser_delete', '_controller' => 'App\\Controller\\admin\\AdminController::deleteCatUser'], ['id'], ['DELETE' => 0], null, false, false, null]],
        550 => [[['_route' => 'admin_reason_delete', '_controller' => 'App\\Controller\\admin\\AdminController::deleteReason'], ['id'], ['DELETE' => 0], null, false, false, null]],
        587 => [[['_route' => 'admin_congres_delete', '_controller' => 'App\\Controller\\admin\\CongresController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        599 => [[['_route' => 'admin_congres_edit', '_controller' => 'App\\Controller\\admin\\CongresController::editCongres'], ['id'], null, null, false, false, null]],
        620 => [[['_route' => 'admin_congres_documents', '_controller' => 'App\\Controller\\admin\\DocumentController::documents'], ['id'], null, null, false, false, null]],
        635 => [[['_route' => 'admin_doc_delete', '_controller' => 'App\\Controller\\admin\\DocumentController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        659 => [[['_route' => 'admin_create_document_in_congres', '_controller' => 'App\\Controller\\admin\\DocumentController::createDocumentInCongres'], ['id'], null, null, false, false, null]],
        671 => [[['_route' => 'admin_create_user_in_congres', '_controller' => 'App\\Controller\\admin\\UserController::createUserInCongres'], ['id'], null, null, false, false, null]],
        705 => [[['_route' => 'admin_edit_document', '_controller' => 'App\\Controller\\admin\\DocumentController::editDocument'], ['idCongres', 'id'], null, null, false, true, null]],
        726 => [[['_route' => 'admin_edit_user', '_controller' => 'App\\Controller\\admin\\UserController::edit'], ['idCongres', 'id'], null, null, false, true, null]],
        742 => [[['_route' => 'admin_congres_user', '_controller' => 'App\\Controller\\admin\\UserController::user'], ['id'], null, null, false, false, null]],
        757 => [[['_route' => 'admin_user_delete', '_controller' => 'App\\Controller\\admin\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        788 => [
            [['_route' => 'admin_planning_user', '_controller' => 'App\\Controller\\admin\\UserController::planningUser'], ['idCongres', 'idUser'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
