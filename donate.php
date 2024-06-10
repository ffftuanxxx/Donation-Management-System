<?php
    include 'connect_user.php';
    $id = $_GET['id'];
    $type = $_GET['type'];
    $sql = "select QR_code from (SELECT * FROM individual UNION SELECT * FROM plant UNION SELECT * FROM relic UNION SELECT * FROM area UNION SELECT * FROM animal)as temp where b_id = $id";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<head>
  <style>
    input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button { 
            -webkit-appearance: none; 
        }
        input[type="number"]{ 
            -moz-appearance: textfield; 
    }
    div{
      text-align: center;
    }
    .divstyle{
      background: #fff;
      position: absolute;
	    left: 40%;
      top: 20%;
      width: 380px; 
      height: 420px; 
      margin-top: 80px;
      border: none; 
      border-radius: 20px;
      box-shadow: 0 0 14px 6px rgb(0 0 0 / 5%);
      text-align: center;      
    }
    img{
      padding-top:35px;
      width: 350px; 
      height: 320px; 
    }
  </style>
</head>
<body style="background-color: rgba(207, 207, 207, 0.226)">
      <div>
      
        </form>
        <h3> &nbsp收银台</h3>
        <p style="color:grey"> &nbsp请扫描二维码支付</p>
        <div class='divstyle'>
          <br>
          <form action="<?php echo"handle_fund.php?id=".$id ?><?php echo"&type=".$type ?>" method="POST" style="border:none;">
            <input type="number" name="fundnumber" value="10" style="width:80px;font-size:22px;text-align:center; border:none; ">
            <input type="submit" value="CNY" style="border:none; background-color:white; font-size:20px;">
          </form>
          <img src="./donate/QR/<?php echo $row['QR_code'] ?>" >
        </div>

      </div>
    
</body>
</html>


