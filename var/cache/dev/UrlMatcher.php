<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'home_redirect', '_controller' => 'App\\Controller\\HomeController::homeRedirect'], null, null, null, false, false, null]],
        '/planning/send/meeting' => [[['_route' => 'planning_user_send', '_controller' => 'App\\Controller\\PlanningController::sendMeeting'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin_home', '_controller' => 'App\\Controller\\admin\\AdminController::home'], null, null, null, true, false, null]],
        '/admin/admin/users' => [[['_route' => 'admin_user', '_controller' => 'App\\Controller\\admin\\AdminController::users'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/logout' => [[['_route' => 'admin_logout', '_controller' => 'App\\Controller\\admin\\AdminController::logout'], null, ['GET' => 0], null, false, false, null]],
        '/produit' => [[['_route' => 'produit_index', '_controller' => 'App\\Controller\\admin\\ProduitController::index'], null, ['GET' => 0], null, true, false, null]],
        '/produit/new' => [[['_route' => 'produit_new', '_controller' => 'App\\Controller\\admin\\ProduitController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/congres/([^/]++)(?'
                    .'|(*:27)'
                    .'|/(?'
                        .'|contact(*:45)'
                        .'|documents(*:61)'
                        .'|se(?'
                            .'|arch/documents(*:87)'
                            .'|nd(*:96)'
                        .')'
                        .'|add/stat(*:112)'
                    .')'
                .')'
                .'|/meeting/(?'
                    .'|accept/([^/]++)(*:149)'
                    .'|refuse/([^/]++)(*:172)'
                .')'
                .'|/p(?'
                    .'|lanning/user/([^/]++)/([^/]++)(*:216)'
                    .'|roduit/([^/]++)(?'
                        .'|(*:242)'
                        .'|/(?'
                            .'|edit(*:258)'
                            .'|user/delete(*:277)'
                        .')'
                        .'|(*:286)'
                    .')'
                .')'
                .'|/admin/([^/]++)/(?'
                    .'|congres/(?'
                        .'|delete(*:332)'
                        .'|edit(*:344)'
                    .')'
                    .'|document(?'
                        .'|s(*:365)'
                        .'|/delete(*:380)'
                    .')'
                    .'|new/document(*:401)'
                    .'|edit/(?'
                        .'|document/([^/]++)(*:434)'
                        .'|user/([^/]++)(*:455)'
                    .')'
                    .'|user(?'
                        .'|(*:471)'
                        .'|/delete(*:486)'
                    .')'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:527)'
                    .'|wdt/([^/]++)(*:547)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:593)'
                            .'|router(*:607)'
                            .'|exception(?'
                                .'|(*:627)'
                                .'|\\.css(*:640)'
                            .')'
                        .')'
                        .'|(*:650)'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        27 => [[['_route' => 'congres_home', '_controller' => 'App\\Controller\\CongresController::home'], ['id'], null, null, true, true, null]],
        45 => [[['_route' => 'congres_contact', '_controller' => 'App\\Controller\\CongresController::contact'], ['id'], null, null, false, false, null]],
        61 => [[['_route' => 'congres_documents', '_controller' => 'App\\Controller\\CongresController::documents'], ['id'], null, null, false, false, null]],
        87 => [[['_route' => 'search_doc', '_controller' => 'App\\Controller\\CongresController::searchDoc'], ['id'], null, null, false, false, null]],
        96 => [[['_route' => 'question_send', '_controller' => 'App\\Controller\\CongresController::questionSend'], ['id'], null, null, false, false, null]],
        112 => [[['_route' => 'add_stat', '_controller' => 'App\\Controller\\CongresController::addStatDocument'], ['id'], null, null, false, false, null]],
        149 => [[['_route' => 'meeting_accept', '_controller' => 'App\\Controller\\MeetingController::meetingAccept'], ['idEncrypt'], null, null, false, true, null]],
        172 => [[['_route' => 'meeting_refuse', '_controller' => 'App\\Controller\\MeetingController::meetingRefuse'], ['idEncrypt'], null, null, false, true, null]],
        216 => [[['_route' => 'planning_user', '_controller' => 'App\\Controller\\PlanningController::userPlanning'], ['email', 'idCongres'], null, null, false, true, null]],
        242 => [[['_route' => 'produit_show', '_controller' => 'App\\Controller\\admin\\ProduitController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        258 => [[['_route' => 'produit_edit', '_controller' => 'App\\Controller\\admin\\ProduitController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        277 => [[['_route' => 'admin_produits_delete', '_controller' => 'App\\Controller\\admin\\ProduitController::admin_produits_delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        286 => [[['_route' => 'produit_delete', '_controller' => 'App\\Controller\\admin\\ProduitController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        332 => [[['_route' => 'admin_congres_delete', '_controller' => 'App\\Controller\\admin\\CongresController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        344 => [[['_route' => 'admin_congres_edit', '_controller' => 'App\\Controller\\admin\\CongresController::editCongres'], ['id'], null, null, false, false, null]],
        365 => [[['_route' => 'admin_congres_documents', '_controller' => 'App\\Controller\\admin\\DocumentController::documents'], ['id'], null, null, false, false, null]],
        380 => [[['_route' => 'admin_doc_delete', '_controller' => 'App\\Controller\\admin\\DocumentController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        401 => [[['_route' => 'admin_create_document_in_congres', '_controller' => 'App\\Controller\\admin\\DocumentController::createDocumentInCongres'], ['id'], null, null, false, false, null]],
        434 => [[['_route' => 'admin_edit_document', '_controller' => 'App\\Controller\\admin\\DocumentController::editDocument'], ['idCongres', 'id'], null, null, false, true, null]],
        455 => [[['_route' => 'admin_edit_user', '_controller' => 'App\\Controller\\admin\\UserController::edit'], ['idCongres', 'id'], null, null, false, true, null]],
        471 => [
            [['_route' => 'admin_congres_user', '_controller' => 'App\\Controller\\admin\\UserController::user'], ['id'], null, null, false, false, null],
            [['_route' => 'admin_produits_user', '_controller' => 'App\\Controller\\admin\\UserController::user_products'], ['id'], null, null, false, false, null],
        ],
        486 => [[['_route' => 'admin_user_delete', '_controller' => 'App\\Controller\\admin\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        527 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        547 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        593 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        607 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        627 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        640 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        650 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
