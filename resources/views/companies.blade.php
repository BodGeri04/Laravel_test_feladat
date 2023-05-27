@extends('main')
@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                    For more information about DataTables, please visit the <a target="_blank"
                        href="https://datatables.net">official DataTables documentation</a>.</p>

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

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
@endsection
