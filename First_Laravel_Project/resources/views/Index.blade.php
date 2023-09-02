<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students is First</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form class="flex justify-center text-center w-full items-center p-10" action="">
        <div class="relative overflow-x-auto w-2/3 ">
            <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
               <div class="flex justify-between pb-2">
                    <h1 class="text-2xl font-bold italic">Student Form</h1>
                    <a class="bg-blue-400 p-2 rounded-lg" href="{{ route(' students.create ') }}">Create</a>
               </div>
                <thead class="text-xs text-gray-100 uppercase bg-gray-900 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Age
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cuorse
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>                      
                 <tbody class="bg-gray-100 text-gray-900">
                    @foreach ($students as $student)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   {{ $student->id }}
                               </th>
                               <td class="px-6 py-4">
                                   {{ $student->name }}
                               </td>
                               <td class="px-6 py-4">
                                   {{ $student->email }}
                               </td>                        
                                <td class="px-6 py-4">
                                    {{$student->age}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$student->course}}
                                </td> 
                                <td class="px-6 py-4">
                                    {{$student->address}}
                                </td> 
                                <td class="px-6 py-4">
                                    <a class="font-medium text-orange-600 dark:text-blue-500 hover:underline" href="/{{$student->id}}">Show</a>                                   
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="/update/{{$student->id}}">Edit</a>                                   
                                    <a class="font-medium text-red-600 dark:text-blue-500 hover:underline" href="/delete/{{$student->id}}">Delete</a>                                   
                                </td>
                            </tr>   
                    @endforeach 
                </tbody>                          
            </table>
        </div>
        
    </form>
</body>
</html>