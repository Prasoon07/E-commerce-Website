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
            border: 3px solid rgb(169, 145, 22);
        }
        .th_degn{
            padding: 30px;
            border: 3px solid rgb(169, 145, 22);
            width: 100%;
        }
        .tr_border{
            border: 3px solid rgb(169, 145, 22);
        }
        .column_border{
            border: 3px solid rgb(169, 145, 22);
        }
        .padding{
            text-align: left;
            padding-left: 80px;
        }
        .delivery_status{
            color: rgb(0, 255, 0);
        }

        .color{
            color:black;
        }
        .nodata{
            font-size: 30px;
            font-weight: bold;
            color: red;
            padding-top: 30px;
            padding-bottom: 30px;
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

            @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
            @endif

                <h2 class="h2_font">All Orders</h2>

                <div style="padding-left: 82%; padding-bottom: 20px;">

                    <form action="{{url('search')}}" method="GET">
                        @csrf
                        <input type="text" name="search" placeholder="Search Here" class='color'>
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>

                </div>

                <table class="center">
                    <tr class="tr_color">
                        <th class="th_degn">Customer Name</th>
                        <th class="th_degn">Email</th>
                        <th class="th_degn">Phone</th>
                        <th class="th_degn">Address</th>
                        <th class="th_degn">Product Title</th>
                        <th class="th_degn">Quantity</th>
                        <th class="th_degn">Price</th>
                        <th class="th_degn">Payment Status</th>
                        <th class="th_degn">Delivery Status</th>
                        <th class="th_degn">Product Image</th>
                        <th class="th_degn">Delivered</th></th>
                        <th class="th_degn">Print PDF</th></th>
                        <th class="th_degn">Send Email</th></th>
                    </tr>

                    @forelse ($order as $orders)

                    <tr class="tr_border">
                        <td class="column_border">{{$orders->name}}</td>
                        <td class="column_border">{{$orders->email}}</td>
                        <td class="column_border">{{$orders->phone}}</td>
                        <td class="column_border">{{$orders->address}}</td>
                        <td class="column_border">{{$orders->product_title}}</td>
                        <td class="column_border">{{$orders->quantity}}</td>
                        <td class="column_border">{{$orders->price}}</td>
                        <td class="column_border">{{$orders->payment_status}}</td>
                        <td class="column_border">{{$orders->delivery_status}}</td>
                        <td class="column_border">
                            <img class="img_size" src="/product/{{$orders->image}}">
                        </td>
                        <td class="column_border">
                            @if($orders->delivery_status == 'processing')
                                <a onclick="return confirm('Are you sure this product is delivered !!!')" class="btn btn-primary"
                                href="{{url('delivered',$orders->id)}}">Delivered</a>
                            @else
                                <p class="delivery_status">Delivered</p>
                            @endif
                        </td>

                        <td class="column_border">
                            <a href="{{url('print_pdf',$orders->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>

                        <td class="column_border">
                            <a href="{{url('send_email',$orders->id)}}" class="btn btn-info">Send Email</a>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td class="column_border" colspan="16">
                            <h1 class="nodata">No Data Found!!!</h1>
                        </td>
                    </tr>

                    @endforelse
                </table>


        </div>
      </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
