<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900">
    @include('components.header')
    {{ $slot }}
</body>
</html>