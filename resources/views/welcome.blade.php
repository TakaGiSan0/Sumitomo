<!-- component -->
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./icons/icons.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-[#607FBB] "> 
    <nav class="flex  bg-white pl-10 mb-10 justify-between">
       <div class="flex items-center py-3 mr-52">
       <img class=" w-16 object-contain" src={{url('/img/LogoPolibatam.png')}} alt="LogoPolibatam">
        <img class="object-cover" src={{url('/img/PBL.png')}} alt="PBL">
       </div>
        <div class="w-80 relative left-16 ml-10 h-auto bg-[#7488C5]" style="clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%);"></div>
        <div class="w-1/2 h-auto bg-[#486FBC]" ></div>

</nav>
   
      @error('loginGagal')
        <div class="bg-red-500 text-white p-3 rounded-lg mb-5">
          {{ $message }}
        </div>
      @enderror
    <form action={{ route('proses_login') }} method="POST" class="bg-white w-[70%] h-auto p-7 rounded-xl mx-auto max-w-[1000px]">
      @csrf
        <div class="mx-auto max-w-[17rem]">
            <h1 class="text-center text-5xl text-blue-900">Login</h1>
            <p class="text-center text-md text-blue-700">AGV Traffic Control System (ATCS)</p>
             <img class="mx-auto mb-5" src={{url('/img/robotic.png')}} alt="robot">

            <div class="bg-gray-200 flex items-center text-lg mb-6 md:mb-8 rounded-xl">
                <img class=" w-6 object-contain m-2" src={{url('/img/PersonIcon.png')}} alt="PersonIcon">
                <input type="username" name="username" id="username" class=" bg-gray-200 pl-1 py-2 md:py-4 focus:outline-none w-full rounded-xl" placeholder="Username" name="Username" />

            </div>
            <div class="bg-gray-200 flex items-center text-lg mb-6 md:mb-8 rounded-xl">
                <img class="w-6 object-contain m-2" src={{url('/img/lock.png')}} alt="lock">
                <input type="password" name="password" id="password" class="bg-gray-200 pl-1 py-2 md:py-4 focus:outline-none w-full rounded-xl" placeholder="Password" name="password" />

            </div>
            <button class="bg-[#7488C5] font-medium p-2 md:p-4 text-white uppercase w-full rounded-xl">Login</button>
        </div-->
    </form>

    <!-- component -->
    <!-- <div class="bg-white-400 h-screen overflow-hidden flex items-center justify-center">
  <div class="bg-white lg:w-5/12 md:6/12 w-10/12 shadow-3xl">
      <img class="mx-auto" src={{url('/img/robotic.png')}} alt="fgfgf">
   
    <form class="p-12 md:p-24">
      <div class="flex items-center text-lg mb-6 md:mb-8">
        <svg class="absolute ml-3" width="24" viewBox="0 0 24 24">
          <path d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/>
        </svg>
        <input type="text" id="username" class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="Username" />
      </div>
      <div class="flex items-center text-lg mb-6 md:mb-8">
        <svg class="absolute ml-3" viewBox="0 0 24 24" width="24">
          <path d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z"/>
        </svg>
        <input type="password" id="password" class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="Password" />
      </div>
      <button class="bg-[#7488C5] font-medium p-2 md:p-4 text-white uppercase w-full">Login</button>
    </form>
  </div>
 </div>
    <script>
        document.querySelector('#person').appendChild(person)
    </script>
</body>

</html-->