<x-admin.theme>
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
                    <form action="{{ route('students.studentTp.store', $student) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Tp</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="tp_id">
                                @foreach ($tps as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->cours->ecu->name }}</option>
                                @endforeach
                            </select>
                        </div>
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
