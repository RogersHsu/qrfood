@extends('backend.master')

@section('nav')
    @include('backend/food.nav')
@endsection

@section('content')
    @include('backend/food.content')
@endsection

{{--彈跳視窗--}}
@include('backend/food.modal')
@section('JS')
    {{--渲染food表格資料--}}
    <script src="{{asset('js/backend/food/renderFormData.js')}}"></script>

    {{--表單驗證JS--}}
    <script src="{{asset('js/backend/modalValid.js')}}"></script>

    {{--denfine APP_URL--}}
    <script type="text/javascript">
        var APP_URL ={!! json_encode(url('/')) !!};
    </script>

    {{--use to handle nav selectLocation and selectRestaurant.--}}
    {{--<script>--}}
    {{--$(document).ready(function () {--}}

    {{--$("#navbar_selectRestaurant a").css("pointer-events", "none");//can't select restaurant before seleted location.--}}

    {{--$.ajax({--}}
    {{--type: 'GET',--}}
    {{--dataType: 'JSON',--}}
    {{--url: APP_URL + '/api/admin/restaurant',--}}
    {{--success: function (response) {--}}

    {{--renderLocationList(response);--}}

    {{--listenSelectLocation(response);--}}
    {{--listenSelectRestaurant(response);--}}
    {{--}--}}
    {{--});--}}

    {{--function renderLocationList(response) {--}}
    {{--for (var key in response.data) {--}}
    {{--var data = response.data[key].location;--}}
    {{--var str =--}}
    {{--"<span " +--}}
    {{--"class = \"dropdown-item nav_selectLocation_item\" >" +--}}
    {{--data +--}}
    {{--"</span>";--}}
    {{--$("#navbar_selectLocation div").append(str);--}}
    {{--}--}}
    {{--};--}}

    {{--function listenSelectLocation(response) {--}}
    {{--$('#navbar_selectLocation').on("click", ".nav_selectLocation_item", function () {--}}
    {{--$("#navbar_selectLocation a").html($(this).text());--}}
    {{--$("#navbar_selectRestaurant a").css("pointer-events", "");--}}

    {{--renderRestaurantList(response);--}}
    {{--});--}}
    {{--};--}}

    {{--function listenSelectRestaurant(response) {--}}
    {{--$('#navbar_selectRestaurant').on("click", ".nav_selectRestaurant_item", function () {--}}
    {{--$("#navbar_selectRestaurant a").html($(this).text());--}}
    {{--});--}}
    {{--};--}}

    {{--function renderRestaurantList(response) {--}}
    {{--$('#navbar_selectRestaurant div').empty(); //reset restuarant list--}}
    {{--var location = $("#navbar_selectLocation a").text();--}}
    {{--for (var key in response.data) {--}}
    {{--if (location == response.data[key].location) {--}}
    {{--for (var res in response.data[key].restaurant) {--}}
    {{--var data = response.data[key].restaurant[res].rsName;--}}
    {{--var str = "<span " +--}}
    {{--"class = \"dropdown-item nav_selectRestaurant_item\" >" +--}}
    {{--data +--}}
    {{--"</span>";--}}
    {{--$("#navbar_selectRestaurant div").append(str);--}}
    {{--}--}}
    {{--$("#navbar_selectRestaurant a").html(response.data[key].restaurant[0].rsName); //default selectRestaurant--}}
    {{--}--}}
    {{--}--}}
    {{--};--}}

    {{--});--}}
    {{--</script>--}}

@endsection
