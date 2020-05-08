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

    <style>
        /* 2 hours */
        .h-64 {
            height: 16rem;
        }

        /* 3 hours */
        .h-96 {
            height: 24rem;
        }

        /* 4 hours */
        .h-128 {
            height: 32rem;
        }

        .h-144 {
            height: 36rem;
        }
    </style>
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

    <livewire:resources-calendar
        :day="today()"
        :resources="$resources"
        appointment-component="appointment-dark"
    />

</div>
<livewire:scripts/>
</body>

</html>
