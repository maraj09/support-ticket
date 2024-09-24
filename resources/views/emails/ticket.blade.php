<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Replied</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333333;
            text-align: center;
            border-bottom: 1px solid #eeeeee;
            padding-bottom: 10px;
        }
        p {
            font-size: 16px;
            color: #555555;
            line-height: 1.6;
        }
        .message {
            background-color: #f9f9f9;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            font-style: italic;
        }
        .btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            text-align: center;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888888;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Reply to Your Ticket</h1>
        <p>Hello,</p>
        <p>Your ticket titled "<strong>{{ $ticket->subject }}</strong>" has received a new reply:</p>
        
        <div class="message">
            "{{ $ticket->replies->last()->message }}"
        </div>
        
        <p>You can view your ticket and respond by clicking the button below:</p>
        
        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn">View Ticket</a>

        <p>Thank you for using our support system!</p>

        <div class="footer">
            &copy; {{ date('Y') }} Support Team. All rights reserved.
        </div>
    </div>
</body>
</html>
