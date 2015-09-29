<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 15.03.15
 * Time: 17:26
 */
class mystatement extends PDOStatement
{
    protected $connection;
    protected $bound_params = array();

    protected function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getSQL($values = array())
    {
        $sql = $this->queryString;

        if (sizeof($values) > 0) {
            foreach ($values as $key => $value) {
                $sql = str_replace(':' . $key, $this->connection->quote($value), $sql);
            }
        }

        if (sizeof($this->bound_params)) {
            foreach ($this->bound_params as $key => $param) {
                $value = $param['value'];
                if (!is_null($param['type'])) {
                    $value = self::cast($value, $param['type']);
                }
                if ($param['maxlen'] && $param['maxlen'] != self::NO_MAX_LENGTH) {
                    $value = self::truncate($value, $param['maxlen']);
                }
                if (!is_null($value)) {
                    $sql = str_replace(':' . $key, $this->connection->quote($value), $sql);
                } else {
                    $sql = str_replace(':' . $key, 'NULL', $sql);
                }
            }
        }
        return $sql;
    }
}