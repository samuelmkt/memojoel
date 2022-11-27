<x-admin.theme>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Professeurs</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <h5 class="card-header">Informations</h5>
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
                    <form action="{{ route('professeurs.update', $professeur) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nom</label>
                            <input
                              type="text"
                              class="form-control"
                              id="defaultFormControlInput"
                              placeholder=""
                              aria-describedby="defaultFormControlHelp"
                              name="name"
                              value="{{ $professeur->user->name }}"
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
                              value="{{ $professeur->user->email }}"
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
                                            <input 
                                            class="form-check-input" 
                                            type="checkbox" 
                                            value="{{ $ecu->code_mat }}"
                                            name="cours[]"
                                            @if ($cours->contains('name', $ecu->name))
                                                @checked(true)
                                            @endif
                                            />
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