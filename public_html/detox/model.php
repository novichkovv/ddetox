<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 19.12.14
 * Time: 18:12
 */
require_once('config.php');
class model
{
    public $table;
    private $pdo;
    function __construct($table)
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;// . ';charset=' . CHARSET;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS ,PDO::NULL_TO_STRING);
        $this->pdo->exec("SET NAMES utf8");
		$this->pdo->exec("SET sql_mode = ''");
        $this->table = $table;
    }
    protected function get_all($stm, array $data = array())
    {
        ($data ? $stm->execute($data) : $stm->execute());
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $res = array();
        while($row = $stm->fetch())
            $res[] = $row;
        return $res;
    }
    protected function get_row($stm, array  $data = array())
    {
        $data ? $stm->execute($data) : $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        return $stm->fetch();
    }
    public function getAll($order = "", $limit = "", $show = false)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table .
            ( $order ? ' ORDER BY ' . $order : '' ) .
            ( $limit ? ' LIMIT ' . $limit : '' )
        );
        if($show)echo $stm->queryString;
        return $this->get_all($stm);
    }
    public function getRow()
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table);
        return $this->get_row($stm);
    }
    public function insert(array $row, $show = false)
    {
        if(isset($row['user_id']))
        {
            $id = $row['user_id'];
            unset($row['user_id']);
        }
        $rows = array();
        $names = array();
        $data = array();
        foreach($row as $k=>$v)
        {
            $rows[] = '`' . $k . '`';
            $names[] = ':' . $k;
            $data[] = $k . " = :" . $k;

        }
        if(isset($id))
        {
            $stm = $this->pdo->prepare(
                'UPDATE ' . $this->table . ' SET ' . implode(', ', $data) . ' WHERE user_id = :user_id'
            );
            $row['user_id'] = $id;
        }
        else $stm = $this->pdo->prepare(
            'INSERT INTO ' . $this->table . ' (' . implode(', ', $rows) . ') VALUES ( ' . implode(', ', $names) . ')'
        );
        $stm->execute($row);
        if($show)echo $stm->queryString;
        if(!empty($id))return $id;
        return $this->pdo->lastInsertId();
    }
    public function getById($id)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        return $this->get_row($stm, array($id));
    }
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
        if($show)echo $stm->queryString;
        return $result;
    }
    public function deleteById($id, $show = false)
    {
        if($id == '')return;
        $stm = $this->pdo->prepare('
        DELETE FROM ' . $this->table . ' WHERE id = :id
        ');
        if($show)echo $stm->queryString;
        if($stm->execute(array('id'=>$id)))
            return true;
        else
            return false;
    }
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

    public function countByField($field, $value)
    {
        $stm = $this->pdo->prepare('
        SELECT COUNT(id) count FROM ' . $this->table . ' WHERE ' . $field . ' = :' .$field . '
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

}