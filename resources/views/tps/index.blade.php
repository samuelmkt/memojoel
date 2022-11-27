<x-admin.theme>    
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <div class="table-responsive text-nowrap">
        <div class="d-flex flex-end gap-2 p-3">
          @can('tps create')
            <a href="{{ route('tps.create') }}" class="float-end btn btn-primary">Nouveau</a>
          @endcan
          @role('Students')
            <a href="{{ route('students.studentTp.create', Auth::user()->student) }}" class="float-end btn btn-primary">Rendre un TP</a>
          @endrole
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Classe</th>
              <th>Cours</th>
              <th>Professeur</th>
              <th>Fichier</th>
              <th>Deadline</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($tps as $tp)
                <tr>
                  <td>{{$tp->cours->classe->name}}</td>
                  <td>{{$tp->cours->ecu->name}}</td>
                  <td>{{$tp->cours->professeur->user->name}}</td>
                  <td><a href="{{ asset($tp->url) }}"><img src="{{ asset('assets/img/icons/xl.png') }}" alt="" width="50"></a></td>
                  <td>
                      <span class="badge bg-label-danger m-1">{{$tp->deadline}}</span>
                  </td>
                  <td>
                    @role('Teacher')
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{ route('resultatsTp', ['tp'=>$tp]) }}">
                              <i class='bx bx-list-minus me-2'></i> Resultats
                          </a>
                          @can('tps update')
                            <a class="dropdown-item" href="{{ route('tps.edit', $tp) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                          @endcan
                          @can('tps delete')
                            <form action="{{ route('tps.destroy', $tp) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="dropdown-item" type="submit"><i class="bx bx-trash me-2"></i> Supprimer</button>
                            </form>
                          @endcan
                        </div>
                      </div>
                    @endrole
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</x-admin.theme>