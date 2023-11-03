<?php 

# $fullPath = $_POST['fullPath']  客户端文件路径，需要根据路径在服务器创建目录

$filePath = trim(dirname($_POST['fullPath']),' \\/');
$fullPath = 'upload/' . $filePath;
if(!is_dir($fullPath)){
    mkdir($fullPath,0777,true) or die(json_encode(['code'=>0,'msg'=>'目录创建失败']));
}
if (move_uploaded_file($_FILES['file']['tmp_name'], "{$fullPath}/{$_FILES['file']['name']}")) {
    echo json_encode(['code'=>1,'msg'=>'success']);
} else {
    echo json_encode(['code'=>0,'msg'=>'failed']);
}