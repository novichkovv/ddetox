<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 16.12.14
 * Time: 8:28
 */
session_start();
if(!$_SESSION['login'])
{
    echo 'fuck you';
    exit;
}
require_once('config.php');
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
<form method="post" action="">
    <textarea name="query" cols="90" rows="15"> <?php echo $_POST['query'] ?></textarea>
    <input type="submit" name="query_btn">
</form>
<?php
if(isset($_POST['query_btn']))
{
    $query = $_POST['query'];
    $res = mysqli_query($con, $query);
    echo ('<table>
    ');
    $i = 0;
    while($row = $res->fetch_assoc())
    {
        if($i == 0)
        {
            echo ('
        <tr>
            ');
            foreach($row as $k => $v)
            {
                echo '<th>'.$k.'</t>';
            }
            echo ('
        </tr>
           ');
        }
        echo ('
        <tr>
            ');
        foreach($row as $k => $v)
        {
            echo '<td>'.$v.'</td>';
        }
             echo ('
        </tr>
        ');
        $i ++;
    }
}