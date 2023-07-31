<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        .div_center{
            text-align: left;
            padding-top: 40px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
            color: rgb(255, 225, 0);
        }
        .input_color{
            color: black;
            padding-bottom: 20px;
            width: 30%;
        }
        .center{
            margin: auto;
            width: 50%;
            margin-top: 30px;
            border: 3px solid white;
        }
        label{
            display: inline-block;
            width: 200px;
            /* text-align: left; */
        }
        .div_design{
            padding-bottom: 20px;
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

                <div class="div_center">
                    <h2 class="h2_font">Add Products</h2>

                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="div_design">
                            <label>Product Title :</label>
                            <input type="text" class="input_color" name="title" placeholder="Write a Title" required="">
                        </div>

                        <div class="div_design">
                            <label>Product Description :</label>
                            <input type="text" class="input_color" name="description" placeholder="Write a Description" required="">
                        </div>

                        <div class="div_design">
                            <label>Product Price :</label>
                            <input type="number" class="input_color" name="price" placeholder="Mention the Price for the Product" required="">
                        </div>

                        <div class="div_design">
                            <label>Discount Price :</label>
                            <input type="number" class="input_color" name="dis_price" placeholder="Mention the Discount Price for the Product">
                        </div>

                        <div class="div_design">
                            <label>Product Quantity :</label>
                            <input type="number" min="0" class="input_color" name="quantity" placeholder="Write the Quantity" required="">
                        </div>

                        <div class="div_design">
                            <label>Product Catagory :</label>
                            <select class="input_color" name="catagory" required="">
                                <option value="" selected="">Add a Catagory Here</option>

                                @foreach ($catagory as $catagory)
                                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="div_design">
                            <label>Product Image Here :</label>
                            <input type="file" name="image"required="">
                        </div>

                        <div class="div_design">
                            <input type="submit" class="btn btn-primary" name="submit" value="Add Product">
                        </div>

                    </form>
                </div>

        </div>
      </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>

