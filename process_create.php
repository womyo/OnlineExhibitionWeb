<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '****',
  'opentutorials');

//filtering
$filtered = array(
  'name'=>mysqli_real_escape_string($conn, $_POST['name']),
  'content'=>mysqli_real_escape_string($conn, $_POST['content'])
);

$sql = "
  INSERT INTO guest
    (name, content, created)
    VALUES(
      '{$filtered['name']}',
      '{$filtered['content']}',
      NOW()
    )
";

$result = mysqli_query($conn, $sql);
if($result == false){
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
  error_log(mysqli_error($conn));
}
else {
  header("location:guestbook.php");
}
 ?>
