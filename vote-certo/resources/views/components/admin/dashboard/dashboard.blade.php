<div class="content" id="content">

    <x-nav-profile-admin :name="$name" />

    <div class="content-dashboard">
        @if($position == 99)
            <x-main-dashboard-admin />
        @elseif($position == 50)
            <x-main-dashboard-suporte />
        @elseif($position == 1)
            <x-main-dashboard-user />
        @endif
    </div>

</div>
