<x-admin.theme>    
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <div class="d-flex flex-end gap-2 p-3">
      	@role('Students')
        <a href="{{ route('claims.create') }}" class="float-end btn btn-primary">Formuler une réclamation</a>
        @endrole
      </div>
      <div class="table-responsive text-nowrap">
        <div class="d-flex flex-end gap-2 p-3">
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Etudiant</th>
              <th>Description</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($claims as $claim)
                <tr>
                  <td>{{  \Carbon\Carbon::parse($claim->created_at)->format('d-m-Y')  ?? '' }}</td>
                  <td>{{ $claim->student->user->name ?? '' }}</td>
                  <td class="d-flex align-items-center justify-content-center">
                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                      {{  $claim->description ?? '' }}
                    </span>
                      <button
                        type="button"
                        class="btn btn-light text-primary p-0 m-0"
                        data-bs-toggle="modal"
                        data-bs-target="#modalScrollable{{$claim->id}}"
                      >
                        Lire Plus
                      </button>
                  </td>
                  <td>
                      <span class="badge bg-label-primary m-1">
                        @if ($claim->status)
                          {{  __('Déjà traité') }}
                        @else
                          {{  __('En cours de traitement')  }}
                        @endif
                      </span>
                  </td>
                  <td>
                      <!-- Modal -->
                      <div class="modal fade" id="modalScrollable{{$claim->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalScrollableTitle">Description</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="modal-body">
                              <p>
                                {{  $claim->description  ?? '' }}
                              </p>
                            </div>
                            <div class="modal-footer">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          @role('Super Admin')
                          <form action="{{ route('claims.class', $claim) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="dropdown-item" type="submit"><i class="bx bx-trash me-2"></i> Classer</button>
                          </form>
                          @endrole
                          <form action="{{ route('claims.destroy', $claim) }}" method="post">
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
