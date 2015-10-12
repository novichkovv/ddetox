<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 06.03.15
 * Time: 19:34
 */
class index_controller extends controller
{
    public function index()
    {
        if(isset($_POST['sign_in_btn'])) {
            $user = $_POST['user'];
            if($user['email']) {
                $user['sdate'] = date('Y-m-d H:i:s');
                $user['id'] = $this->model('users')->insert($user);
                $this->sendEmail(0, $user);
                setcookie('auth', 1, time() + 3600 * 24 * 28);
                setcookie('user_id', $user['id'], time() + 3600 * 24 * 28);
                header('Location: ' . SITE_DIR . 'success/');
                exit;
            } else {
                $this->render('user', $user);
                $this->render('warning', 'Please, Enter Email Address');
            }
        }

        if($_GET['email']) {
            $user = [];
            $user['email'] = $_GET['email'];
            $user['login'] = '';
            $user['phone'] = '';
            $user['sdate'] = date('Y-m-d H:i:s');
            $user['id'] = $this->model('users')->insert($user);
            $this->sendEmail(0, $user);
            setcookie('auth', 1, time() + 3600 * 24 * 28);
            setcookie('user_id', $user['id'], time() + 3600 * 24 * 28);
            header('Location: ' . SITE_DIR . 'success/');
            exit;
        }

        if(isset($_POST['log_out_btn'])) {
            setcookie('auth', 0, time() - 3600);
            setcookie('user_id', 0, time() - 3600);
            header('Location: ' . SITE_DIR);
        }

        if(isset($_GET['uid']) && registry::get('user')['id'] != $_GET['uid']) {
            if($user = $this->model('users')->getById($_GET['uid'])) {
                setcookie('auth', 1, time() + 3600 * 24 * 28);
                setcookie('user_id', $user['id'], time() + 3600 * 24 * 28);
                registry::remove('user');
                header('Location: ' . SITE_DIR . $_SERVER['REQUEST_URI']);
            }
        }

        if(!$this->check_auth) {
            $this->render('skip_nav', true);
            $this->view_only('sign_in_page');
            //$this->view('under_construction_page');
        } else {
            $this->render('skip_nav', true);
            $this->render('user', registry::get('user'));
            if($_GET['day']) {
                $day = $_GET['day'] > registry::get('user')['sent'] ? registry::get('user')['sent'] : $_GET['day'];
            } else {
                $day = registry::get('user')['sent'];
            }
            $this->render('day', $day);
            $this->render('data', $this->model('mailing_data')->getByField('mailing_day', $day));
            $this->view('index');
        }
    }

    public function signout()
    {
        if(!$users = $this->model('users')->getByField('email', $_GET['mail'], true)) {
            header('Location: ' . SITE_DIR);
        }
        if(isset($_POST['sign_out_btn'])) {
            if($users) {
                foreach($users as $user) {
                    $user['sent'] = 100;
                    $this->model('users')->insert($user);
                }
            }
            $this->render('success', 1);
        }
        $this->view_only('sign_out_page');
    }
}