<?php
class Role extends Eloquent {

    protected $table = 'roles';

    protected function getRole($id)
    {
        $role = DB::table('roles')
        ->select('role')
        ->where('id','=',$id)
        ->get();
        return $role[0]->role;
    }
}
