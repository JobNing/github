<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2019/7/1
 * Time: 16:00
 */

class PdoClass
{
    protected $_pdo;

    public function __construct(){
        $this->_pdo = new PDO("mysql:host=localhost;dbname=pdo","root","root");
    }
    public function showkey(){
        $sql = "select * from keyss Order By time Desc";
        $db  = $this->_pdo->query($sql)->fetchAll();
        $arr['total'] = count($db);
        $num = 10;
        $arr['cpage'] = isset($_GET['page'])?$_GET['page']:1;
        $arr['pagenum'] = ceil($arr['total']/$num);
        $arr['offset'] = ($arr['cpage']-1)*$num;
        $sql = "select * from keyss Order By time Desc limit {$arr['offset']},{$num}";
        $arr['data']  = $this->_pdo->query($sql)->fetchAll();
        $arr['start'] = $arr['offset']+1;
        $arr['end']=($arr['cpage']==$arr['pagenum'])?$arr['total'] : ($arr['cpage']*$num);//结束记录页
        $arr['next']=($arr['cpage']==$arr['pagenum'])? 0:($arr['cpage']+1);//下一页
        $arr['prev']=($arr['cpage']==1)? 0:($arr['cpage']-1);//前一页
        return $arr;
    }
    public function key(){
        $rand = rand(1111,9999);
        $time = date('Y-m-d H:i:s');
        $sql = "insert into keyss values (null ,'$rand','$time')";
        $this->_pdo->exec($sql);
    }
    public function start(){
        session_start();
        $user = $_SESSION['user'];
        $sql = "select start,end from user where user ='$user'";
        return $this->_pdo->query($sql)->fetchAll();
    }

