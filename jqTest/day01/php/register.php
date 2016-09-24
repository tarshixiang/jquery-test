<?php
header('Content-type: text/html;charset=utf-8');

$name     = $_REQUEST['name'];
$password = $_REQUEST['pwd'];
$nickname = $_REQUEST['nickname'];

$password = md5($password);


$conn = new mysqli('localhost', 'root', '', 'h51620');

$conn->query('set names utf8');

$data = array(
    'code' => 0,
    'msg'  => '注册成功！'
);

$sql1 = "SELECT id from admin WHERE name='$name'";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    $data['code'] = 2;
    $data['msg'] = '用户名已被注册了！';

    echo json_encode($data);
} else {
    $sql = "INSERT INTO admin (name, pwd, nickname) VALUES ('$name', '$password', '$nickname')";

    if ($conn->query($sql) === true) {
        echo json_encode($data);
    } else {

        $data['code'] = 1;
        $data['msg'] = '注册失败！';

        echo json_encode($data);
    }
}

$conn->close();