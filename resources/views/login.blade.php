<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login | Segas Automores</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/21efb330de.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image" href="{{ asset('img/Group 8.svg') }}">

    <style>
        .container.right-panel-active .sign-in {
            transform: translateX(80%);
        }

        .container.right-panel-active .register {
            transform: translateX(80%);
            opacity: 1;
            z-index: 30;
        }

        .overlay-container {
            position: absolute;
            left: 0%;
            width: 100%;
            height: 100%;
            transition: all 0.6s ease-in-out;
            z-index: 1;
        }

        .overlay {
            position: absolute;
            color: #000;
            height: 100%;
            width: 100%;
            z-index: 1;
        }
    </style>
</head>

<body
    class="font-rambla bg-gradient-to-tr from-[#acacac] from-[25%] to-[#006BAB] w-screen h-screen flex justify-center items-center">

    <div id="main" class="container bg-white rounded-xl h-[23rem] w-[59rem] flex items-center drop-shadow-2xl"
        style="box-shadow: 0px 0px 15px rgb(0, 0, 0, .2);">
        <div class=" overflow-visible z-20 absolute sign-in bg-[#006BAB] w-[28rem] h-[32rem] ml-20 rounded-xl transition-all"
            style="box-shadow: 0px 0px 15px rgb(0, 0, 0, .2);">
            {{-- FORMULARIO DE INICIAR SESION --}}
            <form action="/login-validation" method="POST" class=" h-full flex items-center flex-col ">
                @csrf
                <h1 class="text-5xl text-gray-50 m-16">Iniciar Sesión</h1>
                <input
                    class=" bg-transparent border-b-2 py-3 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50"
                    type="text" name="email" placeholder="Email" value="" required>
                <div class="w-[18rem] flex items-center justify-center">
                    <input
                        class="bg-transparent border-b-2 w-full py-3 px-4 my-2 mx-4  outline-none placeholder:text-gray-300 text-gray-50 z-10"
                        type="password" name="password" placeholder="Contraseña" id="login-password" value=""
                        required>
                    <button type="button" id="login-view" class="z-20 cursor-pointer"> <i id="login-icon"
                            class="fa-solid fa-eye -ml-20 text-slate-100 "></i></button>
                </div>
                <div class="space-x-10 mt-14 ">
                    <a class="text-gray-300 hover:text-gray-50" href="#"> Recuperar contraseña</a>
                    <button type="submit"
                        class="bg-gray-100 text-gray-800 px-6 py-4 rounded-xl hover:bg-gray-50 hover:scale-105 transition-all duration-300">Iniciar
                        Sesión</button>
                </div>
            </form>
        </div>
        <div class="  z-10 aboslute register bg-[#006BAB] w-[28rem] h-[32rem] ml-20 rounded-xl transition-all "
            style="box-shadow: 0px 0px 15px rgb(0, 0, 0, .2);">
            {{-- FORMULARIO DE REGISTRO DE USUARIO --}}
            <form action="/login-register" method="POST" class="h-full flex  items-center flex-col">
                @csrf
                <h1 class="text-5xl text-gray-50 m-6 font-semibold">Registrarse</h1>
                <input
                    class="bg-transparent border-b-2 py-1 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50"
                    type="text" name="name" placeholder="Nombre completo" required>
                <input
                    class="bg-transparent border-b-2 py-1 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50"
                    type="text" name="dni" placeholder="DNI" required>
                <input
                    class="bg-transparent border-b-2 py-1 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50"
                    type="email" name="email" placeholder="Email" required>
                <input
                    class="bg-transparent border-b-2 py-1 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50"
                    type="number" name="phone" placeholder="Teléfono" required>
                <input
                    class="bg-transparent border-b-2 py-1 px-4 my-2 mx-4 w-[16rem] outline-none placeholder:text-gray-300 text-gray-50"
                    type="text" name="address" placeholder="Direción" required>
                <div class="w-[18rem] flex items-center justify-center">
                    <input
                        class="bg-transparent border-b-2 w-full py-1 px-4 my-2 mx-4  outline-none placeholder:text-gray-300 text-gray-50 z-10"
                        type="password" name="password" placeholder="Contraseña" id="register-password" value=""
                        required>
                    <button type="button" id="register-view" class="z-20 cursor-pointer"> <i id="register-icon"
                            class="fa-solid fa-eye -ml-20 text-slate-100 "></i></button>
                </div>
                <div class="w-[18rem] flex items-center justify-center">
                    <input
                        class="bg-transparent border-b-2 w-full py-1 px-4 my-2 mx-4  outline-none placeholder:text-gray-300 text-gray-50 z-10"
                        type="password" name="password_confirm" placeholder="Confirmar contraseña"
                        id="register-password_confirm" value="" required>
                    <button type="button" id="register-view_confirm" class="z-20 cursor-pointer"> <i
                            id="register-icon_confirm" class="fa-solid fa-eye -ml-20 text-slate-100 "></i></button>
                </div>
                <button
                    class="bg-gray-100 text-gray-800 px-6 py-2 mt-2 rounded-xl hover:bg-gray-50 hover:scale-105 transition-all duration-300">Registrarse</button>
            </form>
        </div>
        <div class="overlay-container overflow-hidden">
            <div class="overlay flex">
                <div
                    class="overlay-left flex items-center justify-center flex-col px-20 text-wrap h-full w-1/2  translate-x-0 transition-all duration-300">
                    <img src="{{ asset('img/Group 8.svg') }}" alt="" width="200px">
                    <button id="signin" class="bg-[#006BAB]   px-6 py-2 mt-3 rounded-lg text-gray-50 ">Iniciar
                        Sesión</button>
                </div>
                <div
                    class="overlay-right flex items-center justify-center  flex-col px-20 text-wrap h-full translate-x-0 w-1/2 transition-all duration-300">
                    <img src="{{ asset('img/Group 8.svg') }}" alt="" width="200px">
                    <button id="register"
                        class="bg-[#006BAB]   px-6 py-2 mt-3 rounded-lg text-gray-50 ">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const registerButton = document.getElementById('register');
        const signinButton = document.getElementById('signin');
        const main = document.getElementById('main');

        registerButton.addEventListener('click', () => {
            main.classList.add("right-panel-active")
            document.title = "Registrarse | Segas Automotores";
        })
        signinButton.addEventListener('click', () => {
            main.classList.remove("right-panel-active");
            document.title = "Login | Segas Automotores";
        })


        // Función para alternar la visibilidad de la contraseña
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Event listener para el formulario de inicio de sesión
        document.getElementById('login-view').addEventListener('click', function() {
            togglePassword('login-password', 'login-icon');
        });

        // Event listener para el formulario de registro
        document.getElementById('register-view').addEventListener('click', function() {
            togglePassword('register-password', 'register-icon');
        });
        // Event listener para el campo de confirmación de contraseña en el formulario de registro
        document.getElementById('register-view_confirm').addEventListener('click', function() {
            togglePassword('register-password_confirm', 'register-icon_confirm');
        });
    </script>

    @if (session('success'))
        <script>
            swal.fire({
                title: "¡Bienvenido!",
                text: "{{ session('success') }}",
                icon: "success"
                background: '#fff',
                showConfirmButton: false,
                backdrop: false,
                timer: 1000,
                customClass: {
                    container: 'swal-container',
                    popup: 'swal-popup',
                },
                willOpen: () => {
                    document.body.style.zIndex = '9999';
                },
                willClose: () => {
                    document.body.style.overflow = 'auto';
                }
            }).then(() => {
                window.location.href = "{{ route('index') }}"; 
            });
            document.querySelector('.swal-container').style.zIndex = '999999999999999';
            document.querySelector('.swal-popup').style.position = 'fixed';

            document.querySelector('.swal-container').style.top = '-10vh';
            document.querySelector('.swal-container').style.backdropFilter = 'blur(2px)';
        </script>
    @endif

    


    @if (session('error'))
        <script>
            swal.fire({
                title: "Error",
                text: "{{ session('error') }}",
                icon: "error",
                background: '#fff',
                backdrop: false,
                customClass: {
                    container: 'swal-container',
                    popup: 'swal-popup',
                },
                willOpen: () => {
                    document.body.style.zIndex = '9999';
                },
                willClose: () => {
                    document.body.style.overflow = 'auto';
                }
            });
            document.querySelector('.swal-container').style.zIndex = '999999999999999';
            document.querySelector('.swal-popup').style.position = 'fixed';

            document.querySelector('.swal-container').style.top = '-10vh';
            document.querySelector('.swal-container').style.backdropFilter = 'blur(2px)';
        </script>
    @endif


</body>

</html>
