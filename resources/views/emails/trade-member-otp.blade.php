
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trade Member Verification</title>
</head>
<body style="margin: 0; padding: 30px; font-family: Arial, sans-serif; background-color: #f4f6f8;">

    <div style="max-width: 550px; margin: auto; padding: 35px; background: #ffffff; border-radius: 10px;">

        <h2 style="color: #1b365d;">FreightConnect</h2>

        <h3>Verify Your Trade Member Account</h3>

        <p>Hello,</p>

        <p>
            We received a request to activate your FreightConnect Trade Member account.
            Please use the verification code below:
        </p>

        <div style="margin: 30px 0; padding: 20px; text-align: center; background: #f1f5f9; border-radius: 8px;">
            <span style="font-size: 32px; font-weight: bold; letter-spacing: 8px; color: #1b365d;">
                {{ $otp }}
            </span>
        </div>

        <p>This verification code expires in <strong>5 minutes</strong>.</p>

        <p>If you did not request this code, you can safely ignore this email.</p>

        <p style="margin-top: 30px;">
            Regards,<br>
            <strong>FreightConnect Team</strong>
        </p>

    </div>

</body>
</html>
