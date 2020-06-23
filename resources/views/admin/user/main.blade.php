@extends('admin.master')

@section('title')
    使用者管理
@endsection

@section('nav')
    @include('admin/nav')
@endsection

@section('content')
    @include('admin/user.content')
@endsection

{{--彈跳視窗--}}
{{--<script src="js/admin/jquery/jquery.min.js"></script>--}}

{{--<script src="{{asset('js/admin/food/renderFormData.js')}}"></script>--}}
@section('modal')
    @include('admin/user.modal')
@endsection

@section('JS')
    {{--    渲染food表格資料--}}
    <script src="{{asset('js/admin/user/renderFormData.js')}}"></script>

    <script type="text/javascript">
        var APP_URL ={!! json_encode(url('/')) !!};

        var action = "{{ env("APP_URL") }}"

    </script>

@endsection
