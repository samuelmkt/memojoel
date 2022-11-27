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
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Matricule</label>
                            <input
                              type="text"
                              class="form-control"
                              id="defaultFormControlInput"
                              placeholder=""
                              aria-describedby="defaultFormControlHelp"
                              name="matricule"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nom</label>
                            <input
                              type="text"
                              class="form-control"
                              id="defaultFormControlInput"
                              placeholder="Ekpinda Joel"
                              aria-describedby="defaultFormControlHelp"
                              name="name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Email</label>
                            <input
                              type="email"
                              class="form-control"
                              id="defaultFormControlInput"
                              placeholder="test@example.com"
                              aria-describedby="defaultFormControlHelp"
                              name="email"
                            />
                            <div id="defaultFormControlHelp" class="form-text">
                              Un lien de connexion sera envoyé sur cet email.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Classe</label>
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="classe">
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.theme>

