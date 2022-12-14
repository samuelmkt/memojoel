<x-admin.theme>
    <!--h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard</h4-->
    
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <div class="table-responsive text-nowrap">
        <div class="d-flex flex-end p-3">
          @can('notes create')
            <a href="{{ route('notes.create') }}" class="btn btn-primary">Nouveau</a>
          @endcan
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Classe</th>
              <th>Cours</th>
              <th>Professeur</th>
              <th>Fichier</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($notes as $note)
                <tr>
                  <td>{{$note->cours->classe->name ?? null }}</td>
                  <td>{{$note->cours->ecu->name ?? null }}</td>
                  <td>{{$note->cours->professeur->user->name ?? null }}</td>
                  <td><a href="{{ asset($note->url) }}"><img src="{{ asset('assets/img/icons/xl.png') }}" alt="" width="50"></a></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('notes.edit', $note) }}">Renseigner notes</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="dropdown-item" type="submit">Supprimer</button>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</x-admin.theme>
