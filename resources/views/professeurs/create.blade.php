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
                    <form action="{{ route('professeurs.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nom</label>
                            <input
                              type="text"
                              class="form-control"
                              id="defaultFormControlInput"
                              placeholder="Eugene Ezin"
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
                        @foreach ($classes as $classe)
                            <div class="mb-3">
                                @if (count($classe->ecus) > 0)
                                    <small class="text-light fw-semibold">{{ $classe->name }}</small>
                                    @foreach ($classe->ecus as $ecu)
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" value="{{ $ecu->code_mat }}" name="cours[]"/>
                                            <label class="form-check-label">{{ $ecu->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.theme>

