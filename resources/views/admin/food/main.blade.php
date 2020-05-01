@extends('admin.master')

@section('nav')
    @include('admin/food.nav')
@endsection

@section('content')
    @include('admin/food.content')
@endsection

{{--彈跳視窗--}}
{{--<script src="js/admin/jquery/jquery.min.js"></script>--}}

{{--<script src="{{asset('js/admin/food/renderFormData.js')}}"></script>--}}
@section('modal')
    @include('admin/food.modal')
@endsection

@section('JS')
{{--    渲染food表格資料--}}
    <script src="{{asset('js/admin/food/renderFormData.js')}}"></script>

    表單驗證JS

    <script type="text/javascript">
        var APP_URL ={!! json_encode(url('/')) !!};

        var action = "{{ env("APP_URL") }}"

    </script>

@endsection
