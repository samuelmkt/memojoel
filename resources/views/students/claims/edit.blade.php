<x-admin.theme>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Professeurs</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
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
                    <form action="{{ route('studentTp.update', $studentTp) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Tp</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="tp_id">
                                @foreach ($tps as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->cours->ecu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="studentTp" value="{{ $studentTp->id }}">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Fichier du TP</label>
                            <input class="form-control" type="file" id="formFile" name="tp"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.theme>
