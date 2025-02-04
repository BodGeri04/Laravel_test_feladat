@extends('main')

@section('content')
    <title>Főoldal_Laravel_test_feladat</title>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Főoldal</h1>
                <a href="/company/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Cég hozzáadása</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/companiesList">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Cégek Lista nézete</div>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Earnings (Annual)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Requests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-7">
                    <!-- Card Body -->
                    <!-- Main Content -->
                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                </div>
                                <a href="{{ route('company.create') }}" class="btn btn-success">Cég hozzáadása</a>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                            <thead>
                                                <tr>
                                                    <th>Cég ID</th>
                                                    <th>Cég neve</th>
                                                    <th>Adószáma</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Cég ID</th>
                                                    <th>Cég neve</th>
                                                    <th>Adószáma</th>
                                                    <th></th>

                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @empty($companies)
                                                    <td>Jelenleg nincs egy cég sem.
                                                    </td>
                                                @endempty
                                                @foreach ($companies as $company)
                                                    <tr id="tr-{{ $company->id }}">

                                                        <td>{{ $company->id }}</td>
                                                        <td>{{ $company->company_name }}</td>
                                                        <td>{{ $company->taxNumber }}</td>

                                                        <td>
                                                            <a href="{{ route('company.show', $company->id) }}"
                                                                class="btn btn-primary">Részletek</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.container-fluid -->
                        <!-- End of Main Content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- End of Content Wrapper -->
@endsection
