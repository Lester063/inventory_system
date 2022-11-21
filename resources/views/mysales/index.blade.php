@extends('layouts.app')

@section('content')
    <h1>My Sales</h1>
    <a href="mysales/create"class="btn btn-primary">Add Sales</a>

    <div class="calendarFilter" style="float:right">
        <input type="text"id="filterSales"placeholder="Buyer Name">
        From<input type="date"id="fromDate"onchange="fromDateOnchange()">
        To<input type="date"id="toDate"onchange="toDateOnchange()">
    </div>

    @include('mysales.mysalesdatacontainer')

@endsection
