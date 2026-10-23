
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreightConnect Application</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f8;font-family:Arial,sans-serif;color:#333;">
    <div style="max-width:600px;margin:30px auto;background:#fff;border-radius:10px;overflow:hidden;">

        <div style="text-align:center;padding:30px 20px;">
            <img
                src="https://freightconnect.info/images/logos/email_image.png"
                alt="FreightConnect"
                style="max-width:220px;max-height:80px;"
            >
        </div>

        <div style="padding:10px 35px 35px;line-height:1.7;">
            <h2 style="color:#17365d;">
                Application Submitted Successfully!
            </h2>

            <p>Dear {{ $trader->company_name }},</p>

            <p>
                Thank you for registering your business with
                <strong>FreightConnect</strong>.
            </p>

            <p>
                We confirm that your trade partner application has been
                received and is currently <strong>under review</strong>
                by our team.
            </p>

            <p>
                We will contact you if additional information is required
                and update you regarding the outcome of your application.
            </p>

            <p>
                Thank you for your interest in partnering with FreightConnect.
            </p>

            <p style="margin-top:30px;">
                Best regards,<br>
                <strong>FreightConnect Team</strong>
            </p>
        </div>

        <div style="background:#17365d;color:#fff;text-align:center;padding:16px;font-size:12px;">
            &copy; {{ date('Y') }} FreightConnect. All rights reserved.
        </div>
    </div>
</body>
</html>
