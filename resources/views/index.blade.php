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
        <h2 class="section-title">Customers List</h2>
      </div>
      <div class="col-lg-12 mx-auto">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>Balance</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allCustomers as $index=>$customers)
              <tr>
                <td>{{$index+1}}</td>
                <td>{{$customers->name}}</td>
                <td>{{$customers->email}}</td>
                <td>{{$customers->phone}}</td>
                <td>{{$customers->country}}</td>
                <td>{{$customers->balance}}</td>
                <td><a href="{{url('customerData')}}/{{$customers->id}}" ><span class="badge badge-info" style="font-size:22px;"><i class="ti-eye"></i></span></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /contact -->
@endsection

