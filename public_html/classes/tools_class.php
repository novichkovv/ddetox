<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 07.03.15
 * Time: 17:31
 */
class tools_class extends base
{
    private static $instance;

    private function __construct()
    {

    }

    public static function run()
    {
        if(self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function multilingual($symbol,$lng)
    {
        $model = new default_model('multilingual');
        $row =  $model->getByField('multilingual_language', $symbol);
        return $row['multilingual_'.$lng];
    }

    /**
     * @param int $length
     * @return string
     */

    public function generatePassword($length = 10)
    {
        $symbols = [];
        for($i = 'a'; $i <= 'z'; ++$i){
            $symbols[0][] = $i;
        }
        $symbols[1] = array('`','~','!','@','','#','$','%','^','&','*','(',')',';',':','/','?','.',',','<','>');
        for($i = 0; $i < 10; $i++) {
            $symbols[2][] = $i;
        }
        $res = '';
        for($i = 0; $i < $length; $i ++) {
            $symbol = $symbols[$r1 = rand(0,2)][rand(0, count($symbols[$r1]))];
            if($r1 == 0 && rand(0,2)) {
                $symbol = strtoupper($symbol);
            }
            $res .= $symbol;
        }
        return $res;
    }

    /**
     * @param string $subject
     * @param string $text
     * @param string $to
     * @param string $name
     * @param string $from
     * @return bool
     * @throws Exception
     * @throws phpmailerException
     */

    public function mail($subject, $text, $to, $name, $from = 'info@divinehealthdetox.com')
    {
        require_once(LIBS_DIR . 'phpmailer' . DS . 'PHPMailerAutoload.php');
        $mail = new PHPMailer;
        $mail->SetFrom($from, 'DivineHealthDetox.com');
        $mail->AddAddress($to, $name);
        $mail->Subject = $subject;
        $mail->MsgHTML($text);
        $log = 'email: ' . $to . "\n";
        $log .= 'subject: ' . $subject . "\n";
        $log .= 'text: ' . "\n" . $text . "\n";
        self::writeLog('MAIL', $log);
        return $mail->Send();
    }

    /**
     * @return int
     */

    public function startTime()
    {
        $micro_time = microtime();
        $micro_time = explode(" ",$micro_time);
        $micro_time = $micro_time[1] + $micro_time[0];
        return $micro_time;
    }

    /**
     * @param int $start_time
     * @return float
     */

    public function getTime($start_time)
    {
        $micro_time = microtime();
        $micro_time = explode(" ",$micro_time);
        $micro_time = $micro_time[1] + $micro_time[0];
        $tend = $micro_time;
        $total_time = ($tend - $start_time);
        $total_time = round($total_time, 4);
        return $total_time;
    }

    /**
     * @param string $mode
     * @param string $format
     * @return mPDF
     */

    public function pdf($mode = 'BLANK', $format = 'A4', $default_font_size = 0, $default_font= 0, $margin_left = 15, $margin_right = 15, $margin_top = 16, $margin_bottom = 16, $margin_header = 9, $margin_footer = 9 )
    {
        require_once(LIBS_DIR . 'mpdf60' . DS . 'mpdf.php');
        $mpdf = new mPDF($mode, $format, $default_font_size, $default_font, $margin_left, $margin_right, $margin_top, $margin_bottom, $margin_header, $margin_footer);
        return $mpdf;
    }

    public function translateDate($format, $stamp) {
        $date = array (
            'January'		=>	"janvier",
            'February'		=>	"février",
            'March'			=>	"mars",
            'April'			=>	"avril",
            'May'			=>	"mai",
            'June'			=>	"juin",
            'July'			=>	"juillet",
            'August'		=>	"août",
            'September'		=>	"septembre",
            'October'		=>	"octobre",
            'November'		=>	"novembre",
            'December'		=>	"décembre",
            'Jan'		=>	"",
            'Feb'		=>	"",
            'Mar'		=>	"",
            'Apr'		=>	"",
            'Jun'		=>	"",
            'Jul'		=>	"",
            'Aug'		=>	"",
            'Sep'		=>	"",
            'Oct'		=>	"",
            'Nov'		=>	"",
            'Dec'		=>	"",

            'Sunday'	=>	"dimanche",
            'Monday'	=>	"lundi",
            'Tuesday'	=>	"mardi",
            'Wednesday'	=>	"mercredi",
            'Thursday'	=>	"jeudi",
            'Friday'	=>	"vendredi",
            'Saturday'	=>	"samedi",

            'Sun'	=>	"",
            'Mon'	=>	"",
            'Tue'	=>	"",
            'Wed'	=>	"",
            'Thu'	=>	"",
            'Fri'	=>	"",
            'Sat'	=>	"",
        );
        return strtr( @date( $format, $stamp ), $date );
    }
}