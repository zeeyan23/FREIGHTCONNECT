
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreightConnect | Membership Application Received</title>
</head>

<body style="margin:0;padding:0;background:#f4f6f8;font-family:Arial,sans-serif;color:#333;">

    <div style="max-width:600px;margin:30px auto;background:#fff;border-radius:10px;overflow:hidden;">

        <!-- Email Header -->
        <table width="100%" cellpadding="0" cellspacing="0"
            border="0" style="background:#0055d8;">
            <tr>
                <!-- Logo -->
                <td align="left" valign="middle"
                    style="padding:25px 10px 25px 25px;">

                    <img
                        src="https://freightconnect.info/images/logos/2.png"
                        alt="FreightConnect"
                        width="240"
                        style="display:block;width:100%;max-width:240px;
                            height:auto;border:0;"
                    >

                </td>

                 <!-- Social Media Links -->
                <td align="right" valign="middle"
                    style="padding:25px 25px 25px 10px;
                        font-family:Arial,sans-serif;
                        font-size:12px;
                        white-space:nowrap;">

                    <div style="color:#ffffff;font-weight:bold;
                                margin-bottom:10px;">
                        FOLLOW US
                    </div>

                    <a href="YOUR_LINKEDIN_URL"
                    style="color:#ffffff;text-decoration:none;">
                        LinkedIn
                    </a>

                    <span style="color:#8da4bf;"> | </span>

                    <a href="YOUR_FACEBOOK_URL"
                    style="color:#ffffff;text-decoration:none;">
                        Facebook
                    </a>

                    <span style="color:#8da4bf;"> | </span>

                    <a href="YOUR_INSTAGRAM_URL"
                    style="color:#ffffff;text-decoration:none;">
                        Instagram
                    </a>

                </td>
            </tr>
        </table>


        <!-- Email Content -->
        <div style="padding:10px 35px 35px;line-height:1.7;">

            <h2 style="color:#17365d;">
                Application Submitted Successfully
            </h2>

            <p>
                Dear {{ $trader->company_name }} Team,
            </p>

            <p>
                Thank you for applying for
                <strong>Trade Partner membership</strong>
                with the FreightConnect Alliance. We have successfully
                received your application.
            </p>

            <p>
                <strong>Application status:</strong>
                <span style="color:#d18b00;font-weight:bold;">
                    Pending Review
                </span>
            </p>

            <p>
                Our team will review your application against our
                membership criteria. If additional information is
                required, we will contact you using the details
                provided in your application.
            </p>

            <p>
                You will receive an email with the outcome and
                next steps once the review is complete.
            </p>

            <p>
                For questions or updates to your application,
                please contact
                <a href="mailto:xxxxx@freightconnect.info"
                   style="color:#17365d;text-decoration:none;">
                    xxxxx@freightconnect.info
                </a>.
            </p>

            <p style="margin-top:30px;">
                Best regards,<br>
                <strong>The FreightConnect Team</strong>
            </p>

            <p style="font-size:13px;color:#666;">
                Email: xxxxx@freightconnect.info<br>
                Tel: +91xxxxxxxxxx
            </p>

        </div>

        <!-- Footer -->
        <div style="background:#0055d8;color:#fff;text-align:center;padding:16px;font-size:12px;">
            &copy; {{ date('Y') }} FreightConnect. All rights reserved.
        </div>

    </div>

</body>
</html>
