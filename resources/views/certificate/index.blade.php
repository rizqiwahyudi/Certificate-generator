@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Certificate') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class="fas fa-home text-white"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Certificate') }}</li>
                            </ol>
                        </nav>
                    </div>
                    @if (auth()->user()->level_id == 1)
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('certificates.create') }}"
                                class="btn btn-sm btn-neutral">{{ __('Generate Certificate') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('Certificate') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable" style="white-space:normal">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Participant') }}</th>
                                    <th>{{ __('Event') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificates as $certificate)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $certificate->participant->user->name }}</td>
                                        <td class="align-middle">
                                            <div class="progress-label">
                                                <span class="text-primary">{{ $certificate->event->name }}</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">{{ $certificate->description }}</td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('certificates.generate', $certificate) }}" target="_blank"
                                                class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Generate Certificate"><span class="btn-inner--icon"><i
                                                        class="fas fa-print"></i></span></a>
                                            @if (auth()->user()->level_id == 1)
                                                <button onclick="deleteItem(this)" data-id="{{ $certificate->id }}"
                                                    class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
        @include('certificate.script')
    </div>
    </div>
@endsection