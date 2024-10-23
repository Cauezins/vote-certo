<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Completa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    @if ($view == 'users')
        <link rel="stylesheet" href="{{ asset('css/admin/usersAdmin.css') }}">
    @elseif($view == 'elections')
        <link rel="stylesheet" href="{{ asset('css/admin/electionsAdmin.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/admin/dashboardAdmin.css') }}">
</head>

<body>
    <x-side-bar-admin :position="$user->position" :view="$view" :dataElections="$dataElections"/>

    <!-- Conteúdo principal -->
    @if ($view == 'dashboard')
        <x-dashboard-admin :name="$user->name" :position="$user->position" :image_profile="$user->img_profile" />
    @elseif($view == 'users')
        <x-users-admin :name="$user->name" :position="$user->position" :image_profile="$user->img_profile" :data="$dataUsers" />
    @elseif($view == 'elections')
        <x-elections-admin :name="$user->name" :position="$user->position" :image_profile="$user->img_profile" :data="$dataElections"/>
    @endif

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    @if ($view == 'users')
        <script src="{{ asset('js/admin/usersAdmin.js') }}"></script>
    @elseif($view == 'elections')
        <script src="{{ asset('js/admin/electionsAdmin.js') }}"></script>
    @endif
    <script src="{{ asset('js/admin/dashboardAdmin.js') }}"></script>
</body>

</html>
