<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=yes"
    />
    <meta name="title" content="FXindigo | Login">
    <meta name="description" content="FXindigo is the online Forex CFD provider of choice for high volume traders, scalpers and robots. Spreads from. Trade with reliable Broker and best conditions: Low Spreads, No Swaps, No Commissions.It is simple and convenient to make a profit with FXindigo. It offers reliable services for earning on Forex trading.">
    <meta name="keywords" content="FXindigo, fx indigo, indigo, Emerging forex broker, cfd provieder, lowest spreads, fxindigo, indigo fx,indigoFX">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
    <title> Dashboard</title>
    <link
  href="{{ url('vendor/fontawesome-free/css/all.min.css') }}"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="icon" 
      type="image/png" 
      href="{{ url('icon.jpg') }}">
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />
  <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet" />

  <link
  href="{{ url('vendor/datatables/dataTables.bootstrap4.min.css') }}"
  rel="stylesheet"
/>
  </head>
  <body id="page-top">
    <div id="wrapper">
       @include('customer.layouts.common.sidebar')
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
           
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>   
        @include('customer.layouts.common.footer')
      </div>
    </div>

        @include('customer.layouts.common.js')

      </body>
      </html>