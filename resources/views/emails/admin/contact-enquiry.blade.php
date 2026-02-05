<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Enquiry</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f8f9fa; padding:30px;">

    <div style="max-width:600px; margin:auto; background:#ffffff; padding:25px; border-radius:8px;">

        <h2 style="color:#1992C9; margin-bottom:20px;">
            New Contact Enquiry
        </h2>

        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Subject:</strong> {{ $contact->subject }}</p>

        <hr style="margin:20px 0;">

        <p><strong>Message:</strong></p>

        <p style="white-space: pre-line;">
            {{ $contact->message }}
        </p>

        <hr style="margin:25px 0;">

        <p style="font-size:13px; color:#6c757d;">
            Login to the admin panel to respond to this enquiry.
        </p>

    </div>

</body>
</html>
