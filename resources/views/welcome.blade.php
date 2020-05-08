<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <livewire:styles/>
</head>

<body>
<div class="bg-gray-100">

    @php
        $resources = [
            'Andres',
            'Pamela',
            'Sara',
            'Bruno',
        ]
    @endphp

    <div class="container mx-auto overflow-y-auto">
        <livewire:resources-calendar
            :day="today()"
            :resources="$resources"
        />
    </div>

</div>
<livewire:scripts/>
</body>

</html>
