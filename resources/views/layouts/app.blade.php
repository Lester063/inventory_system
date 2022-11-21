<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- jquery ini -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('item.index') }}">
                    Item
                </a>
                <a class="navbar-brand" href="{{ route('sales.index') }}">
                    Sales
                </a>
                <a class="navbar-brand" href="{{ route('mysales.index') }}">
                    My Sales
                </a>
                <a class="navbar-brand" href="{{ route('suppliers.index') }}">
                    Supplier
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <main class="py-4">

                @include('inc.messages')
                @yield('content')
            </main>

        </div>


    </div>

<script>
$(document).on('click','#add_new_input',function(){
    var i=document.getElementById('addnum_box').value;

    var x=0;
    for(x;x<i;x++){
        var for_id = parseInt($('#totalnum_box').val())+1;
        var original = document.getElementById('input_sales');
        var clone = original.cloneNode(true); // "deep" clone
        clone.id = for_id;
        original.parentNode.appendChild(clone);

        $('#totalnum_box').val(for_id);
    }
});

function remove(){
    var g=event.target.id;
    var yo=$('#'+g).parent().parent().attr('id');
      alert(yo);
      $('#'+g).parent().parent().attr('id').remove();
}


//set the from and to to current date
Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
document.getElementById('fromDate').value = new Date().toDateInputValue();
document.getElementById('toDate').value = new Date().toDateInputValue();

//disable dates of toDates before the fromDate
var getfromDate=document.getElementById('fromDate').value;
document.getElementById('toDate').min = getfromDate;
var gettoDate=document.getElementById('toDate').value;
document.getElementById('fromDate').max = gettoDate;
//filtering sales from set date to set date


//filter sales thru buyers name
$(document).on('keyup','#filterSales',function(){
    filterSalesThruBuyersName();
});

function filterSalesThruBuyersName(){
    var buyersName=document.getElementById('filterSales').value;
    var fromDate = document.getElementById("fromDate").value;
    var toDate = document.getElementById("toDate").value;
        $.ajax({
        type:"get",
        url: "{{route('mysales.filter')}}",
        data:{
            'buyersName':buyersName,
            'fromDate':fromDate,
            'toDate':toDate
        },
            success:function(response){
                $('.table').html(response);
            }
        })
}

function fromDateOnchange(){
    filterSalesThruBuyersName();
    var getfromDate=document.getElementById('fromDate').value;
    document.getElementById('toDate').min = getfromDate;
}
function toDateOnchange(){
    filterSalesThruBuyersName();
    var gettoDate=document.getElementById('toDate').value;
    document.getElementById('fromDate').max = gettoDate;
}

</script>
</body>
</html>
<!-- https://softauthor.com/get-id-of-clicked-element-in-javascript/#:~:text=To%20get%20the%20clicked%20element,ID%20of%20the%20clicked%20element. -->

