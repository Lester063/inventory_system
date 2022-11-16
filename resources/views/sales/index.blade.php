@extends('layouts.app')

@section('content')
    <h1>Sales</h1>
    <a href="sales/create"class="btn btn-primary">Add Sales</a>

    <div class="calendarFilter" style="float:right">
        <input type="text"id="filterSales"placeholder="Buyer Name">
        From<input type="date"id="fromDate"onchange="fromDateOnchange()">
        To<input type="date"id="toDate"onchange="toDateOnchange()">
    </div>

    @include('sales.mysalesdatacontainer')

@endsection
