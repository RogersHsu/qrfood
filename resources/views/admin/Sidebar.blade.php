<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">QRFood管理平台</div>
  <div class="list-group list-group-flush" >
    <a href="{{ route('manage_food') }}" class="list-group-item list-group-item-action bg-light">食物管理</a>
    {{-- <a href="#" class="list-group-item list-group-item-action bg-light">Restaurant</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> --}}
    <a href="{{ route('manage_food/restaurant') }}" class="list-group-item list-group-item-action bg-light">餐廳管理</a>
    <a href="{{ route('manage_food/category') }}" class="list-group-item list-group-item-action bg-light">食物類別管理</a>
    <a href="{{ route('manage_food/user') }}" class="list-group-item list-group-item-action bg-light">使用者管理</a>

  </div>
</div>
<!-- /#sidebar-wrapper -->
