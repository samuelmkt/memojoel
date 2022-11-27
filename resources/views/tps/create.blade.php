<x-admin.theme>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Professeurs</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('tps.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Deadline</label>
                            <input
                              type="date"
                              class="form-control"
                              id="defaultFormControlInput"
                              aria-describedby="defaultFormControlHelp"
                              name="deadline"
                            />
                        </div>

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">ECU</label>
                                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="ecu">
                                    @foreach ($classes as $classe)
                                        <optgroup label="{{ $classe->name }}">
                                            @foreach ($classe->ecus as $ecu)
                                                @if ($ecu->cours && $cours->contains('name', $ecu->name))
                                                    <option value="{{ $ecu->code_mat }}">{{ $ecu->name }}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Fichier du TP</label>
                            <input class="form-control" type="file" id="formFile" name="tp" accept=".pdf"/>
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.theme>
