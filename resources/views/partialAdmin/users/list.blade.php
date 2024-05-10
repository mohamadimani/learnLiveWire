@extends('partialAdmin.layouts.master')
@section('content')
    <!-- begin::main content -->
    <main class="main-content">

        <div class="card">
            <div class="card-body">
                <livewire:admin.users.userslist />
            </div>
        </div>

    </main>
@endsection
