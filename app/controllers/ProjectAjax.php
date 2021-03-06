<?php

namespace Altum\Controllers;

use Altum\Database\Database;
use Altum\Date;
use Altum\Middlewares\Authentication;
use Altum\Middlewares\Csrf;
use Altum\Response;

class ProjectAjax extends Controller {

    public function index() {

        Authentication::guard();

        if(!empty($_POST) && (Csrf::check('token') || Csrf::check('global_token')) && isset($_POST['request_type'])) {

            switch($_POST['request_type']) {

                /* Create */
                case 'create': $this->create(); break;

                /* Delete */
                case 'delete': $this->delete(); break;

            }

        }

        die();
    }

    private function create() {

        $_POST['name'] = trim(Database::clean_string($_POST['name']));

        /* Check for possible errors */
        if(empty($_POST['name'])) {
            $errors[] = $this->language->global->error_message->empty_fields;
        }

        /* Make sure that the user didn't exceed the limit */
        $user_total_projects = Database::$database->query("SELECT COUNT(*) AS `total` FROM `projects` WHERE `user_id` = {$this->user->user_id}")->fetch_object()->total;
        if($this->user->package_settings->projects_limit != -1 && $user_total_projects >= $this->user->package_settings->projects_limit) {
            Response::json($this->language->create_project_modal->error_message->projects_limit, 'error');
        }


        if(empty($errors)) {

            /* Insert to database */
            $stmt = Database::$database->prepare("INSERT INTO `projects` (`user_id`, `name`, `date`) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $this->user->user_id, $_POST['name'], Date::$date);
            $stmt->execute();
            $stmt->close();

            Response::json($this->language->create_project_modal->success_message->created, 'success');

        }
    }

    private function delete() {
        $_POST['project_id'] = (int) $_POST['project_id'];

        /* Check for possible errors */
        if(!Database::exists('project_id', 'projects', ['project_id' => $_POST['project_id']])) {
            $errors[] = true;
        }

        if(empty($errors)) {

            /* Delete from database */
            $stmt = Database::$database->prepare("DELETE FROM `projects` WHERE `project_id` = ? AND `user_id` = ?");
            $stmt->bind_param('ss', $_POST['project_id'], $this->user->user_id);
            $stmt->execute();
            $stmt->close();

            Response::json($this->language->create_project_modal->success_message->deleted, 'success');

        }
    }
}
