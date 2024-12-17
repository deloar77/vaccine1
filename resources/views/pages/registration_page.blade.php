<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>vaccine</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container p-10">

       
          <div class="text-blue-900">
                @include('pages.message')
         </div>      
                    
<section class="flex bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto min-h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                    Get Registered Here Under Any Center
                </h1>
                <form class="space-y-4" method="POST" action="{{url('register')}}">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name')}}" placeholder="Your Name" required>
                    </div>
                    <span style="color: red">{{$errors->first('name')}}</span>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Phone</label>
                        <input value="{{old('phone')}}" type="number" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="017..." required>
                    </div>
                    <span style="color: red">{{$errors->first('phone')}}</span>
                    <div>
                        <label for="nid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your NID</label>
                        <input value="{{old('nid')}}" type="number" name="nid" id="nid" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="13 or 17 Digit NID" required>
                    </div>
                    <span style="color: red">{{$errors->first('nid')}}</span>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                        <input value="{{old('email')}}" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                    </div>
                    <span style="color: red">{{$errors->first('email')}}</span>
                    <div>
                        <label for="center" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Your Vaccine Center</label>
                        <select name="vaccine_center_id" id="centers" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($centers as $center)
                                <option value="{{$center->id}}">{{$center->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-blue-500 text-white rounded-lg py-2.5 hover:bg-blue-600">Register</button>
                    </div>
                </form>
            </div>
        </div>
         

    </div>
</section>

                    
               
            
          
       
        

    </div>
</body>
</html>