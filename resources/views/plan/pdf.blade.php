<!DOCTYPE html>
<html>
<head>
    <title>Assigned Plan</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { text-align: center; }
        .section { margin-bottom: 20px; }
        .section h2 { border-bottom: 1px solid #000; }
        .content { white-space: pre-wrap; }
    </style>
</head>
<body>
    <h1>Assigned Plan for {{ $member->name }}</h1>

    <div class="section">
        <h2>Diet Plan</h2>
        <div class="content">{{ $dietPlan ?? 'No diet plan assigned.' }}</div>
    </div>

    <div class="section">
        <h2>Workout Plan</h2>
        <div class="content">{{ $workoutPlan ?? 'No workout plan assigned.' }}</div>
    </div>
</body>
</html>
