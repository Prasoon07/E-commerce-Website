<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
            color: gold;
        }
        .input_color{
            color: black;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
        .th_degn{
            padding: 30px;
            border: 3px solid white;
        }
        .tr_color{
            background: skyblue;
            border: 3px solid white;
        }
        .tr_degn{
            border: 3px solid white;
        }
        .column_border{
            border: 3px solid white;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')

        <!-- partial BODY -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>

                @endif

                <div class="div_center">
                    <h2 class="h2_font">Add Catagory</h2>

                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf

                        <input type="text" class="input_color" name="catagory" placeholder="Write catagory name">

                        <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">

                    </form>
                </div>

                <table class="center">

                    <tr class="tr_color">
                        <th class="th_degn">Catagory Name</th>
                        <th class="th_degn">Action</th>
                    </tr>

                    @foreach ($data as $data)

                    <tr class="tr_degn">
                        <td class="column_border">{{$data->catagory_name}}</td>
                        {{-- @if(session()->has('message')) --}}
                        <td class="column_border">
                            <a onclick="return confirm('Are You Sure To Delete This Item')" class="btn btn-danger"
                            href="{{url('delete_catagory',$data->id)}}">Delete</a>
                        </td>
                    </tr>

                    @endforeach


                    {{-- <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div> --}}

                {{-- @endif --}}
                </table>

            </div>
        </div>


        <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
