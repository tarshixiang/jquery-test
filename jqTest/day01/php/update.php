<?php
header('Content-type: text/html;charset=utf-8');

$id = $_POST['id'];
$nickname = $_POST['nickname'];

$conn = new mysqli('localhost', 'root', '', 'h51620');

$conn->query('set names utf8');

$sql = "update admin set nickname='$nickname' WHERE id='$id'";

$data = array(
    'code' => 0,
    'msg'  => '修改成功！'
);
if ($conn->query($sql) === true) {
    echo json_encode($data);
} else {
    $data['code'] = 1;
    $data['msg'] = '修改失败！';
    echo json_encode($data);
}

$conn->close();
 ?>