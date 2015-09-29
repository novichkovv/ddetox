<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 06.03.15
 * Time: 19:47
 */
abstract class controller extends base
{
    protected $vars = array();
    protected $args;
    protected $system_header;
    protected $header;
    protected $footer;
    protected $system_footer;
    protected $controller_name;
    protected $action_name;
    public  $check_auth;
    protected $scripts = array();

    function __construct($controller, $action)
    {
        registry::set('log', array());
        $this->controller_name = $controller;
        $this->check_auth = $this->checkAuth();
        $this->action_name = $action;
    }

    /**
     * @param string $template
     * @return string
     * @throws Exception
     */

    public function fetch($template)
    {
        $template_file = ROOT_DIR . 'templates' . DS . $template . '.php';
        if(!file_exists($template_file)) {
            throw new Exception('cannot find template in ' . $template_file);
        }
        foreach($this->vars as $k => $v) {
            $$k = $v;
        }
        ob_start();
        @require($template_file);
        return ob_get_clean();
    }

    /**
     * @param string $template
     * @throws Exception
     */

    protected function view($template)
    {
        $this->render('log', registry::get('log'));
        $template_file = ROOT_DIR . 'templates' . DS . $template . '.php';
        if(!file_exists($template_file)) {
            throw new Exception('cannot find template in ' . $template_file);
        }
        $this->render('scripts', $this->scripts);
        foreach($this->vars as $k => $v) {
            $$k = $v;
        }
        if($this->system_header !== false) {
            require_once(!$this->system_header ? ROOT_DIR . 'templates' . DS . 'system_header.php' : ROOT_DIR . 'templates' . DS . $this->system_header . '.php');
        }

        if($this->header !== false) {
            require_once(!$this->header ? ROOT_DIR . 'templates' . DS . 'header.php' : ROOT_DIR . 'templates' . DS . $this->header . '.php');
        }
        if($template_file !== false) {
           require_once($template_file);
        }
        if($this->footer !== false) {
            require_once(!$this->footer ? ROOT_DIR . 'templates' . DS . 'footer.php' : ROOT_DIR . 'templates' . DS . $this->footer . '.php');
        }
        if($this->system_footer !== false) {
            require_once(!$this->system_footer ? ROOT_DIR . 'templates' . DS . 'system_footer.php' : ROOT_DIR . 'templates' . DS . $this->system_footer . '.php');
        }
    }

    /**
     * @param string $template
     * @param bool $parse
     * @throws Exception
     */

    protected function view_only($template)
    {
        $template_file = ROOT_DIR . 'templates' . DS . $template . '.php';
        if(!file_exists($template_file)) {
            throw new Exception('cannot find template in ' . $template_file);
        }
        foreach($this->vars as $k => $v) {
            $$k = $v;
        }
        require_once($template_file);

    }

    abstract function index();
    public function index_na()
    {
        header('Location: ' . SITE_DIR);
    }

    /**
     * @param string $key
     * @param mixed $value
     */

    protected function render($key, $value)
    {
        $this->vars[$key] = $value;
    }

    public function not_found() {
        $this->view('404');
    }

    /**
     * @return bool
     */
    protected function checkAuth()
    {
        //print_r($_COOKIE);
        if($_COOKIE['auth']) {
            if($user = $this->model('users')->getById($_COOKIE['user_id'])) {
                registry::set('auth', true);
                registry::set('user', $user);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param mixed $value
     */

    protected function log($value)
    {
        $log = registry::get('log');
        registry::remove('log');
        $log[] = print_r($value,1);
        registry::set('log', $log);
    }

    /**
     * @param mixed $file_name
     */

    protected function addScript($file_name) {
        if(is_array($file_name)) {
            foreach($file_name as $file) {
                $this->scripts[] = $file;
            }
        } else {
            $this->scripts[] = $file_name;
        }
    }

    protected function tools()
    {
        return tools_class::run();
    }

    /**
     * @param int $day
     * @param array $user
     */

    protected function sendEmail($day, array $user, $data = array())
    {
        if(!$data) {
            $data = $this->model('mailing_data')->getByField('mailing_day', $day);
        }
        if($data) {
            $this->render('user', $user);
            $this->render('data', $data);
            print_r($user);
            print_r($data);
            $email_text = $this->fetch('mails' . DS . $data['template']);
            $this->tools()->mail($data['subject'], $email_text, $user['email'], $user['name']);
            $user['sent'] = $day;
            $this->model('users')->insert($user, 1);
        }
    }

}