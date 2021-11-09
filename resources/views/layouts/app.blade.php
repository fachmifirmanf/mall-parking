<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
   <head>
        
    @include('layouts.header')

    </head>
    <!-- END: Head -->
    <body class="app">
        
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            @include('layouts.sidebar')
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
            @include('layouts.topbar')
                
                <!-- END: Top Bar -->
                      @yield('content')

            </div>
            <!-- END: Content -->
        </div>
        @include('layouts.footer')
    </body>
</html>