<html>
    <head>
        <title>Login Page
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="container">
            <div id="login-header">
            <h3> Login page</h3>
            </div>
            <div class="container-login">
            <form action="../Backend/login_validate.php" method="POST">
            Enter Email<br>
            <div id="show_error_email"></div>
            <input type="text" name="email" id="email" placeholder="Enter email" required><br><br>
            Enter Password<br>
            <div id="show_error_password"></div>
            <input type="password" name="password" id="password" placeholder="********" required><br><br>
            <input type="submit" name="submit" value="Login" id="submit"><br><br><br>
            </form>
            &nbsp;Don't have account?
            <a href="registration.php"><button>SignUp</button></a>
            </div>
        </div>
        <script>
            $(document).ready(function()
            {
                $('#submit').click(function()
                {
                    var user_email=$('#email').val();
                    var user_password=$('#password').val();
                    if(user_email.length==0)
                    {
                        $('#show_error_email').html('email id must be filled.');
                        $('#show_error_email').css('color','red');
                        $('#email').css('background','lightpink');
                        if(user_password.length==0)
                        {
                            $('#show_error_password').html('password must be filled.');
                            $('#show_error_password').css('color','red');
                            $('#password').css('background','lightpink');
                            return false;
                        }
                        return false;
                    }
                    else if(user_email.length!=0)
                    {
                        if((user_email.length<=2) || (user_email.length>=26))
                        {
                            $('#show_error_email').html('email id must be between 3 to 25 characters.');
                            $('#show_error_email').css('color','red');
                            $('#email').css('background','lightpink');
                            return false;  
                        }
                        if(user_password.length==0)
                        {
                            $('#show_error_password').html('password must be filled.');
                            $('#show_error_password').css('color','red');
                            $('#password').css('background','lightpink');
                            return false;
                        }
                    }
                    
                });
            });
            </script>
    </body>
</html>