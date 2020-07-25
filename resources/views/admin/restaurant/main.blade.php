@extends('admin.master')

@section('title')
    餐廳管理
@endsection

@section('nav')
    @include('admin/nav')
@endsection

@section('content')
    @include('admin/restaurant.content')
@endsection

{{--彈跳視窗--}}
{{--<script src="js/admin/jquery/jquery.min.js"></script>--}}

{{--<script src="{{asset('js/admin/food/renderFormData.js')}}"></script>--}}
@section('modal')
    @include('admin/restaurant.modal')
@endsection

@section('JS')
    {{--    渲染food表格資料--}}
    <script src="{{asset('js/admin/restaurant/renderFormData.js')}}"></script>





@endsection
