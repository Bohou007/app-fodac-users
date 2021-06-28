
<div class="card-body">
    <div class="col-md-12">
        <label for="permissions">Permissions{!! $etoile !!}</label>
        <div class="form-group row @if ($errors->has('permissions')) has-danger @endif">
            @if(isset($role->permissions) && !empty($role->permissions))
                @php
                    $perms_array = $permissions->chunk(4);
                    foreach($perms_array as $perms) {
                        echo '<div class="card col-lg-3" style="padding: 0.5rem; width: 18rem;">
                            <ul class="list-group list-group-flush">';
                                foreach($perms as $perm) {
                                    if($role->hasPermissionTo($perm->id)) {
                                        echo '
                                        <li class="list-group-item">
                                            <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permissions[]" value="'.$perm->name.'" class="custom-control-input" checked>
                                            <span class="custom-control-label">'.$perm->name.'</span>
                                            </label>
                                        </li>';
                                    }
                                    else {
                                        echo '
                                        <li class="list-group-item">
                                            <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permissions[]" value="'.$perm->name.'" class="custom-control-input">
                                            <span class="custom-control-label">'.$perm->name.'</span>
                                            </label>
                                        </li>';
                                    }
                                }

                        echo '</ul>
                             </div>';
                    }
                @endphp
            @else
                @php
                    $perms_array = $permissions->chunk(4);
                    foreach($perms_array as $perms) {
                        echo '
                        <div class="card col-lg-3" style="padding: 0.6rem; width: 18rem;">
                            <ul class="list-group list-group-flush">';
                                foreach($perms as $perm) {
                                    echo '
                                        <li class="list-group-item">
                                            <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permissions[]" value="'.$perm->name.'" class="custom-control-input" >
                                            <span class="custom-control-label">'.$perm->name.'</span>
                                            </label>
                                        </li>';
                                }
                            echo '</ul>
                        </div>';
                    }
                @endphp
            @endif
        </div>
        @if ($errors->has('permissions')) <p class="text-danger">{{ $errors->first('permissions') }}</p> @endif
    </div>
</div>
