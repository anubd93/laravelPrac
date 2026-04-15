<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    private $id, $name, $email, $password, $created_at, $updated_at, $deleted_at;

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function setCreatedAt($created_at){
        $this->created_at = $created_at;
        return $this;
    }

    public function setUpdatedAt($updated_at){
        $this->updated_at = $updated_at;
        return $this;
    }

    public function setDeletedAt($deleted_at){
        $this->deleted_at = $deleted_at;
        return $this;
    }

    public function registerUser() {
        $id = DB::table('users')->insertGetId([
                'name'       => $this->name,
                'email'      => $this->email,
                'password'   => Hash::make($this->password),
                'created_at' => now(),
                'updated_at' => now(),
        ]);

       return (array) DB::table('users')->select('name', 'email')->where('id', $id)->first();
    }

    public function login(){
         return User::where('email', $this->email)->first();
    }
}
