@extends('layout.masterAdmin')

@section('content')
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                                    <i class="fa fa-book"></i> Manage Topics
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link text-white fw-bold" href="{{ route('admin.division') }}">
                                    <i class="fa fa-users"></i> Division
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link text-white" href="#">
                                    <i class="fa fa-cogs"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Content -->
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Division</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                        </div>
                    </div>
                    <!-- Content for managing training topics -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h5 class="my-0">Division List</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name Division</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Contoh data, bisa diisi dengan data dari database -->
                                    @foreach ($data_divisions as $division)
                                        <tr>
                                            <td>{{ $division->id }}</td>
                                            <td>{{ $division->name_division }}</td>
                                        </tr>
                                    @endforeach
                                    <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tambahkan konten lainnya sesuai kebutuhan -->
                </main>
            </div>
        </div>
    </div>
@endsection
