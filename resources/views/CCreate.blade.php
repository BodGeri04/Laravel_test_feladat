@extends('main')
@section('content')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Buttons</h1>

            <div class="row">

                <div class="col-lg-12">
                    @if ($mode == 'create')
                        <form method="POST" action="{{ route('company.store') }}">
                            @csrf
                    @endif
                    @if ($mode == 'edit')
                        <form method="POST" action="{{ route('CCreate.update', $roomsEdit->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                    @endif
                    <!-- Circle Buttons -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Circle Buttons</h6>
                        </div>
                        <div class="card-body">
                            <p>Use Font Awesome Icons (included with this theme package) along with the circle
                                buttons as shown in the examples below!</p>
                            <!-- Circle Buttons (Default) -->
                            <div class="mb-2">
                                <label>A cég neve</label>
                            </div>
                            <input type="text" name="company_name" id="company_name">
                            <!-- Circle Buttons (Small) -->
                            <div class="mt-4 mb-2">
                                <label>Adószám</label>
                            </div>
                            <input type="number" name="taxNumber" id="taxNumber">
                            <!-- Circle Buttons (Large) -->
                            <div class="mt-4 mb-2">
                                <label>Telefonszám</label>
                            </div>
                            <input type="phone" name="phone_number" id="phone_number">
                            <div class="mt-4 mb-2">
                                <label>A cég email címe</label>
                            </div>
                            <input type="email" name="company_email" id="company_email">
                        </div>
                        <button type="submit" class="btn btn-success">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Split Button Success</span>
                        </button>
                    </div>
                    </form>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
@endsection
