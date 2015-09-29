<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 06.03.15
 * Time: 19:47
 */
class base
{
    /**
     * @param string $model
     * @param null/string $table
     * @param null/string $db
     * @param null/string $user
     * @param null/string $password
     * @return model
     */

    protected function model($model, $table = null, $db = null, $user = null, $password = null)
    {
        $models = registry::get('models');
        if(!$m = $models[$model][$table]) {
            $model_file = ROOT_DIR . 'models' . DS . $model . '_model.php';
            if(file_exists($model_file)) {
                $model_class = $model . '_model';
                $m = new $model_class($table ? $table : $model, $db, $user, $password);
            } else {
                $m = new default_model($model);
            }
            $models[$model][$table] = $m;
            registry::remove('models');
            registry::set('models', $models);
        }
        return $m;
    }

    protected function writeLog($file, $value, $mode = 'a+') {
        $f = fopen(ROOT_DIR . 'logs' . DS . $file . '.log', $mode);
        fwrite($f, date('Y-m-d H:i:s') . ' - ' .print_r($value, true) . "\n");
        fclose($f);
    }
}