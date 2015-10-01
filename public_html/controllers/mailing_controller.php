<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 29.09.2015
 * Time: 11:52
 */
class mailing_controller extends controller
{
    public function index()
    {
        if($users = $this->model('mailing')->getUsers()) {
            $mailing_data = $this->model('mailing')->getDailyMailingData();
            $i = 0;
            //print_r($users);
            foreach($users as $k => $user) {
                $date = date('Y-m-d 05:00:00', strtotime($user['sdate']));
                $day = date_diff(new DateTime(), new DateTime($date))->days;
                if($day == 0) {
                    continue;
                }
                if($user['sent'] >= $day)continue;
                $data = $mailing_data[$day];
                if($i == 100) {
                    break;
                }
                if($data['subject']) {
                    $this->sendEmail($day, $user, $data);
                } else {
                    continue;
                }
                $i ++;

            }

        }
    }
}