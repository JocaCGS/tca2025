<?php

namespace App\Policies;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Http\Controllers\PermissionController;
class CursoPolicy {
    public function viewAny(User $user): bool {
        return PermissionController::isAuthorized('curso.index');
    }
    public function view(User $user, Curso $curso): bool {
        return PermissionController::isAuthorized('curso.show');
    }
    public function create(User $user): bool {
        return PermissionController::isAuthorized('curso.create');
    }
    public function update(User $user, Curso $curso): bool {
        return PermissionController::isAuthorized('curso.edit');
    }
    public function delete(User $user, Curso $curso): bool {
        return PermissionController::isAuthorized('curso.delete');
    }
    public function restore(User $user, Curso $curso): bool {
        return PermissionController::isAuthorized('curso.delete');
    }
    public function forceDelete(User $user, Curso $curso): bool {
        return PermissionController::isAuthorized('curso.delete');
    }
}