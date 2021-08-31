@extends('layouts.appAdn')

@section('content')
<!-- START: tables/datatables -->
<div class="">
    @include('flash::message')
</div>
<section class="card">
  <div class="card-header">
    <span class="cui-utils-title">
      <strong>Roles</strong>
      <a href="{{route('admin.role.create')}}" class="btn btn-sm btn-primary ml-2"
        ><i class="fa fa-plus"></i> Nouveau rôle</a
      >
    </span>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="mb-5">
          <table class="table table-hover nowrap" id="example1">
            <thead>
              <tr>
                <th>#</th>
                <th><i class="fa fa-shield-alt"></i> Noms</th>
                <th  class="hidden-phone"><i class="fa fa-calendar-alt"></i> Créé le...</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($roles as $key => $role)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$role->display_name}}</td>
                        <td>{{$role->created_at->format('d-m-Y \à H:i:s')}}</td>
                        <td>
                            @can('voir_roles')
                              <a class="btn btn-secondary btn-xs text-light" href="{{route('admin.role.show', $role->id)}}"><i class="fa fa-eye"></i></a>
                            @endcan
                            @can('editer_roles')
                              <a class="btn btn-warning btn-xs text-light" href="{{route('admin.role.edit', $role->id)}}"><i class="fa fa-pen"></i></a>
                            @endcan
                            @can('supprimer_roles')
                              <a class="btn btn-danger btn-xs text-light" href="#" data-toggle="modal" data-target="#delete{{$role->id}}"><i class="fa fa-trash-alt"></i></a>
                              <!-- Modal Suprimer role-->
                              <div class="modal fade" id="delete{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: #0d6e77 !important">
                                          <h4 class="modal-title" id="myModalLabel">Suppression de rôle</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <form>
                                        <div class="modal-body">
                                            <label> Confirmez-vous la suppression du rôle <strong>{{$role->display_name}}</strong> ?</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-dismiss="modal" style="background: #f4bd19 !important; color: #000">Annuler</button>
                                            <a type="submit" id="supprimer" href="{{route('admin.role.delete', $role->id)}}" class="btn btn-danger">Supprimer</a>
                                        </div>
                                      </form>
                                    </div>
                                </div>
                              </div>
                              <!--fin modal-->
                            @endcan
                        </td>

                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="6"><h3>----  ----</h3></td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th><i class="fa fa-shield-alt"></i> Noms</th>
                <th  class="hidden-phone"><i class="fa fa-calendar-alt"></i> Créé le...</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
          {{ $roles->links() }}
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END: tables/datatables -->

<!-- START: page scripts -->
<script>
  ;(function($) {
    'use strict'
    $(function() {
      $('#example1').DataTable({
        responsive: true,
      })

      $('#example2').DataTable({
        autoWidth: true,
        scrollX: true,
        fixedColumns: true,
      })

      $('#example3').DataTable({
        autoWidth: true,
        scrollX: true,
        fixedColumns: true,
      })
    })
  })(jQuery)
</script>
<!-- END: page scripts -->

@endsection
