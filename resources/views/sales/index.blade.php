@extends('layouts.app')

@section('content')
    <h1>Item Sales</h1>

    <div class="calendarFilter" style="float:right">
        <input type="text"id="filterSales"placeholder="Buyer Name">
        From<input type="date"id="itemsalesfromDate"onchange="itemsalesfromDateOnchange()">
        To<input type="date"id="itemsalestoDate"onchange="itemsalestoDateOnchange()">
    </div>

    @include('sales.salesdatacontainer')

@endsection
