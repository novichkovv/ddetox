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
        $count = 0;
        if($users = $this->model('mailing')->getUsers()) {
            $mailing_data = $this->model('mailing')->getDailyMailingData();
            $i = 0;
            foreach($users as $k => $user) {
                if(!$user['email']) {
                    continue;
                }
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
                    $count ++;
                } else {
                    continue;
                }
                $i ++;
            }
        }
        $this->writeLog('MAILING', 'success');
        $this->writeLog('MAILING', $count);
    }
}