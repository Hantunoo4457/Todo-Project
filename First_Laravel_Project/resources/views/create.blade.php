<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form method="POST" action="/">
        @csrf
        <div class="flex justify-center mt-6 ">
            <div class="w-1/3 mt-6 p-6 border shadow-2xl ">
                <h1 class="text-3xl text-indigo-800 italic">Student Form</h1>
                    <div class="mt-4">
                        <label  class="text-lg italic " for="name">Name</label>
                        <input name="name" placeholder="MgMg..."  class="w-full border outline-none px-2 py-1 mt-2 rounded-md" type="text">
                    </div>
                    <div class="mt-4">
                        <label  class="text-lg italic " for="email">Email</label>
                        <input name="email" placeholder="Mg@gmail.com"  class="w-full border outline-none px-2 py-1 mt-2 rounded-md" type="text">
                    </div>
                    <div class="mt-4">
                        <label  class="text-lg italic " for="age">Age</label>
                        <input name="age" placeholder="12 or 13"  class="w-full border outline-none px-2 py-1 mt-2 rounded-md" type="text">
                    </div>
                    <div class="mt-4">
                        <label  class="text-lg italic " for="course">Course</label>
                        <input name="course" placeholder="programming..."  class="w-full border outline-none px-2 py-1 mt-2 rounded-md" type="text">
                    </div>
                    <div class="mt-4">
                        <label  class="text-lg italic mt-10 " for="address">Address</label>
                        <input  name="address" placeholder="Yangon or Mandalay"  class="w-full border outline-none px-2 py-1 mt-2 rounded-md" type="text">
                    </div>
                    <div class="mt-4">
                        <button class="w-full text-white bg-pink-600 rounded-md py-2 px-2">Submit</button>
                    </div>
            </div>  
        </div>
    </form>
</body>
</html>