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
                                <a class="nav-link text-white fw-bold" href="{{ route('admin.dashboard') }}">
                                    <i class="fa fa-book"></i> Manage Topics
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link text-white" href="{{ route('admin.division') }}">
                                    <i class="fa fa-users"></i> Division
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="nav-link text-white" href="#">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Content -->
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Manage Topics</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#addTopicModal">
                                <i class="fa fa-plus"></i> Add New Topic
                            </button>
                        </div>
                    </div>
                    <!-- Content for managing training topics -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h5 class="my-0">Training Topics</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Topic Title</th>
                                        <th>Description</th>
                                        <th>Division</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trainingTopic as $topic)
                                        <tr>
                                            <td>{{ $topic->id }}</td>
                                            <td>{{ $topic->title }}</td>
                                            <td style="word-wrap: break-word; max-width: 400px;">{{ $topic->description }}
                                            </td>
                                            <td>{{ $divisions[$topic->id_division]->name_division }}</td>
                                            <td>
                                                @if ($topic->image)
                                                    <img src="{{ Storage::url($topic->image) }}" alt="{{ $topic->title }}"
                                                        style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#topicModal" data-id="{{ $topic->id }}"
                                                    data-title="{{ $topic->title }}"
                                                    data-description="{{ $topic->description }}"
                                                    data-division="{{ $divisions[$topic->id_division]->name_division }}"
                                                    data-image="{{ Storage::url($topic->image) }}">
                                                    Lihat
                                                </button>
                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editTopicModal" data-id="{{ $topic->id }}"
                                                    data-title="{{ $topic->title }}"
                                                    data-description="{{ $topic->description }}"
                                                    data-division="{{ $topic->id_division }}"
                                                    data-image="{{ Storage::url($topic->image) }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger delete-btn" data-url="{{ route('admin.delete', $topic->id) }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $trainingTopic->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    @include('adminPage.show')
                    @include('adminPage.edit')
                    @include('adminPage.create')
                    @include('adminPage.delete')
                    @include('layout.footer')
                </main>
            </div>
        </div>
    </div>
@endsection
