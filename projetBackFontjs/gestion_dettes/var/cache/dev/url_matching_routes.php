<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/article' => [[['_route' => 'app_article', '_controller' => 'App\\Controller\\ArticleController::listArticles'], null, null, null, false, false, null]],
        '/api/articles' => [[['_route' => 'api_articles_creer', '_controller' => 'App\\Controller\\ArticleController::createArticle'], null, ['POST' => 0], null, false, false, null]],
        '/api/articles/stock-faible' => [[['_route' => 'api_articles_stock_faible', '_controller' => 'App\\Controller\\ArticleController::listArticlesWithLowStock'], null, ['GET' => 0], null, false, false, null]],
        '/api/dettes' => [
            [['_route' => 'api_dettes_lister', '_controller' => 'App\\Controller\\DetteController::listDebts'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_dettes_creer', '_controller' => 'App\\Controller\\DetteController::createDebt'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/connexion' => [[['_route' => 'api_connexion', '_controller' => 'App\\Controller\\UtilisateurController::login'], null, ['POST' => 0], null, false, false, null]],
        '/api/utilisateurs' => [[['_route' => 'api_utilisateurs_lister', '_controller' => 'App\\Controller\\UtilisateurController::listUsers'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/(?'
                    .'|articles/nom/([^/]++)(*:71)'
                    .'|dettes/(?'
                        .'|([^/]++)(*:96)'
                        .'|client/([^/]++)(*:118)'
                        .'|statut/([^/]++)(*:141)'
                        .'|article/([^/]++)(*:165)'
                        .'|filtre(*:179)'
                        .'|([^/]++)/paiements(?'
                            .'|(*:208)'
                        .')'
                    .')'
                    .'|paiements/date/([^/]++)(*:241)'
                    .'|utilisateurs/role/([^/]++)(*:275)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        71 => [[['_route' => 'api_articles_par_nom', '_controller' => 'App\\Controller\\ArticleController::listArticlesByName'], ['nom'], ['GET' => 0], null, false, true, null]],
        96 => [[['_route' => 'api_dette_afficher', '_controller' => 'App\\Controller\\DetteController::showDebt'], ['id'], ['GET' => 0], null, false, true, null]],
        118 => [[['_route' => 'api_dettes_par_client', '_controller' => 'App\\Controller\\DetteController::listDebtsByClient'], ['clientId'], ['GET' => 0], null, false, true, null]],
        141 => [[['_route' => 'api_dettes_par_statut', '_controller' => 'App\\Controller\\DetteController::listDebtsByStatus'], ['statut'], ['GET' => 0], null, false, true, null]],
        165 => [[['_route' => 'api_dettes_par_article', '_controller' => 'App\\Controller\\DetteController::listDebtsByArticle'], ['articleId'], ['GET' => 0], null, false, true, null]],
        179 => [[['_route' => 'api_dettes_filtrer', '_controller' => 'App\\Controller\\DetteController::filterDebts'], [], ['GET' => 0], null, false, false, null]],
        208 => [
            [['_route' => 'api_paiements_creer', '_controller' => 'App\\Controller\\PaiementController::createPayment'], ['detteId'], ['POST' => 0], null, false, false, null],
            [['_route' => 'api_paiements_par_dette', '_controller' => 'App\\Controller\\PaiementController::listPaymentsByDebt'], ['detteId'], ['GET' => 0], null, false, false, null],
        ],
        241 => [[['_route' => 'api_paiements_par_date', '_controller' => 'App\\Controller\\PaiementController::listPaymentsByDate'], ['date'], ['GET' => 0], null, false, true, null]],
        275 => [
            [['_route' => 'api_utilisateurs_par_role', '_controller' => 'App\\Controller\\UtilisateurController::listUsersByRole'], ['role'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
