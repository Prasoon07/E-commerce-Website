<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')

    <style type="text/css">

        label{
            display: inline-block;
            width: 200px;
            font-size: 20px;
            font-weight: bold;
        }

        .color{
            color:black;
        }


    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

            <h1 style="text-align: center; font-size: 35px">Send Email to -> {{$order->email}}</h1>

            <form action="{{url('send_user_email', $order->id)}}" method="POST">
                @csrf
                <div style="padding-left:  35%; padding-top: 50px;">
                    <label>Email Greeting : </label>
                    <input class='color' type="text" name="greeting">
                </div>

                <div style="padding-left:  35%; padding-top: 50px;">
                    <label>Email First Line : </label>
                    <input class='color' type="text" name="firstline">
                </div>

                <div style="padding-left:  35%; padding-top: 50px;">
                    <label>Email Body : </label>
                    <input class='color' type="text" name="body">
                </div>


                <div style="padding-left:  35%; padding-top: 50px;">
                    <label>Email Button name: </label>
                    <input class='color' type="text" name="button">
                </div>

                <div style="padding-left:  35%; padding-top: 50px;">
                    <label>Email URL : </label>
                    <input class='color' type="text" name="url">
                </div>

                <div style="padding-left:  35%; padding-top: 50px;">
                    <label>Email Last Line : </label>
                    <input class='color' type="text" name="lastline">
                </div>

                <div style="padding-left:  35%; padding-top: 50px;">
                    <input type="submit" value="Send Email" class="btn btn-primary">
                </div>

            </form>


        </div>
      </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
