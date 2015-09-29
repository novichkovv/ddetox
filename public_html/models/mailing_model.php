<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 29.09.2015
 * Time: 11:56
 */
class mailing_model extends model
{
    public function getUsers()
    {
        return $this->get_all($stm = $this->pdo->prepare('
            SELECT
                *
            FROM
                users
            WHERE
                sdate > NOW() - INTERVAL 28 DAY
                    AND
                sent < 30
        '));
    }

    public function getDailyMailingData()
    {
        $tmp = $this->get_all($stm = $this->pdo->prepare('
        SELECT
                *
        FROM
            mailing_data
        '));
        $res = [];
        foreach($tmp as $row) {
            $res[$row['mailing_day']] = $row;
        }
        return $res;
    }
}