    public function end(){
        session_start();
        $user = $_SESSION['user'];
        $sql = "update user set end=end+1 where user='$user'";
        $rs = $this->_pdo->prepare($sql);
        $rs->execute();
    }
    public function logins(){
        session_start();
        $id = $_SESSION['user'];
        if ($id==''){
            echo "<script>alert('请先登录');location.href='../login.php'</script>";
        }
    }
    public function verify($user,$pwd){
        $sql = "select id,user from user where user='$user' and pwd='$pwd'";
        return $this->_pdo->query($sql)->fetchAll();
    }
    public function user($user){
        $sql = "select user from user where user='$user'";
        return $this->_pdo->query($sql)->fetchAll();
    }
    public function plus($user){
        $sql = "update user set start=start+1 where user='$user'";
        $rs = $this->_pdo->prepare($sql);
        $rs->execute();
    }
    public function registers($data){
        $father = $_SESSION['father'];
        $str = implode("','",$data);
        $sql = "insert into user values (null ,'$str',3,0,'$father')";
        $this->_pdo->exec($sql);
    }
    public function register($data){
        $str = implode("','",$data);
        $sql = "insert into user values (null ,'$str',3,0,null )";
        $this->_pdo->exec($sql);
    }
    public function toilet($house_type,$length_width,$bedroom,$door,$drawing_room,$cookhouse){
        $sql = "select distinct toilet from home where house_type='$house_type'and length_width='$length_width' and bedroom='$bedroom' and door='$door' and drawing_room='$drawing_room' and cookhouse='$cookhouse'";
        return $this->_pdo->query($sql)->fetchAll();
    }
    public function submit($house_type,$length_width,$bedroom,$door,$drawing_room,$cookhouse,$toilet){
        $sql = "select * from home where house_type='$house_type'and length_width='$length_width' and bedroom='$bedroom' and door='$door' and drawing_room='$drawing_room' and cookhouse='$cookhouse' and toilet='$toilet'";
        $db  = $this->_pdo->query($sql)->fetchAll();
        $arr['total'] = count($db);
        $num = 1;
        $arr['cpage'] = isset($_GET['page'])?$_GET['page']:1;
        $arr['pagenum'] = ceil($arr['total']/$num);
        $arr['offset'] = ($arr['cpage']-1)*$num;
        $sql = "select * from home where house_type='$house_type'and length_width='$length_width' and bedroom='$bedroom' and door='$door' and drawing_room='$drawing_room' and cookhouse='$cookhouse' and toilet='$toilet' limit {$arr['offset']},{$num}";
        //var_dump($sql);die;

        $arr['data']  = $this->_pdo->query($sql)->fetchAll();
        $arr['start'] = $arr['offset']+1;
        $arr['end']=($arr['cpage']==$arr['pagenum'])?$arr['total'] : ($arr['cpage']*$num);//结束记录页
        $arr['next']=($arr['cpage']==$arr['pagenum'])? 0:($arr['cpage']+1);//下一页
        $arr['prev']=($arr['cpage']==1)? 0:($arr['cpage']-1);//前一页
        return $arr;
    }
    public function cookhouse($house_type,$length_width,$bedroom,$door,$drawing_room){
        $sql = "select distinct cookhouse from home where house_type='$house_type'and length_width='$length_width' and bedroom='$bedroom' and door='$door' and drawing_room='$drawing_room'";
        return $this->_pdo->query($sql)->fetchAll();
    }
    public function drawing_room($house_type,$length_width,$bedroom,$door){
        $sql = "select distinct drawing_room from home where house_type='$house_type'and length_width='$length_width' and bedroom='$bedroom' and door='$door'";
        return $this->_pdo->query($sql)->fetchAll();
    }
    public function house_type(){
        $sql = "select distinct house_type from home ";
        return $this->_pdo->query($sql)->fetchAll();
    }
    public function length_width($house_type){
        $sql = "select distinct length_width from home where house_type='$house_type'";
        return $this->_pdo->query($sql)->fetchAll();
    }
    public function bedroom($house_type,$length_width){
        $sql = "select distinct bedroom from home where house_type='$house_type'and length_width='$length_width'";
        return $this->_pdo->query($sql)->fetchAll();
    }
    public function door($house_type,$length_width,$bedroom){
        $sql = "select distinct door from home where house_type='$house_type'and length_width='$length_width' and bedroom='$bedroom'";
        return $this->_pdo->query($sql)->fetchAll();
    }
    public function insertSection($data){
        $str = implode("','",$data);
        $sql = "insert into home values (null ,'$str')";
        $this->_pdo->exec($sql);
    }
    public function showSection(){
        $sql = "select * from home";
        $db  = $this->_pdo->query($sql)->fetchAll();
        $arr['total'] = count($db);
        $num = 5;
        $arr['cpage'] = isset($_GET['page'])?$_GET['page']:1;
        $arr['pagenum'] = ceil($arr['total']/$num);
        $arr['offset'] = ($arr['cpage']-1)*$num;
        $sql = "select * from home limit {$arr['offset']},{$num}";
        $arr['data']  = $this->_pdo->query($sql)->fetchAll();
        $arr['start'] = $arr['offset']+1;
        $arr['end']=($arr['cpage']==$arr['pagenum'])?$arr['total'] : ($arr['cpage']*$num);//结束记录页
        $arr['next']=($arr['cpage']==$arr['pagenum'])? 0:($arr['cpage']+1);//下一页
        $arr['prev']=($arr['cpage']==1)? 0:($arr['cpage']-1);//前一页
        return $arr;
    }
    public function deleteSection($id){
        $sql = "delete from home where id=$id";
        $rs = $this->_pdo->prepare($sql);
        $rs->execute();
        return true;
    }
    public function updSection($id){
        $sql = "select * from home where id=$id";
        $rs = $this->_pdo->query($sql);
        return $rs->fetch();
    }
    public function updsSection($id,$house_type,$length_width,$bedroom,$door,$drawing_room,$cookhouse,$toilet,$cad,$images){
        $sql = "update home set 
                house_type='$house_type',
                length_width='$length_width',
                bedroom='$bedroom',
                door='$door',
                drawing_room='$drawing_room',
                cookhouse='$cookhouse',
                toilet='$toilet',
                cad='$cad',
                images='$images' where id=$id";
                $rs = $this->_pdo->prepare($sql);
                $rs->execute();
    }
}