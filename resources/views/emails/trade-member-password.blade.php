
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trade Member Account Password</title>
</head>
<body style="margin: 0; padding: 30px; font-family: Arial, sans-serif; background-color: #f4f6f8;">

    <div style="max-width: 550px; margin: auto; padding: 35px; background: #ffffff; border-radius: 10px;">

        <h2 style="color: #1b365d;">FreightConnect</h2>

        <h3>Your Trade Member Account Is Ready</h3>

        <p>Hello,</p>

        <p>
            Your email has been successfully verified, and your
            FreightConnect Trade Member login credentials have been created.
        </p>

        <p>Your generated password is:</p>

        <div style="margin: 25px 0; padding: 20px; text-align: center; background: #f1f5f9; border-radius: 8px;">
            <span style="font-size: 24px; font-weight: bold; letter-spacing: 3px; color: #1b365d;">
                {{ $password }}
            </span>
        </div>

        <p>
            Please keep this password secure and do not share it with anyone.
        </p>

        <p>You can now use your registered business email and this password to log in.</p>

        <p style="margin-top: 30px;">
            Regards,<br>
            <strong>FreightConnect Team</strong>
        </p>

    </div>

</body>
</html>
