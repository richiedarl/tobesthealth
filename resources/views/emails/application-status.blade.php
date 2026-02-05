<p>Hello {{ $application->name }},</p>

<p>
Your application for
<strong>{{ $application->offer->title }}</strong>
has been updated.
</p>

<p>
Current status:
<strong>{{ ucfirst($application->status) }}</strong>
</p>

<p>
Our team will reach out if further steps are required.
</p>

<p>
Regards,<br>
TobestHealth Team
</p>
