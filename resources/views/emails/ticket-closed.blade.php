<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticket Closed</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f7;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .container {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .header {
      background-color: #4CAF50;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .header h1 {
      margin: 0;
    }

    .content {
      padding: 20px;
    }

    .content p {
      line-height: 1.6;
      font-size: 16px;
    }

    .content strong {
      color: #4CAF50;
    }

    .button {
      display: inline-block;
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
    }

    .footer {
      text-align: center;
      padding: 20px;
      background-color: #f4f4f7;
      font-size: 12px;
      color: #888;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="header">
      <h1>Your Ticket Has Been Closed</h1>
    </div>

    <div class="content">
      <p>Dear {{ $ticket->user->name }},</p>

      <p>We wanted to inform you that your ticket titled "<strong>{{ $ticket->subject }}</strong>" has been closed by an
        admin.</p>

      <p>If you have any further questions or require assistance, feel free to reach out to our support team by clicking
        the button below:</p>

      <p style="text-align: center;">
        <a href="{{ route('tickets.show', $ticket->id) }}" class="button">View Your Ticket</a>
      </p>

      <p>Thank you for using our support system!</p>

      <p>Best regards,</p>
      <p>The Support Team</p>
    </div>

    <div class="footer">
      <p>&copy; {{ now()->year }} Support System. All rights reserved.</p>
      <p>If you did not submit this request, please disregard this email.</p>
    </div>
  </div>

</body>

</html>
