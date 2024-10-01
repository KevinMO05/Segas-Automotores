<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    <style>
        .container.right-panel-active .sign-in{
            transform: translateX(80%);
        }
        .container.right-panel-active .register{
            transform: translateX(80%);
            opacity: 1;
            z-index: 30;
        }
        
        .overlay-container{
            position: absolute;
            left: 0%;
            width: 100%;
            height: 100%;
            transition: all 0.6s ease-in-out;
            z-index: 1;
        }

        .overlay{
           position: absolute;
            color: #000;
            height: 100%;
            width: 100%;
            z-index: 1;
        }

    </style>
</head>
<body class="font-rambla bg-gradient-to-tr from-[#acacac] from-[25%] to-[#006BAB] w-screen h-screen flex justify-center items-center">
    <div id="main" class="container bg-white rounded-xl h-[23rem] w-[59rem] flex items-center drop-shadow-2xl"  style="box-shadow: 0px 0px 15px rgb(0, 0, 0, .2);">
        <div class=" overflow-visible z-20 absolute sign-in bg-[#006BAB] w-[28rem] h-[32rem] ml-20 rounded-xl transition-all" style="box-shadow: 0px 0px 15px rgb(0, 0, 0, .2);">
            {{-- FORMULARIO DE INICIAR SESION --}}
            <form action="/login-validation" method="POST" class=" h-full flex items-center flex-col ">
                @csrf
                <h1 class="text-5xl text-gray-50 m-20">Iniciar Sesión</h1>
                <input class=" bg-transparent border-b-2 py-3 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50" type="text" name="email" placeholder="Email" value="">
                <input class="bg-transparent border-b-2 py-3 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50" type="password" name="password" placeholder="Contraseña" value="">
                <div class="space-x-10 mt-10 ">
                    <a class="text-gray-300 hover:text-gray-50" href="#"> Recuperar contraseña</a>
                    <button type="submit" class="bg-gray-100 text-gray-800 px-6 py-4 rounded-xl hover:bg-gray-50 hover:scale-105 transition-all">Iniciar Sesión</button>
                </div>
            </form>
        </div>
        <div class="  z-10 aboslute register bg-[#006BAB] w-[28rem] h-[32rem] ml-20 rounded-xl transition-all " style="box-shadow: 0px 0px 15px rgb(0, 0, 0, .2);">
            {{-- FORMULARIO DE REGISTRO DE USUARIO --}}
            <form action="/login-register" method="POST" class="h-full flex  items-center flex-col">
                @csrf
            <h1 class="text-5xl text-gray-50 m-16">Registrarse</h1>
            <input class="bg-transparent border-b-2 py-3 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50" type="text" name="name" placeholder="Nombre">
            <input class="bg-transparent border-b-2 py-3 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50" type="email" name="email" placeholder="Email">
            <input class="bg-transparent border-b-2 py-3 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50" type="password" name="password" placeholder="Contraseña">
             <button class="bg-gray-100 text-gray-800 px-6 py-4 mt-6 rounded-xl hover:bg-gray-50 hover:scale-105 transition-all">Registrarse</button>
        </form>
        </div>
        <div class="overlay-container overflow-hidden">
            <div class="overlay flex">
                <div class="overlay-left flex items-center justify-center flex-col px-20 text-wrap h-full w-1/2  translate-x-0 transition-all">
                    <img src="{{asset('img/Group 8.svg')}}" alt="" width="200px">
                    <button id="signin" class="bg-[#006BAB]   px-6 py-2 mt-3 rounded-lg text-gray-50 ">Iniciar Sesión</button>
                </div>
                <div class="overlay-right flex items-center justify-center  flex-col px-20 text-wrap h-full translate-x-0 w-1/2 transition-all">
                    <img src="{{asset('img/Group 8.svg')}}" alt="" width="200px" >
                    <button id="register" class="bg-[#006BAB]   px-6 py-2 mt-3 rounded-lg text-gray-50 ">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const registerButton = document.getElementById('register');
        const signinButton = document.getElementById('signin');
        const main = document.getElementById('main');

        registerButton.addEventListener('click', ()=> {
            main.classList.add("right-panel-active");
        })
        signinButton.addEventListener('click', ()=> {
            main.classList.remove("right-panel-active");
        })
    </script>
</body>
</html>