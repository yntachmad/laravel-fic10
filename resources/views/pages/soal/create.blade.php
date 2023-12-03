@extends('layouts.app')

@section('title', 'Soal Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Register Soal Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Soal</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Soal</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>


                <div class="card">
                    <div class="card-header">
                        <h4>Input Text</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('soal.store') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="pertanyaan">Soal</label>
                                <input type="text"
                                    class="form-control @error('pertanyaan') is-invalid
                            @enderror"
                                    name="pertanyaan" placeholder="">
                                @error('pertanyaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="kategori">Kategori</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="kategori" value="Numeric" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Numeric</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="kategori" value="Verbal" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Verbal</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="kategori" value="Logika" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Logika</span>
                                    </label>


                                </div>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="jawaban_a">Jawaban A</label>
                                <input type="text"
                                    class="form-control @error('jawaban_a') is-invalid
                            @enderror"
                                    name="jawaban_a" placeholder="" required>
                                @error('jawaban_a')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="jawaban_b">Jawaban B</label>
                                <input type="text"
                                    class="form-control @error('jawaban_b') is-invalid
                            @enderror"
                                    name="jawaban_b" placeholder="" required>
                                @error('jawaban_b')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="jawaban_c">Jawaban C</label>
                                <input type="text"
                                    class="form-control @error('jawaban_c') is-invalid
                            @enderror"
                                    name="jawaban_c" placeholder="" required>
                                @error('jawaban_c')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="jawaban_d">Jawaban D</label>
                                <input type="text"
                                    class="form-control @error('jawaban_d') is-invalid
                            @enderror"
                                    name="jawaban_d" placeholder="" required>
                                @error('jawaban_d')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="kunci">Kunci</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="kunci" value="a" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">A</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="kunci" value="b" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">B</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="kunci" value="c" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">C</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="kunci" value="d" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">D</span>
                                    </label>

                                </div>
                                @error('kunci')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                {{-- <div class="card">
                            <div class="card-header">
                                <h4>Toggle Switches</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="control-label">Toggle switches</div>
                                    <div class="custom-switches-stacked mt-2">
                                        <label class="custom-switch">
                                            <input type="radio" name="option" value="1" class="custom-switch-input"
                                                checked>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Option 1</span>
                                        </label>
                                        <label class="custom-switch">
                                            <input type="radio" name="option" value="2" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Option 2</span>
                                        </label>
                                        <label class="custom-switch">
                                            <input type="radio" name="option" value="3" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Option 3</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="control-label">Toggle switch single</div>
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">I agree with terms and conditions</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Image Check</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Image Check</label>
                                    <div class="row gutters-sm">
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="1"
                                                    class="imagecheck-input" />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img01.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="2"
                                                    class="imagecheck-input" checked />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img02.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="3"
                                                    class="imagecheck-input" />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img03.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="4"
                                                    class="imagecheck-input" checked />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img04.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="5"
                                                    class="imagecheck-input" />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img05.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <input name="imagecheck" type="checkbox" value="6"
                                                    class="imagecheck-input" />
                                                <figure class="imagecheck-figure">
                                                    <img src="{{ asset('img/news/img06.jpg') }}" alt="}"
                                                        class="imagecheck-image">
                                                </figure>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Color</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Simple</label>
                                    <input type="text" class="form-control colorpickerinput">
                                </div>
                                <div class="form-group">
                                    <label>Pick Your Color</label>
                                    <div class="input-group colorpickerinput">
                                        <input type="text" class="form-control">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-fill-drip"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Color Input</label>
                                    <div class="row gutters-xs">
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="primary"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-primary"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="secondary"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-secondary"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="danger"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-danger"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="warning"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-warning"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="info"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-info"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="colorinput">
                                                <input name="color" type="checkbox" value="success"
                                                    class="colorinput-input" />
                                                <span class="colorinput-color bg-success"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
