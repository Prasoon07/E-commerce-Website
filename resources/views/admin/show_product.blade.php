<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    {{-- <base href="/public"> --}}
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }

        .input_color{
            color: black;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 10px;
            border: 3px solid white;
        }
        .h2_font{
            margin-top: 30px;
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
            color: gold;
        }
        .img_size{
            width: 120px;
            height: 100px;
        }
        .tr_color{
            background: skyblue;
            border: 3px solid white;
        }
        .th_degn{
            padding: 30px;
            border: 3px solid white;
        }
        .tr_border{
            border: 3px solid white;
        }
        .column_border{
            border: 3px solid white;
        }
        .action_center{
            text-align: left;
            padding-right: 90px;
        }
        .padding{
            text-align: left;
            padding-left: 80px;
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

                <h2 class="h2_font">All Products</h2>
                <table class="center">
                    <tr class="tr_color">
                        <th class="th_degn">Product Title</th>
                        <th class="th_degn">Description</th>
                        <th class="th_degn">Catagory</th>
                        <th class="th_degn">Quantity</th>
                        <th class="th_degn">Price</th>
                        <th class="th_degn">Discount Price</th>
                        <th class="th_degn">Product Image</th>
                        <th class="padding">
                        <th class="action_center">Action</th></th>
                    </tr>

                    @foreach ($show_product as $product)

                    <tr class="tr_border">
                        <td class="column_border">{{$product->description}}</td>
                        <td class="column_border">{{$product->title}}</td>
                        <td class="column_border">{{$product->catagory}}</td>
                        <td class="column_border">{{$product->quantity}}</td>
                        <td class="column_border">{{$product->price}}</td>
                        <td class="column_border">{{$product->discount_price}}</td>
                        <td class="column_border">
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td>
                        <td class="column_border"><a class="btn btn-danger" href="{{url('edit_product',$product->id)}}">Edit</a></td>
                        <td class="column_border">
                            <a onclick="return confirm('Are You Sure To Delete This Item')"
                            class="btn btn-success" href="{{url('delete_product',$product->id)}}">Delete</a>
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
