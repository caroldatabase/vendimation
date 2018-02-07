<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome! Verify your email address to get started</title>
<style type="text/css">
table {
    border-collapse: collapse;
    border-color:#ccc;
     font-family:Arial, Helvetica, sans-serif ;
}
</style>
</head>
<body>
 
<table width="600" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#971800" style="background-color:#fff;">
      <tr>
          <td align="center" valign="top" bgcolor="#ffffff" >
            <table width="90%" border="0" cellspacing="0" cellpadding="10" style="margin-bottom:10px;">
              <tr>
                <td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000;"> 
                  <div>
<<<<<<< HEAD
                        <p>Dear {{$content['name']}},</p>
=======
                        <p>Dear {{$content['first_name']}},</p>
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
                        <p>Welcome !</p>
                        <p>Thank you for registration. To activate
your account, please click the link below to confirm your email address and
get started.
                        </p>
                        <p>
<<<<<<< HEAD
                          <a href="{{ url('admin/email_verification?verification_code='.$content['verification_token'].'&email='.$content['receipent_email']) }}">
=======
                          <a href="{{ url('api/v1/email_verification?verification_code='.$content['verification_token'].'&email='.$content['email']) }}">
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
                          Verify Your E-mail Address  
                        </a> 
                      </p>
                      <p> Or copy & paste this link into your browser.<br>
<<<<<<< HEAD
                        <a href="{{ url('admin/email_verification?verification_code='.$content['verification_token'].'&email='.$content['receipent_email']) }}">
                          {{ url('api/v1/email_verification?verification_code='.$content['verification_token'].'&email='.$content['receipent_email']) }}</a> 
                      </p> 
                          <p>Best Regards,</p>
                          <p>Team Vendimation</p>
=======
                        <a href="{{ url('api/v1/email_verification?verification_code='.$content['verification_token'].'&email='.$content['email']) }}">
                          {{ url('api/v1/email_verification?verification_code='.$content['verification_token'].'&email='.$content['email']) }}</a> 
                      </p> 
                          <p>Best Regards,</p>
                          <p>Team Yellotasker</p>
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9

                  </div>
                </td>
            </tr>
          </table>
        </td>
      </tr>
  </table>
</body>
</html>
