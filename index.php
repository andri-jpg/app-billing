<!DOCTYPE html>
<?php
    session_start();

    if (isset($_SESSION['login'])) {
        header('Location: home.php');
        exit;
    }

    session_destroy();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title></title>
    <meta name="keywords" content="" />

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet" />

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

      html {
        font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      }
    </style>
  </head>

  <body class="leading-normal tracking-normal text-indigo-400 m-6 bg-cover bg-fixed" style="background-image: url('header.png');">
    <div class="h-full">
      <!--Nav-->
      <div class="w-full container mx-auto">
        <div class="w-full flex items-center justify-between">
          <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            app<span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">Billing</span>
          </a>

          <div class="flex w-1/2 justify-end content-center">
                <path
                  d="M30.063 7.313c-.813 1.125-1.75 2.125-2.875 2.938v.75c0 1.563-.188 3.125-.688 4.625a15.088 15.088 0 0 1-2.063 4.438c-.875 1.438-2 2.688-3.25 3.813a15.015 15.015 0 0 1-4.625 2.563c-1.813.688-3.75 1-5.75 1-3.25 0-6.188-.875-8.875-2.625.438.063.875.125 1.375.125 2.688 0 5.063-.875 7.188-2.5-1.25 0-2.375-.375-3.375-1.125s-1.688-1.688-2.063-2.875c.438.063.813.125 1.125.125.5 0 1-.063 1.5-.25-1.313-.25-2.438-.938-3.313-1.938a5.673 5.673 0 0 1-1.313-3.688v-.063c.813.438 1.688.688 2.625.688a5.228 5.228 0 0 1-1.875-2c-.5-.875-.688-1.813-.688-2.75 0-1.063.25-2.063.75-2.938 1.438 1.75 3.188 3.188 5.25 4.25s4.313 1.688 6.688 1.813a5.579 5.579 0 0 1 1.5-5.438c1.125-1.125 2.5-1.688 4.125-1.688s3.063.625 4.188 1.813a11.48 11.48 0 0 0 3.688-1.375c-.438 1.375-1.313 2.438-2.563 3.188 1.125-.125 2.188-.438 3.313-.875z"
                ></path>
              </svg>
            </a>

            </a>
          </div>
        </div>
      </div>

      <!--Main-->
      <div class="container pt-24 md:pt-36 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
          <h1 class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left">
            Manajement
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">
              pembayaran
            </span>
            via admin dan user
          </h1>
          <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left">
            sistem pembayaran dua arah, dari user ke admin
          </p>
          <div class="flex items-center justify-between pt-1">
  <a href="login_user.php" class="mr-2 bg-gradient-to-r from-purple-800 to-green-500 hover:from-pink-500 hover:to-green-500 text-white font-bold py-2 px-4 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out">
    Login User
  </a>
  <a href="login.php" class="ml-2 bg-gradient-to-r from-purple-800 to-green-500 hover:from-pink-500 hover:to-green-500 text-white font-bold py-2 px-4 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out">
    Login Admin
  </a>
</div>



        <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
        </div>
      </div>
    </div>
  </body>
</html>
