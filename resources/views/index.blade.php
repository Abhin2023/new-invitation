<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-video-container {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .bg-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .bg-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }
    </style>
</head>
<body class="relative flex items-center justify-center h-auto min-h-screen overflow-auto p-6">

    <!-- Background Video -->
    <div class="bg-video-container">
        <video autoplay muted loop class="bg-video">
            <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="bg-overlay"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 grid grid-cols-1 sm:grid-cols-2 gap-6 w-full max-w-4xl text-center">

        <!-- Column 1 -->
        <div class="bg-white bg-opacity-90 rounded-2xl shadow-lg p-6 w-full">
            <img src="{{ asset('assets/images/bg.jpeg') }}" alt="Abhin & Dr. Prasobha" 
                class="w-40 h-40 object-cover rounded-full mx-auto border-4 border-gray-200">
            <p class="mt-4 text-xl font-bold text-gray-900">Abhin & Dr. Prasobha</p>
            <a href="{{ route('abhin') }}" class="mt-4 inline-block px-6 py-3 text-lg font-semibold bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
                Open Invitation
            </a>
        </div>

        <!-- Column 2 -->
        <div class="bg-white bg-opacity-90 rounded-2xl shadow-lg p-6 w-full">
            <img src="{{ asset('assets/images/athul/bg.jpeg') }}" alt="Athul & Harsha" 
                class="w-40 h-40 object-cover rounded-full mx-auto border-4 border-gray-200">
            <p class="mt-4 text-xl font-bold text-gray-900">Athul & Harsha</p>
            <a href="{{ route('athul') }}" class="mt-4 inline-block px-6 py-3 text-lg font-semibold bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
                Open Invitation
            </a>
        </div>

    </div>

</body>
</html>
