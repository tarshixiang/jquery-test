<?php
header('Content-type: text/html;charset=utf-8');

$id = $_GET['id'];

$conn = new mysqli('localhost', 'root', '', 'h51620');

$conn->query('set names utf8');

$sql = "DELETE FROM admin WHERE id='$id'";

$data = array(
    'code' => 0,
    'msg'  => '删除成功！'
);


$conn->query($sql);

if ($conn->affected_rows > 0) {
    echo json_encode($data);
} else {
    $data['code'] = 1;
    $data['msg'] = '删除不成功！';
    echo json_encode($data);
}

$conn->close();
 ?>