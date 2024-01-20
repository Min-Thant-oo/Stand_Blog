{{-- <strong>Name</strong> - <span>{{$contactMessage->name}}</span> <br /> <br />
<strong>Email</strong> - <span>{{$contactMessage->email}}</span> <br /> <br />
<strong>Subject</strong> - <span>{{$contactMessage->subject}}</span> <br /> <br />
<strong>Message</strong> - <span>{{$contactMessage->message}}</span> <br /> <br /> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
            margin-top: 20px;
        }
        strong {
            color: #007BFF;
        }
        span {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Message</h2>
        <strong>Name:</strong> <span>{{$contactMessage->name}}</span> <br><br>
        <strong>Email:</strong> <span>{{$contactMessage->email}}</span> <br><br>
        <strong>Subject:</strong> <span>{{$contactMessage->subject}}</span> <br><br>
        <strong>Message:</strong> <span>{{$contactMessage->message}}</span> <br><br>
    </div>
</body>
</html>
