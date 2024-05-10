@extends('partialAdmin.layouts.master')
@section('content')
    <!-- begin::main content -->
    <main class="main-content">

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد کاربر</h6>
                    <livewire:Admin.Users.Create />
                </div>
            </div>
        </div>

    </main>
@endsection
