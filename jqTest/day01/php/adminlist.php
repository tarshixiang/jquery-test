<?php
header('Content-type: text/html;charset=utf-8');

$conn = new mysqli('localhost', 'root', '', 'h51620');

$conn->query('set names utf8');

$sql = "SELECT id, name, nickname from admin";

$result = $conn->query($sql);

$data = array(
    'code' => 0,
    'msg'  => '查询成功！'
);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $data['list'][] = $row;
    }
    echo json_encode($data);
} else {
    $data['code'] = 1;
    $data['msg'] = '查询失败！';
    echo json_encode($data);
}

$conn->close();
 ?>