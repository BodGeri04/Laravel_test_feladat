@extends('main')
@section('content')
<title>Cégek_listája_Laravel_test_feladat</title>
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Cégek</h1>
                <!-- DataTales Example -->
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
                                        <td >Jelenleg nincs egy cég sem.
                                        </td>
                                    @endempty
                                    @foreach ($companies as $company)
                                        <tr id="tr-{{ $company->id }}">

                                            <td>{{ $company->id }}</td>
                                            <td>{{ $company->company_name }}</td>
                                            <td>{{ $company->taxNumber }}</td>
                                            
                                            <td>
                                                <a href="{{ route('company.show', $company->id) }}" class="btn btn-primary">Részletek</a>
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

        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
@endsection
