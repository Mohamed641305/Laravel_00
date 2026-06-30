@extends('layouts.edu-admin')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <div class="welcome-box">
        <div>
            <h2 class="mb-1 fw-bold">Welcome Back 👋</h2>
            <p class="mb-0">Manage your users and monitor your system.</p>
        </div>

        <div class="welcome-icon">
            <i class="fas fa-chart-pie"></i>
        </div>
    </div>

    <div class="mt-2 row g-4">

        <!-- Total Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">

                    <div class="icon users">
                        <i class="fas fa-users"></i>
                    </div>

                    <h6>Total Users</h6>
                    <h2>{{ $usercount ?? 0 }}</h2>

                    <span class="status">
                        <i class="fas fa-user"></i> Registered Users
                    </span>

                </div>
            </div>
        </div>

        <!-- Active Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">

                    <div class="icon active">
                        <i class="fas fa-user-check"></i>
                    </div>

                    <h6>Active Users</h6>
                    <h2>{{ $activeUsers ?? 0 }}</h2>

                    <span class="status">
                        <i class="fas fa-circle text-success"></i> Active Accounts
                    </span>

                </div>
            </div>
        </div>

        <!-- Blocked Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">

                    <div class="icon blocked">
                        <i class="fas fa-user-slash"></i>
                    </div>

                    <h6>Blocked Users</h6>
                    <h2>{{ $blockedUsers ?? 0 }}</h2>

                    <span class="status">
                        <i class="fas fa-ban"></i> Blocked Accounts
                    </span>

                </div>
            </div>
        </div>

        <!-- Admins -->
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">

                    <div class="icon admins">
                        <i class="fas fa-user-shield"></i>
                    </div>

                    <h6>Admins</h6>
                    <h2>{{ $adminCount ?? 0 }}</h2>

                    <span class="status">
                        <i class="fas fa-shield-alt"></i> System Admins
                    </span>

                </div>
            </div>
        </div>

    </div>
</div>