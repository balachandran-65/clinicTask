<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="custom.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="custom.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/tailwind.config.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>details-page</title>
    <style>
     .seat-map {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.row {
    display: flex;
}

.seat {
    margin: 5px;
    padding: 10px;
    background-color: lightgray;
    border: 1px solid #ccc;
    cursor: pointer;
}

.selected {
    background-color: green;
    color: white;
}

.booked {
    background-color: red;
    color: white;
}
    </style>
    @livewireStyles
</head>
<body>
    {{-- <livewire:examples-of-time-slot /> --}}

    {{-- <livewire:theater-slot /> --}}
    <livewire:stripe-checkout />

    
    @livewireScripts
</body>
</html>