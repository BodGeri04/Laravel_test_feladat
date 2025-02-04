@extends('main')
@section('content')
    <title>Cég_részletei_Laravel_test_feladat</title>
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Részletes Lista az adott cégről</h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Cég</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th>Cég ID</th>
                                        <th>Cég neve</th>
                                        <th>Adószáma</th>
                                        <th>Telefonszáma</th>
                                        <th>Email címe</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Cég ID</th>
                                        <th>Cég neve</th>
                                        <th>Adószáma</th>
                                        <th>Telefonszáma</th>
                                        <th>Email címe</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr id="tr-{{ $company->id }}">
                                        <td>{{ $company->id }}</td>
                                        <td>{{ $company->company_name }}</td>
                                        <td>{{ $company->taxNumber }}</td>
                                        <td>{{ $company->phone_number }}</td>
                                        <td>{{ $company->company_email }}</td>
                                        <td><a href="{{ route('company.edit', $company->id) }}"
                                                class="btn btn-warning">Szerkesztés</a></td>
                                        <td><a href="{{ url('company/' . $company->id) }}" class="btn btn-danger"
                                                onclick="event.preventDefault(); deleteCompany('{{ $company->id }}')">Törlés</a>
                                        </td>
                                        <form id="delete-form-{{ $company->id }}"
                                            action="{{ url('company/' . $company->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
    <script>
        function deleteCompany(companyId) {
            if (confirm('Biztosan törölni szeretnéd ezt az elemet?')) {
                event.preventDefault();
                document.getElementById('delete-form-' + companyId).submit();
            }
        }
    </script>
@endsection
