<x-admin.theme>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">ECU</label>
                                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="ecu">
                                    @foreach ($classes as $classe)
                                        @if (count($classe->ecus) > 0)
                                            <optgroup label="{{ $classe->name }}">
                                                @foreach ($classe->ecus as $ecu)
                                                    <option @if(!$ecu->cours) @disabled(true) @endif value="{{ $ecu->code_mat }}">{{ $ecu->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Fichier de notes</label>
                                <input class="form-control" type="file" id="formFile" name="note" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.theme>