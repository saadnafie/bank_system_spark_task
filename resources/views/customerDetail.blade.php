@extends('layouts.header')
@section('content')


<!-- page title -->
<section class="page-title bg-primary position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-white font-tertiary">Transfer Money Quickly</h1>
      </div>
    </div>
  </div>
  <!-- background shapes -->
  <img src="{{asset('images/illustrations/page-title.png')}}" alt="illustrations" class="bg-shape-1 w-100">
  <img src="{{asset('images/illustrations/leaf-pink-round.png')}}" alt="illustrations" class="bg-shape-2">
  <img src="{{asset('images/illustrations/dots-cyan.png')}}" alt="illustrations" class="bg-shape-3">
  <img src="{{asset('images/illustrations/leaf-orange.png')}}" alt="illustrations" class="bg-shape-4">
  <img src="{{asset('images/illustrations/leaf-yellow.png')}}" alt="illustrations" class="bg-shape-5">
  <img src="{{asset('images/illustrations/dots-group-cyan.png')}}" alt="illustrations" class="bg-shape-6">
  <img src="{{asset('images/illustrations/leaf-cyan-lg.png')}}" alt="illustrations" class="bg-shape-7">
</section>
<!-- /page title -->

<!-- contact -->
<section class="section section-on-footer" data-background="{{asset('images/backgrounds/bg-dots.png')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title">Customer Details</h2>
      </div>
      <div class="col-lg-12 mx-auto">
      @if($customerData != null) 
      <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>Balance</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$customerData->name}}</td>
                <td>{{$customerData->email}}</td>
                <td>{{$customerData->phone}}</td>
                <td>{{$customerData->country}}</td>
                <td>{{$customerData->balance}}</td>
                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"> <i class="ti-wallet"></i> Transfer</button></td>
              </tr>
            </tbody>
          </table>
      </div>
      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Transfer Money</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="{{route('transactionProcess') }}" method="POST">
                @csrf
                <input type="hidden" name="cus_from_id" value="{{$customerData->id}}">
                  <div class="form-group">
                      <label for="cusList" >Select Customer:</label>
                      <select class="form-control" name="cus_to_id" id="secusListl1">
                          @foreach($allCustomers as $index=>$customers)
                            <option value="{{$customers->id}}">{{$index+1}}- {{$customers->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="amount">Transfer Amount:</label>
                    <input type="number" class="form-control" min="10" name="amount_val" placeholder="Enter Amount" id="amount" required>
                  </div>
                  <button type="submit"  class="btn btn-success btn-sm btn-block">confirm Transfer</button>
              </form>
            </div>

          </div>
        </div>
      </div>


      @else
      <center><h4 class="section-title">No Data Found !!</h4></center>
      @endif
    </div>
  </div>
</section>
<!-- /contact -->
@endsection

