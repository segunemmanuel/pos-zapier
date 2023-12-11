<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: {{ $fontSize }}pt;
            color: {{ $textColor }};
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .header {
            text-align: center;
        }
        .content {
            text-align: justify;
        }
        .section {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $data['school'] }}</h1>
            <h2>{{ $data['courseName'] }}</h2>
        </div>
        <div class="content">
            <div class="section">
                <strong>School Address:</strong> {{ $data['schoolAddress'] }}<br>
                <strong>Level:</strong> {{ $data['level'] }}<br>
                <strong>Geolocation:</strong> {{ $data['geolocation'] }}<br>
                <strong>Enrollment:</strong> {{ $data['enrollment'] }}<br>
                <strong>Square Feet:</strong> {{ $data['squareFeet'] }}<br>
                <strong>School Acres:</strong> {{ $data['schoolAcres'] }}<br>
                <strong>Phone:</strong> {{ $phone }}<br>
            </div>
            <div class="section">
                <h3>Quiz Names</h3>
                <ul>
                    @foreach ($data['quizName'] as $quizName)
                        <li>{{ $quizName }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="section">
                <h3>Action Plans</h3>
                @foreach ($data['actionPlans'] as $plan)
                    <p>{{ $plan }}</p>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
