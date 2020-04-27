@extends('admin.master')

@section('nav')
    @include('admin/food.nav')
@endsection

@section('content')
    @include('admin/food.content')
@endsection

{{--彈跳視窗--}}
@include('admin/food.modal')
@section('JS')
    {{--渲染food表格資料--}}
    <script src="{{asset('js/admin/food/renderFormData.js')}}"></script>

    {{--表單驗證JS--}}
    <script src="{{asset('js/admin/modalValid.js')}}"></script>

    {{--denfine APP_URL--}}
    <script type="text/javascript">
        var APP_URL ={!! json_encode(url('/')) !!};

        var action = "{{ env("APP_URL") }}"

    </script>

@endsection
