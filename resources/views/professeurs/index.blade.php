<x-admin.theme>
<!--h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Liste des professeurs</h4-->

<!-- Basic Bootstrap Table -->
<div class="card">
  <div class="table-responsive text-nowrap">
    <div class="d-flex flex-end gap-2 p-3">
      <a href="{{ route('professeurs.create') }}" class="float-end btn btn-primary">Nouveau</a>
      <a href="{{ route('imports.professeurs') }}" class="float-end btn btn-primary">Importer</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Noms</th>
          <th>Email</th>
          <th>Cours</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          @foreach ($professeurs as $professeur)
            <tr>
              <td><strong>{{$professeur->user->name ?? '' }}</strong></td>
              <td>{{$professeur->user->email ?? '' }}</td>
              <td>
                @foreach ($professeur->getCoursesNames() as $cours)
                  <span class="badge bg-label-primary m-1">{{$cours->name}}</span>
                @endforeach                                    
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('professeurs.edit', $professeur) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                    <form action="{{ route('professeurs.destroy', $professeur) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="dropdown-item" type="submit"><i class="bx bx-trash me-2"></i> Supprimer</button>
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
