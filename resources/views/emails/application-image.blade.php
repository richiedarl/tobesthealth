{{-- resources/views/emails/application-image.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ ucfirst($applicationType) }} Application</title>
    <style>
        /* Similar to PDF styles but optimized for image capture */
        body {
            font-family: 'Arial', sans-serif;
            width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: white;
        }
     
        .header {
            background: linear-gradient(165deg, #1b7e6f, #0e6b5c);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8fafc;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .section {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #e2edf2;
        }
        .section-title {
            color: #1b7e6f;
            border-bottom: 2px solid #1b7e6f;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .field {
            margin-bottom: 10px;
        }
        .field-label {
            font-weight: 600;
            color: #1a4a5f;
            font-size: 0.9rem;
        }
        .field-value {
            color: #2c3e50;
            padding: 5px 0;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .badge-success {
            background: #d4edda;
            color: #155724;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            color: #6c757d;
            font-size: 0.9rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #e2edf2;
        }
        th {
            background: #f0fafc;
            color: #1a4a5f;
        }
    </style>
</head>
<body>
    <!-- Same content as PDF view but with fixed width for image capture -->
    @include('emails.application-pdf-content', ['data' => $data, 'staff' => $staff, 'applicationType' => $applicationType, 'hcaDetails' => $hcaDetails])
</body>
</html>