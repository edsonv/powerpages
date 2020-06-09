<?php

namespace Altum\Routing;

use Altum\Database\Database;

class Router {
    public static $params = [];
    public static $path = '';
    public static $controller_key = 'index';
    public static $controller = 'Index';
    public static $controller_settings = [
        'menu_no_margin'        => false,
        'body_white'            => false,
        'wrapper'               => 'backoffice_wrapper'
    ];
    public static $method = 'index';

    public static $routes = [
        'link' => [
            'link' => [
                'controller' => 'Link'
            ],
        ],

        '' => [
            'index' => [
                'controller' => 'Index',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'login' => [
                'controller' => 'Login',
                'settings' => [
                    'wrapper' => 'basic_wrapper'
                ]
            ],

            'register' => [
                'controller' => 'Register',
                'settings' => [
                    'wrapper' => 'basic_wrapper'
                ]
            ],

            'pages' => [
                'controller' => 'Pages'
            ],

            'page' => [
                'controller' => 'Page',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'activate-user' => [
                'controller' => 'ActivateUser'
            ],

            'lost-password' => [
                'controller' => 'LostPassword',
                'settings' => [
                    'wrapper' => 'basic_wrapper'
                ]
            ],

            'reset-password' => [
                'controller' => 'ResetPassword',
                'settings' => [
                    'wrapper' => 'basic_wrapper'
                ]
            ],

            'resend-activation' => [
                'controller' => 'ResendActivation',
                'settings' => [
                    'wrapper' => 'basic_wrapper'
                ]
            ],

            'logout' => [
                'controller' => 'Logout'
            ],

            'notfound' => [
                'controller' => 'NotFound'
            ],

            /* Logged in */
            'dashboard' => [
                'controller' => 'Dashboard',
                'settings' => [
                    'menu_no_margin' => true,
                    'body_white' => false
                ]
            ],

            'project' => [
                'controller' => 'Project',
                'settings' => [
                    'menu_no_margin' => true,
                    'body_white' => false
                ]
            ],

            'link' => [
                'controller' => 'Link',
                'settings' => [
                    'menu_no_margin' => true,
                    'body_white' => false
                ]
            ],

            'account' => [
                'controller' => 'Account',
                'settings' => [
                    'menu_no_margin' => true,
                    'body_white' => false
                ]
            ],

            'account-package' => [
                'controller' => 'AccountPackage',
                'settings' => [
                    'menu_no_margin' => true,
                    'body_white' => false
                ]
            ],

            'account-payments' => [
                'controller' => 'AccountPayments',
                'settings' => [
                    'menu_no_margin' => true,
                    'body_white' => false
                ]
            ],

            'account-logs' => [
                'controller' => 'AccountLogs',
                'settings' => [
                    'menu_no_margin' => true,
                    'body_white' => false
                ]
            ],

            'invoice' => [
                'controller' => 'Invoice',
                'settings' => [
                    'wrapper' => 'invoice/invoice_wrapper',
                    'body_white' => false,
                ]
            ],

            'package' => [
                'controller' => 'Package',
            ],

            'pay' => [
                'controller' => 'Pay'
            ],


            /* Webhooks */
            'webhook-paypal' => [
                'controller' => 'WebhookPaypal'
            ],

            'webhook-stripe' => [
                'controller' => 'WebhookStripe'
            ],

            /* Ajax */
            'project-ajax' => [
                'controller' => 'ProjectAjax'
            ],

            'link-ajax' => [
                'controller' => 'LinkAjax'
            ],

            /* Others */
            'get-captcha' => [
                'controller' => 'GetCaptcha'
            ],

            'sitemap' => [
                'controller' => 'Sitemap'
            ],

            'cron' => [
                'controller' => 'Cron'
            ],
        ],

        /* Admin Panel */
        'admin' => [
            'index' => [
                'controller' => 'AdminIndex',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'users' => [
                'controller' => 'AdminUsers',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'user-create' => [
                'controller' => 'AdminUserCreate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'user-view' => [
                'controller' => 'AdminUserView',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'user-update' => [
                'controller' => 'AdminUserUpdate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'links' => [
                'controller' => 'AdminLinks',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'domains' => [
                'controller' => 'AdminDomains',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'domain-create' => [
                'controller' => 'AdminDomainCreate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'domain-update' => [
                'controller' => 'AdminDomainUpdate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],


            'pages-categories' => [
                'controller' => 'AdminPagesCategories',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'pages-category-create' => [
                'controller' => 'AdminPagesCategoryCreate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'pages-category-update' => [
                'controller' => 'AdminPagesCategoryUpdate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'pages' => [
                'controller' => 'AdminPages',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'page-create' => [
                'controller' => 'AdminPageCreate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'page-update' => [
                'controller' => 'AdminPageUpdate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],


            'packages' => [
                'controller' => 'AdminPackages',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'package-create' => [
                'controller' => 'AdminPackageCreate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],

            'package-update' => [
                'controller' => 'AdminPackageUpdate',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],


            'payments' => [
                'controller' => 'AdminPayments',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],


            'statistics' => [
                'controller' => 'AdminStatistics',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],


            'settings' => [
                'controller' => 'AdminSettings',
                'settings' => [
                  'wrapper' => 'wrapper'
                ]
            ],
        ]
    ];



    public static function parse_url() {

        $params = self::$params;

        if(isset($_GET['altum'])) {
            $params = explode('/', filter_var(rtrim($_GET['altum'], '/'), FILTER_SANITIZE_URL));
        }

        self::$params = $params;

        return $params;

    }

    public static function get_params() {

        return self::$params = array_values(self::$params);
    }

    public static function parse_controller() {

        /* Check for potential other paths than the default one (admin panel) */
        if(!empty(self::$params[0])) {

            if(in_array(self::$params[0], ['admin'])) {
                self::$path = self::$params[0];

                unset(self::$params[0]);

                self::$params = array_values(self::$params);
            }

        }

        if(!empty(self::$params[0])) {

            if(array_key_exists(self::$params[0], self::$routes[self::$path]) && file_exists(APP_PATH . 'controllers/' . (self::$path != '' ? self::$path . '/' : null) . self::$routes[self::$path][self::$params[0]]['controller'] . '.php')) {

                self::$controller_key = self::$params[0];

                unset(self::$params[0]);

            } else

            /* Check if there is any link available in the database */
            if(Database::exists('link_id', 'links', ['url' => self::$params[0]])) {
                self::$params[0] = Database::clean_string(self::$params[0]);

                self::$controller_key = 'link';
                self::$controller = 'Link';
                self::$path = 'link';

            } else {

                /* Not found controller */
                self::$path = '';
                self::$controller_key = 'notfound';

            }

        }

        /* Save the current controller */
        self::$controller = self::$routes[self::$path][self::$controller_key]['controller'];

        /* Make sure we also save the controller specific settings */
        if(isset(self::$routes[self::$path][self::$controller_key]['settings'])) {
            self::$controller_settings = array_merge(self::$controller_settings, self::$routes[self::$path][self::$controller_key]['settings']);
        }

        return self::$controller;

    }

    public static function get_controller($controller_name, $path = '') {

        require_once APP_PATH . 'controllers/' . ($path != '' ? $path . '/' : null) . $controller_name . '.php';

        /* Create a new instance of the controller */
        $class = 'Altum\\Controllers\\' . $controller_name;

        /* Instantiate the controller class */
        $controller = new $class;

        return $controller;
    }

    public static function parse_method($controller) {

        $method = self::$method;

        /* Make sure to check the class method if set in the url */
        if(isset(self::get_params()[0]) && method_exists($controller, self::get_params()[0])) {

            /* Make sure the method is not private */
            $reflection = new \ReflectionMethod($controller, self::get_params()[0]);
            if($reflection->isPublic()) {
                $method = self::get_params()[0];

                unset(self::$params[0]);
            }

        }

        return $method;

    }

}
