<!doctype html>
<html class="no-js h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="This application simulates a storehouse management system that lists categorized products, tracks inventory, and allows data analysis.">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="//use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{asset('public/styles/shards-dashboards.1.1.0.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/styles/extras.1.1.0.min.css')}}">

        <!--Alertify-->
        <link rel="stylesheet" href="{{asset('public/alertify/css/alertify.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/alertify/css/themes/default.min.css')}}">
        <!--Datepicker-->
        <link href="{{asset('public/datepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" >
        
        <!--Select 2-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
        
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <style>
            .navbar-brand {
                padding-top: 0;
                padding-bottom: 0;
            }
            .alert-success, .alert-danger, .alert-warning, .alert-info, .white {
                color: white!important;
            }
            .px-8{
                padding: 8px!important;
            }
            table td{
                vertical-align: middle !important;
            }
            .main-navbar .navbar .navbar-nav .dropdown-menu {
                position: static !important;
            }
        </style>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
