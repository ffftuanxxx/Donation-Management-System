<?php
  // 使用 "root" 用户名和密码连接到本地数据库服务器
  $conn = new mysqli("127.0.0.1", "root", "","donate");

  // 检查连接是否成功
  if (!$conn) {
    // 连接失败，显示错误信息
    die("Error connecting to database: " . mysqli_connect_error());
  } else {
    // 连接成功，继续执行代码...
  }
?>
