<x-admin.theme>    
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <div class="table-responsive text-nowrap">
        <div class="d-flex flex-end gap-2 p-3">
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Classe</th>
              <th>Date soumission</th>              
              <th>Fichier</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($tps as $tp)
                <tr>
                  <td>{{$tp->pivot->student->user->name         }}</td>
                  <td>{{$tp->pivot->tp->cours->classe->name     }}</td>
                  <td>{{$tp->pivot->date_soumission             }}</td>

                  <td><a href="{{ asset($tp->pivot->url) }}"><img src="{{ asset('assets/img/icons/xl.png') }}" alt="" width="50"></a></td>
                  <td>
                      <span class="badge bg-label-primary m-1">{{$tp->date_soumission}}</span>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</x-admin.theme>