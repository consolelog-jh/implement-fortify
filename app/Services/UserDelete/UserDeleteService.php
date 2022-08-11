<?php

declare(strict_types=1);

namespace App\Services\UserDelete;

use App\Models\User;
use App\Services\Contracts\UserDeleteContract;

class UserDeleteService implements UserDeleteContract
{
    /**
     * delete user in database
     *
     * @param string $id
     * @return void
     */
    public function deleteUser(string $id)
    {
        $user = User::find($id);
        $res = $user->delete();

        if ($res) {
            return redirect()->route('home');
        } else {
            return back()->with(
                'status',
                'Une erreur est survenue. Impossible de supprimer le compte'
            );
        }
    }
}
