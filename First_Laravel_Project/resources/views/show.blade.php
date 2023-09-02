<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex justify-center">
        <div class="mt-20 m-4 p-6 bg-gray-400 text-gray-100 rounded-lg">
            <h1 class="m-6 text-2xl font-bold">Student Info</h1>
            <p class="m-6">Name : {{$student->name}}</p>
            <p class="m-6">Email : {{$student->email}}</p>
            <p class="m-6">Age : {{$student->age}}</p>
            <p class="m-6">Course : {{$student->course}}</p>
            <p class="m-6">Address : {{$student->address}}</p>
            <a href="/" class="bg-gray-900 p-2 ml-[70%] rounded-lg">Back</a>
        </div>
    </div>
</body>
</html>