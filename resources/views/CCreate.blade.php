@extends('main')
@section('content')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Cég megadása/módosítása</h1>

            <div class="row">

                <div class="col-lg-12">
                    @if ($mode == 'create')
                        <form id="myForm" method="POST" action="{{ route('company.store') }}">
                            @csrf
                    @endif
                    @if ($mode == 'edit')
                        <form method="POST" action="{{ route('company.update', $company->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                    @endif
                    <!-- Circle Buttons -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Céges adatok</h6>
                        </div>
                        <div class="card-body">
                            <!-- Circle Buttons (Default) -->
                            <div class="mb-2">
                                <label>A cég neve</label>
                            </div>
                            <input type="text" name="company_name" id="company_name" value="{{ isset($company) ? $company->company_name : '' }}">
                            <div id="company_name_error" class="error-message"></div>
                            <!-- Circle Buttons (Small) -->
                            <div class="mt-4 mb-2">
                                <label>Adószám</label>
                            </div>
                            <input type="number" name="taxNumber" id="taxNumber" value="{{ isset($company) ? $company->taxNumber : '' }}">
                            <div id="taxNumber_error" class="error-message"></div>
                            <!-- Circle Buttons (Large) -->
                            <div class="mt-4 mb-2">
                                <label>Telefonszám</label>
                            </div>
                            <input type="phone" name="phone_number" id="phone_number" value="{{ isset($company) ? $company->phone_number : '' }}">
                            <div id="phone_number_error" class="error-message"></div>
                            <div class="mt-4 mb-2">
                                <label>A cég email címe</label>
                            </div>
                            <input type="email" name="company_email" id="company_email" value="{{ isset($company) ? $company->company_email : '' }}">
                            <div id="company_email_error" class="error-message"></div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Mentés</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
@endsection
