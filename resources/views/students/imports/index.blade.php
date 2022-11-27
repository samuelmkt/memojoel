<x-admin.theme>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Professeurs</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <h5 class="card-header">Fichier Excel</h5>
                @if ($errors->any())
                    <div class="errors text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Liste Excel Etudiants</label>
                            <input class="form-control" type="file" id="formFile" name="listing" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.theme>