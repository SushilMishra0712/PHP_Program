<html>
    <head>
        <title>Registration Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
            <div id="registration-header">
                <h3>Registration page</h3>
            </div>
            <div class="container-registration">
                <form action="../Backend/registration_validate.php" method="POST">
                    Enter FirstName<br>
                    <div id="show_error_firstname"></div>
                    <input type="text" name="firstname" placeholder="Enter firstname" id="firstname"><br><br>
                    Enter LastName<br>
                    <div id="show_error_lastname"></div>
                    <input type="text" name="lastname" placeholder="Enter lastname" id="lastname"><br><br>
                    Enter Email<br>
                    <div id="show_error_email"></div>
                    <input type="text" name="email" placeholder=" Enter email" id="email"><br><br>
                    Enter Password<br>
                    <div id="show_error_password"></div>
                    <input type="password" name="password" placeholder="*******" id="password"><br><br>
                    Enter Age<br>
                    <div id="show_error_age"></div>
                    <input type="number" name="age" placeholder="Enter age" id="age"><br><br>
                    Enter Address<br>
                    <div id="show_error_address"></div>
                    <textarea rows="5" name="address" placeholder="Enter address.." id="address"></textarea><br><br>
                    Enter PhoneNumber<br>
                    <div id="show_error_phonenumber"></div>
                    <input type="text" name="phone_number" placeholder="Enter phone number" id="phonenumber"><br><br>
                    <input type="submit" name="submit" id="submit"><br><br>
                </form>
            </div>
            <script>
            $(document).ready(function()
            {
                $('#submit').click(function()
                {
                    var firstname=$('#firstname').val();
                    var lastname=$('#lastname').val();
                    var email=$('#email').val();
                    var password=$('#password').val();
                    var age=$('#age').val();
                    var address=$('#address').val();
                    var phonenumber=$('#phonenumber').val();
                    if(firstname.length==0)
                    {
                        $('#show_error_firstname').html('firstname must be filled.');
                        $('#show_error_firstname').css('color','red');
                        $('#firstname').css('background','lightpink');
                        return false;
                    }
                    else if(firstname.length!=0)
                    {
                        if((firstname.length<=2) || (firstname.length>=26))
                        {
                            $('#show_error_firstname').html('firstname must be between 3 to 25 characters.');
                            $('#show_error_firstname').css('color','red');
                            $('#firstname').css('background','lightpink');
                            return false;  
                        }
                        if(lastname.length==0)
                        {
                            $('#show_error_lastname').html('lastname must be filled.');
                            $('#show_error_lastname').css('color','red');
                            $('#lastname').css('background','lightpink');
                            return false;
                        }
                        else if(lastname.length!=0)
                        {   
                            if((lastname.length<=2) || (lastname.length>=26))
                            {
                                $('#show_error_lastname').html('lastname must be between 3 to 25 characters.');
                                $('#show_error_lastname').css('color','red');
                                $('#lastname').css('background','lightpink');
                                return false;  
                            }
                            if(email.length==0)
                            {
                                $('#show_error_email').html('email id must be filled.');
                                $('#show_error_email').css('color','red');
                                $('#email').css('background','lightpink');
                                return false;
                            }
                            else if(email.length!=0)
                            {
                                if((email.length<=12) || (firstname.length>=36))
                                {
                                    $('#show_error_email').html('email must be between 13 to 35 characters.');
                                    $('#show_error_email').css('color','red');
                                    $('#email').css('background','lightpink');
                                    return false;  
                                }
                                
                                if(password.length==0)
                                {
                                    $('#show_error_password').html('password must be filled.');
                                    $('#show_error_password').css('color','red');
                                    $('#password').css('background','lightpink');
                                    return false;
                                }
                                else if(password.length!=0)
                                {
                                    if((password.length<=5) || (password.length>=26))
                                    {
                                        $('#show_error_password').html('password must be between 6 to 25 Alphanumeric.');
                                        $('#show_error_password').css('color','red');
                                        $('#password').css('background','lightpink');
                                        return false;  
                                    }
                                    if(age.length==0)
                                    {
                                        $('#show_error_age').html('age must be filled.');
                                        $('#show_error_age').css('color','red');
                                        $('#age').css('background','lightpink');
                                        return false;
                                    }
                                    else if(age.length!=0)
                                    {
                                        if((age<0) || (age>100))
                                        {
                                            $('#show_error_age').html('age must be between 0 to 100 years.');
                                            $('#show_error_age').css('color','red');
                                            $('#age').css('background','lightpink');
                                            return false;  
                                        }
                                        if(address.length==0)
                                        {
                                            $('#show_error_address').html('address must be filled.');
                                            $('#show_error_address').css('color','red');
                                            $('#address').css('background','lightpink');
                                            return false;
                                        }
                                        else if(address.length!=0)
                                        {
                                            if((address.length<=15) || (firstname.length>=100))
                                            {
                                                $('#show_error_address').html('address must be between 16 to 100 characters.');
                                                $('#show_error_address').css('color','red');
                                                $('#address').css('background','lightpink');
                                                return false;  
                                            }
                                            if(phonenumber.length==0)
                                            {
                                                $('#show_error_phonenumber').html('phone number must be filled.');
                                                $('#show_error_phonenumber').css('color','red');
                                                $('#phonenumber').css('background','lightpink');
                                                return false;
                                            }
                                            else if(phonenumber.length!=0)
                                            {
                                                if((phonenumber.length<10) || (phonenumber.length>15))
                                                {
                                                    $('#show_error_phonenumber').html('phone number must be between 10 to 15 digits.');
                                                    $('#show_error_phonenumber').css('color','red');
                                                    $('#phonenumber').css('background','lightpink');
                                                    return false;
                                                }
                                                else{
                                                    alert("Data sending to the server...!");
                                                    return true;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
                });
            });
            </script>
    </body>
</html>