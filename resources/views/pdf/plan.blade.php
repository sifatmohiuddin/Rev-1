<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Member Plan PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 15px;
            font-size: 13px;
            line-height: 1.2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 30px;
            margin: 0;
        }
        .header p {
            margin: 0;
            font-size: 9px;
        }
        .section-title {
            font-size: 15px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 4px;
            border-bottom: 0.5px solid #000;
            padding-bottom: 2px;
        }
        .member-info p {
            margin: 1px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            vertical-align: top;
            padding: 2px;
        }
        .column-content {
            margin-bottom: 6px;
        }
        .signature {
            margin-top: 20px;
            padding-top: 50px;
            border-top: 0.5px solid #000;
            font-size: 12px;
            text-align: right;
        }
    </style>
</head>
<body>
{{-- <div class="header" style="display: flex; align-items: center; justify-content: space-between;">
    <div style="flex-shrink: 0;">
        <img src="{{ public_path('assets/logo.png') }}" alt="Gym Logo" style="height: 60px;">
    </div>
    <div style="text-align: right; flex-grow: 1;">
        <h1>{{ $gymName }}</h1>
        <p>{{ $phone }} | {{ $address }}</p>
    </div>
</div> --}}

<div class="header">
    <div style="flex-shrink: 0;">
        <img src="{{ public_path('assets/logo.png') }}" alt="Gym Logo" style="height: 60px;">
    </div>
    <h1>{{ $gymName }}</h1>
    <p>{{ $phone }} | {{ $address }}</p>
</div>

<div class="member-info">
    <table>
        <tr>
            <td style="width: 50%;">
                <p><strong>Member:</strong> {{ $member_name }}</p>
                <p><strong>Age:</strong> {{ $age }}</p>
                <p><strong>Weight:</strong> {{ $weight }} kg</p>
            </td>
            <td style="width: 50%;">
                <p><strong>Assigned On:</strong> {{ $date }}</p>
                <p><strong>Assigned By:</strong> Shihab Mohiuddin</p>
            </td>
        </tr>
    </table>
</div>

<div class="section">
    <div class="section-title">Diet Plan</div>
    @php
        preg_match_all('/^(Morning|Afternoon|Evening|Dinner)\s*$(.*?)((?=^(Morning|Afternoon|Evening|Dinner)\s*$)|\z)/ms', $diet_plan, $matches, PREG_SET_ORDER);
        $sections = [];
        foreach ($matches as $match) {
            $sections[$match[1]] = trim($match[2]);
        }
        $leftColumnTitles = ['Morning', 'Afternoon'];
        $rightColumnTitles = ['Evening', 'Dinner'];
    @endphp

    <table>
        <tr>
            <td style="width: 50%;">
                @foreach ($leftColumnTitles as $title)
                    @if(isset($sections[$title]))
                        <div class="column-content">
                            <strong>{{ $title }}:</strong><br>
                            {!! nl2br(e($sections[$title])) !!}
                        </div>
                    @endif
                @endforeach
            </td>
            <td style="width: 50%;">
                @foreach ($rightColumnTitles as $title)
                    @if(isset($sections[$title]))
                        <div class="column-content">
                            <strong>{{ $title }}:</strong><br>
                            {!! nl2br(e($sections[$title])) !!}
                        </div>
                    @endif
                @endforeach
            </td>
        </tr>
    </table>
</div>

<div class="section">
    <div class="section-title">Workout Plan</div>
    @php
        $workoutHeadings = ['Biceps', 'Triceps', 'Chest', 'Legs', 'Abs', 'Shoulders', 'Back'];
        preg_match_all('/^(' . implode('|', $workoutHeadings) . ')\s*$(.*?)((?=^(' . implode('|', $workoutHeadings) . ')\s*$)|\z)/ms', $workout_plan, $workoutMatches, PREG_SET_ORDER);
        $workoutSections = [];
        foreach ($workoutMatches as $match) {
            $workoutSections[$match[1]] = trim($match[2]);
        }
        $leftWorkoutTitles = ['Biceps', 'Triceps', 'Chest', 'Legs'];
        $rightWorkoutTitles = ['Abs', 'Shoulders', 'Back'];
    @endphp

    <table>
        <tr>
            <td style="width: 50%;">
                @foreach ($leftWorkoutTitles as $title)
                    @if(isset($workoutSections[$title]))
                        <div class="column-content">
                            <strong>{{ $title }}:</strong><br>
                            {!! nl2br(e($workoutSections[$title])) !!}
                        </div>
                    @endif
                @endforeach
            </td>
            <td style="width: 50%;">
                @foreach ($rightWorkoutTitles as $title)
                    @if(isset($workoutSections[$title]))
                        <div class="column-content">
                            <strong>{{ $title }}:</strong><br>
                            {!! nl2br(e($workoutSections[$title])) !!}
                        </div>
                    @endif
                @endforeach
            </td>
        </tr>
    </table>
</div>

{{-- @if (!empty($workoutDays))
    <div class="section">
        <div class="section-title">Workout Days</div>
        <p style="margin-top: 4px;">✔ {{ $workoutDays }}</p>
    </div>
@endif --}}

@if (!empty($workout_days))
    <div class="section">
        <div class="section-title">Workout Days</div>
        <p style="margin-top: 4px;">✔ {{ $workout_days }}</p>
    </div>
@endif


<div class="signature">
    Signature: ___________________________
</div>
</body>
</html>
