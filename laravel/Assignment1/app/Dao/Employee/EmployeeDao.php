<?php

namespace App\Dao\Employee;

// use App\Contracts\Dao\User\UserDaoInterface;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;

/**
 * Data Access Object for User
 */
class EmployeeDao implements EmployeeDaoInterface
{
  
  public function list()
  {
    $data = Employee::paginate(5);
    return $data;
  }

  public function insert()
  {

  }

  public function create(){
    
  }

  /**
   * To get user list
   * @return array $userList list of users
   */
  public function getUserList()
  {
    $userList = DB::table('users as user')
      ->join('users as created_user', 'user.created_user_id', '=', 'created_user.id')
      ->join('users as updated_user', 'user.updated_user_id', '=', 'updated_user.id')
      ->select('user.*', 'created_user.name as created_user', 'updated_user.name as updated_user')
      ->whereNull('user.deleted_at')
      ->get();
    return $userList;
  }
}