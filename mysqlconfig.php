<?php
   class DB{
   	function connect(){
           @$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD);//连接数据库
           mysqli_set_charset($link,DB_CHARSET);//设置数据库字体格式
           mysqli_select_db($link,DB_DBNAME) or die('Database failed to open');//选择数据库
          if(mysqli_connect_errno())
        {
        die('Database failed to open : '.mysqli_connect_errno());
        }
        return $link;
    }

    function CheckUser($link,$sql){
      $result = mysqli_query($link,$sql);
      $row = mysqli_num_rows($result);
      if($row != 0){
        return true;
        }
	  else{
        return false;
        }
     }
    function insertl($link,$sql){
       if (mysqli_query($link, $sql)) { 
          echo "<script language='javascript'> alert('message suceessful!');</script>"; 
       } else { 
          echo "Error insert data: " . $link->error; 
      }

     }
	 function print1($link,$sql){
        $result = mysqli_query($link,$sql);
        $data = array();
        while ($row = mysqli_fetch_array($result)) {
          $data[] = $row;
        }
        if ($data) {
          return $data;
        } else {
          return false;
        }
      }
     
}
?>
