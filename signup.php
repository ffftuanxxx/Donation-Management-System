<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="icon" href="images/logo.ico" type="images/x-ico" />
    <title>Sign up</title>
    <link rel="stylesheet" href="login.css">
    <script src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#password').focus(function(){
                // 密码框获得焦点，追加样式.password
                $('#owl').addClass('password');
            }).blur(function(){
                // 密码框失去焦点，移除样式.password
                $('#owl').removeClass('password');
            })
        })
    </script>
</head>

<body>

        <div class="container" style="height: 600px;">
            <div class="login-box" >
                <div class="owl" id="owl">
                    <div class="hand"></div>
                    <div class="hand hand-r"></div>
                    <div class="arms">
                        <div class="arm"></div>
                        <div class="arm arm-r"></div>
                    </div>
                </div>
                <div class="input-box" >
                    <br>
                    <form action="signup_action.php" method="POST" class="input-box" enctype="multipart/form-data">
                    <input type="text" placeholder="username" name="uname">
                    <input type="password" placeholder="password"name="passwd" id="password">
                    <input type="password" placeholder="confirm password" name="passwd2" id="password">
                    <input type="text" placeholder="City" name="address"><br>
                    <p>Gender</p>
                    <select name="gender" id="gender" value="">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select><br>
                    <p>Head Portrait:</p>
                    <input type="file" name="head"><br>
                    <button>Submit</button>
                    </form> 
                </div>
            <span>already has account?  <a href="login.php">go to login</a></span>
        </div>
    </div>

    <div class="square">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <div class="circle">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

</body>

</html>