@extends('layouts.app')

@section('content')
    <h1>Item Sales</h1>

    <div class="calendarFilter" style="float:right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Filter Sales</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filter Thru Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                    @foreach($items as $item)
                        <tr>
                            <td><input type="checkbox" name="filterItem[]" class="filterItem"onclick="filterItem()"value="{{$item->id}}">&nbsp</td>
                            <td>{{$item->item_name}}</td>
                        </tr>
                    @endforeach
                    </table>
                    <b id="salesCount"></b>
                </div>
                <div class="modal-footer">
                </div>
                </div>
            </div>
        </div>

        From<input type="date"id="itemsalesfromDate"onchange="itemsalesfromDateOnchange()">
        To<input type="date"id="itemsalestoDate"onchange="itemsalestoDateOnchange()">

    </div>

    @include('sales.salesdatacontainer')

@endsection
