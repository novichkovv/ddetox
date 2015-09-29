<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 06.03.15
 * Time: 19:34
 */
class model
{
    public $table;
    protected $pdo;
    public $errors;
    public $rand;
    function __construct($table, $db = null, $user = null, $password = null)
    {
        $this->pdo = db_connect_singleton::getInstance($db ? $db : DB_NAME)->pdo;
        $this->table = $table;
        $this->init();
    }

    /**
     * @param PDOStatement $stm
     * @param array $data
     * @param bool $assoc
     * @return array
     */

    protected function get_all(PDOStatement $stm, array $data = array(), $assoc = true)
    {
        ($data ? $stm->execute($data) : $stm->execute());
        if($assoc) {
            $stm->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stm->setFetchMode(PDO::FETCH_NUM);
        }
        $res = array();
        while($row = $stm->fetch())
            $res[] = $row;
        return $res;
    }

    /**
     * @param PDOStatement $stm
     * @param array $data
     * @return array
     */

    protected function get_row(PDOStatement $stm, array  $data = array())
    {
        $data ? $stm->execute($data) : $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $var = $stm->fetch();
        return $var;
    }

    /**
     * @param string $order
     * @param string $limit
     * @param bool $show
     * @return array
     */

    public function getAll($order = "", $limit = "", $show = false)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table .
            ( $order ? ' ORDER BY ' . $order : '' ) .
            ( $limit ? ' LIMIT ' . $limit : '' )
        );
        if($show)echo $stm->queryString;
        return $this->get_all($stm);
    }

    /**
     * @return array
     */

    public function getRow()
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table);
        return $this->get_row($stm);
    }

    /**
     * @param array $row
     * @param string $field
     * @param bool $show
     * @param bool $check
     * @return int
     */

    public function insert(array $row, $show = false, $check = true)
    {

        if($row['id'])
        {
            $id = $row['id'];
        }
        unset($row['id']);

        $rows = array();
        $names = array();
        $data = array();
        foreach($row as $k=>$v){
            $rows[] = '`' . $k . '`';
            $names[] = ':' . $k;
            $data[] = $k . " = :" . $k;
        }
        if(isset($id)) {
            $stm = $this->pdo->prepare(
                'UPDATE ' . $this->table . ' SET ' . implode(', ', $data) . ' WHERE ' . ('id') . ' = :id'
            );
            $row['id'] = $id;
        }
        else {
            $stm = $this->pdo->prepare(
                'INSERT INTO ' . $this->table . ' (' . implode(', ', $rows) . ') VALUES ( ' . implode(', ', $names) . ')'
            );

        }
        $check_row = $row;
        if (isset($id)) {
            $check_row['id'] = $id;
        }
        if($check && !$this->checkRules($check_row, $this->rules())) {
            return false;
        }
        $stm->execute($row);
        if($show == 1) {
            echo $stm->getSQL($row);
        }
        if($show == 2) {
            $this->writeLog('MYSQL', $stm->getSQL($row));
        }
        if(!empty($id))return $id;
        return $this->pdo->lastInsertId();
    }

    /**
     * @param int $id
     * @param string $field
     * @return array
     */

    public function getById($id)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . ('id') . ' = ?');
        return $this->get_row($stm, array($id));
    }

    /**
     * @param string $field
     * @param string $value
     * @param bool $show_all
     * @param string $order
     * @param string $limit
     * @param bool $show
     * @return array
     */

    public function getByField($field, $value, $show_all = false, $order = "", $limit = '', $show = false)
    {
        $stm = $this->pdo->prepare(
            'SELECT * FROM
        ' . $this->table . ' WHERE ' . $field . ' = ?'
            . ( $order ? ' ORDER BY ' . $order : '')
            . ( $limit ? ' LIMIT ' . $limit : '')
        );
        if($show_all)
            $result = $this->get_all($stm, array($value));
        else
            $result = $this->get_row($stm, array($value));
        if($show == 1) {
            echo $stm->getSQL(array($value));
        }
        if($show == 2) {
            $this->writeLog('MYSQL', $stm->getSQL(array($value)));
        }
        return $result;
    }

    /**
     * @param array $fields
     * @param bool $show_all
     * @param string $order
     * @param string $limit
     * @param bool $show
     * @return array
     */

    public function getByFields(array $fields, $show_all = false, $order = "", $limit = '', $show = false)
    {
        $where = array();
        foreach($fields as $k => $v) {
            $where[] = $k . ' = :' . $k;
        }
        $stm = $this->pdo->prepare(
            'SELECT * FROM
        ' . $this->table . ' WHERE ' . implode(' AND ', $where)
            . ( $order ? ' ORDER BY ' . $order : '')
            . ( $limit ? ' LIMIT ' . $limit : '')
        );
        if($show_all) {
            $result = $this->get_all($stm, $fields);
        }

        else {
            $result = $this->get_row($stm, $fields);
        }

        if($show == 1) {
            echo $stm->getSQL($fields);
        }
        if($show == 2) {
            $this->writeLog('MYSQL', $stm->getSQL($fields));
        }
        return $result;
    }

    /**
     * @param int $id
     * @param string $field
     * @param bool $show
     * @return bool
     */

    public function deleteById($id, $show = false)
    {
        if($id == '')return;
        $stm = $this->pdo->prepare('
        DELETE FROM ' . $this->table . ' WHERE ' . ('id') . ' = :id
        ');
        if($show)echo $stm->queryString;
        if($stm->execute(array('' . 'id'=>$id)))
            return true;
        else
            return false;
    }

    /**
     * @param string $field
     * @param string $value
     * @param bool $show
     * @return bool
     */

    public function delete($field, $value, $show = false)
    {
        $stm = $this->pdo->prepare('
        DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :' . $field . '
        ');
        if($show)echo $stm->queryString;
        if($stm->execute(array($field => $value)))
            return true;
        else
            return false;
    }

    /**
     * @param bool $show
     * @return bool
     */

    public function deleteAll($show = false)
    {
        $stm = $this->pdo->prepare('
        DELETE FROM ' . $this->table . '
        ');
        if($show)echo $stm->queryString;
        if($stm->execute())
            return true;
        else
            return false;
    }

    /**
     * @param array $fields
     * @param bool $show
     * @return bool
     */

    public function deleteByFields(array $fields, $show = false) {
        $where = array();
        foreach($fields as $k => $v) {
            $where[] = $k . ' = :' . $k;
        }
        $stm = $this->pdo->prepare(
            'DELETE FROM
        ' . $this->table . ' WHERE ' . implode(' AND ', $where)
        );
        $this->writeLog('test', $stm->getSQL($fields));
        if($show) {
            echo $stm->getSQL($fields);
        }
        if($stm->execute($fields))
            return true;
        else
            return false;
    }

    /**
     * @param null $field
     * @param null $value
     * @return mixed
     */

    public function countByField($field = null, $value = null)
    {
        $stm = $this->pdo->prepare('
        SELECT COUNT(*) count FROM ' . $this->table . ( $field ? ' WHERE ' . $field . ' = :' .$field : '' ) . '
        ');
        return $this->get_row($stm, array($field => $value))['count'];
    }

    public function memcached($lifetime, $method)
    {
        $arg_list = func_get_args();
        unset($arg_list[0]);
        unset($arg_list[1]);
        if(MEMCACHED)
        {
            $str = get_class($this) . $method . ( $arg_list ? implode('', $arg_list) : '' );
            $key = md5($str);

            $memcache_obj = new Memcache;
            $memcache_obj->connect('127.0.0.1', 11211) or die('Could not connect');
            $var_key = @$memcache_obj->get($key);
            if(!empty($var_key))
            {
                $result =  $var_key;
            }
            else
            {
                $result = call_user_func_array(array($this, $method),$arg_list);
                $memcache_obj->set($key, $tmp, false, $lifetime);
            }
            $memcache_obj->close();
        }
        else
            $result = call_user_func_array(array($this, $method),$arg_list);


        return $result;
    }

    public function setOption($key, $value)
    {
        if($this->getOption($key) !== null) {

            $stm = $this->pdo->prepare('UPDATE options SET option_value = :option_value WHERE option_key = :option_key');
        } else {
            $stm = $this->pdo->prepare('INSERT INTO reports_options SET option_key = :option_key, option_value = :option_value');
        }
        $row = array('option_key' => $key, 'option_value' => $value);
        $stm->execute($row);
    }

    public function getOption($key)
    {
        $stm = $this->pdo->prepare('SELECT * FROM options WHERE `option_key` = :option_key');
        $res = $this->get_row($stm, array('option_key' => $key));
        return $res['option_value'];
    }

    /**
     * @param array $row
     * @param string $field
     * @param bool $show
     * @return int
     */

    public function updateByField(array $row, $field = '', $show = false)
    {
        if(!$field) $field = 'id';
        if(isset($row[$field]))
        {
            $id = $row[$field];
            unset($row[$field]);
        }
        $rows = array();
        $names = array();
        $data = array();
        foreach($row as $k=>$v)
        {
            $rows[] = '`' . $k . '`';
            $names[] = ':' . $k;
            $data[] = '`' .$k . '` = :' . $k;

        }
        if(isset($id))
        {
            $stm = $this->pdo->prepare(
                'UPDATE ' . $this->table . ' SET ' . implode(', ', $data) . ' WHERE ' . $field . ' = :' . $field
            );
            $row[$field] = $id;
        }
        else $stm = $this->pdo->prepare(
            'INSERT INTO ' . $this->table . ' (' . implode(', ', $rows) . ') VALUES ( ' . implode(', ', $names) . ')'
        );
        $stm->execute($row);
        if($show)echo $stm->queryString;
        if(!empty($id))return $id;
        return $this->pdo->lastInsertId();
    }

    protected function init()
    {

    }

    /**
     * @param string $field
     * @param string $str
     * @param array $select
     * @param bool $offset
     * @param string $limit
     * @return array
     */

    public function findByField($field, $str, array $select = array('*'), $offset = true, $limit = '20')
    {
        $select = implode(', ', $select);
        $stm = $this->pdo->prepare('
        SELECT ' . $select . ' FROM ' . $this->table . ' WHERE ' . $field . ' LIKE :str ' . ($limit ? 'LIMIT ' . $limit : '') . '
        ');
        return $this->get_all($stm, array('str' => ( $offset ? '%' : '' ) . $str . '%'));
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

    protected function rules()
    {
        return array();
    }

    /**
     * @param array $row
     * @param array $rules
     * @return bool
     */

    protected function checkRules(array $row, array $rules = array())
    {
        $this->errors = [];
        if (is_array($rules['rules'])) {
            foreach ($rules['rules'] as $field => $rules_arr) {
                if ($rules_arr['required']) {
                    if($row[$rules['id']]) {
                        if (isset($row[$field]) && $row[$field] == '') {
                            $this->errors[][$field]['required'] = array(
                                'label' => $rules_arr['label'],
                                'text' => $rules_arr['label'] . ' est requis!'
                            );
                        }
                    } else {
                        if (!$row[$field] && $row[$field] !== 0) {
                            $this->errors[][$field]['required'] = array(
                                'label' => $rules_arr['label'],
                                'text' => $rules_arr['label'] . ' est requis!'
                            );
                        }
                    }

                }
                if ($rules_arr['min']) {
                    if ($row[$field] && strlen($row[$field]) < $rules_arr['min']) {
                        $this->errors[][$field]['min'] = array(
                            'label' => $rules_arr['label'],
                            'text' => $rules_arr['label'] . ' must have minimum ' . $rules_arr['min'] . ' symbols !'
                        );
                        //$this->errors[]['min'] = $field;
                    }
                }
                if ($rules_arr['max']) {
                    if ($row[$field] && strlen($row[$field]) > $rules_arr['max']) {
                        $this->errors[][$field]['max'] = array(
                            'label' => $rules_arr['label'],
                            'text' => $rules_arr['label'] . ' must have maximum ' . $rules_arr['max'] . ' symbols !'
                        );
                        //$this->errors[]['max'] = $field;
                    }
                }
                if ($rules_arr['unique']) {
                    $res = $this->get_row($this->pdo->prepare('SELECT ' . $rules['id'] . ' FROM ' . $this->table . ' WHERE `' . $field . '` = :value'), array('value' => $row[$field]));
                    if ($res && $res[$rules['id']] != $row[$rules['id']]) {
                        $this->errors[][$field]['unique'] = array(
                            'label' => $rules_arr['label'],
                            'text' => $rules_arr['label'] . ' must be unique! ' . $rules_arr['unique'] . ' already exists.'
                        );
                        //$this->errors[]['unique'] = $field;
                    }
                }
                if ($rules_arr['int']) {
                    if ($row[$field] && !is_numeric($row[$field])) {
                        $this->errors[][$field]['unique'] = array(
                            'label' => $rules_arr['label'],
                            'text' => $rules_arr['label'] . ' must be an integer!'
                        );
                        $this->errors[]['int'] = $field;
                    }
                }
            }
        }
        if($this->errors) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param string $file
     * @param mixed $value
     * @param string $mode
     */

    protected function writeLog($file, $value, $mode = 'a+') {
        $f = fopen(ROOT_DIR . 'logs' . DS . $file . '.log', $mode);
        fwrite($f, date('Y-m-d H:i:s') . ' - ' .print_r($value, true) . "\n");
        fclose($f);
    }
}
