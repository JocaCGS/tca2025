<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Http\Controllers\PermissionController;
class AlunoPolicy {
    public function viewAny(User $user): bool {
        return PermissionController::isAuthorized('aluno.index');
    }
    public function view(User $user, Aluno $aluno): bool {
        return PermissionController::isAuthorized('aluno.show');
    }
    public function create(User $user): bool {
        return PermissionController::isAuthorized('aluno.create');
    }
    public function update(User $user, Aluno $aluno): bool {
        return PermissionController::isAuthorized('aluno.edit');
    }
    public function delete(User $user, Aluno $aluno): bool {
        return PermissionController::isAuthorized('aluno.delete');
    }
    public function restore(User $user, Aluno $aluno): bool {
        return PermissionController::isAuthorized('aluno.delete');
    }
    public function forceDelete(User $user, Aluno $aluno): bool {
        return PermissionController::isAuthorized('aluno.delete');
    }
}