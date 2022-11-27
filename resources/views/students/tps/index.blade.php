<x-admin.theme>    
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <div class="table-responsive text-nowrap">
        <div class="d-flex flex-end gap-2 p-3">
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Classe</th>
              <th>Cours</th>
              <th>Professeur</th>
              <th>Fichier</th>
              <th>Date soumission</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($tps as $tp)
                <tr>
                  <td>{{$tp->student->classe->name}}</td>
                  <td>{{$tp->tp->cours->ecu->name}}</td>
                  <td>{{$tp->tp->cours->professeur->user->name}}</td>
                  <td><a href="{{ asset($tp->url) }}"><img src="{{ asset('assets/img/icons/xl.png') }}" alt="" width="50"></a></td>
                  <td>
                      <span class="badge bg-label-primary m-1">{{$tp->date_soumission}}</span>
                  </td>
                  <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            @php
                                $deadline = \Carbon\Carbon::parse($tp->tp->dealine);
                                $now = \Carbon\Carbon::now();
                                $difference = $deadline->diffInDays($now);
                            @endphp
                            @if ($difference >= 0)
                                <a class="dropdown-item" href="{{ route('studentTp.edit', $tp) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                <form action="{{ route('studentTp.destroy', $tp) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"><i class="bx bx-trash me-2"></i> Supprimer</button>
                                </form>
                            @endif
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