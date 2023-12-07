@extends('layouts.app')

@section('title', 'Bank Soal')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Bank Soal - Tugas 2 | Achmad Jayanto</h1>
                <div class="section-header-button">
                    <a href="{{ route('soal.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Soal</a></div>
                    <div class="breadcrumb-item">All Soal</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert');
                    </div>
                </div>
                <h2 class="section-title">Soal</h2>
                <p class="section-lead">
                    You can manage all Soal, such as editing, deleting and more.
                </p>

                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">All <span
                                                class="badge badge-white">5</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Draft <span
                                                class="badge badge-primary">1</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Pending <span
                                                class="badge badge-primary">1</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Trash <span
                                                class="badge badge-primary">0</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form method="get" action="{{ route('soal.index') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="soal">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            {{-- <th class="pt-2 text-center">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        data-checkbox-role="dad" class="custom-control-input"
                                                        id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th> --}}
                                            <th>id</th>
                                            <th>Soal</th>
                                            <th>Jawaban A</th>
                                            <th>Jawaban B</th>
                                            <th>Jawaban C</th>
                                            <th>Jawaban D</th>

                                        </tr>
                                        @foreach ($soals as $soal)
                                            <tr>
                                                {{-- <td>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                            class="custom-control-input" id="checkbox-2">
                                                        <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td> --}}
                                                <td>{{ $soal->id }}
                                                    <div class="table-links">
                                                        <a href="#">View</a>
                                                        <div class="bullet"></div>
                                                        <a href="#">Edit</a>
                                                        <div class="bullet"></div>
                                                        <a href="#" class="text-danger">Trash</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $soal->pertanyaan }}
                                                </td>
                                                <td>
                                                    {{ $soal->jawaban_a }}
                                                </td>
                                                <td>
                                                    {{ $soal->jawaban_b }}
                                                </td>
                                                <td>
                                                    {{ $soal->jawaban_c }}
                                                </td>
                                                <td>
                                                    {{ $soal->jawaban_d }}
                                                </td>

                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $soals->withQueryString()->links() }}
                                    {{-- <nav>
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
