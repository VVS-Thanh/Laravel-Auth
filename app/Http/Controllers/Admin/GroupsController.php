<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groups;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Illuminate\Support\Facades\Auth;
use App\Models\Modules;

class GroupsController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        if(Auth::user()->user_id == 0){
            $lists = Groups::all();
        }else
        {
            $lists = Groups::where('user_id', $userId)->get();
        }

        return view('admin.groups.list', compact('lists'));
    }
    public function add(){
        return view('admin.groups.add');
    }

    public function postAdd(Request $request){
        $request -> validate(
            [
                'name' => 'required|unique:groups,name',

            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.unique' => 'Tên bị trùng, vui lòng chọn tên khác.'
            ]
        );

        $user = new Groups();
        $user-> name = $request -> name;
        $user -> user_id = Auth::user() -> id;
        $user -> save();
        return redirect() -> route('admin.groups.index')-> with('msg', 'Thêm nhóm người dùng thành công');
    }

    public function edit(Groups $group){
        $this->authorize('update', $group);
        return view('admin.groups.edit', compact('group'));
    }

    public function postEdit(Groups $group, Request $request){
        $this->authorize('update', $group);
        $request -> validate(
            [
                'name' => 'required|unique:groups,name,'.$group-> id,
            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.unique' => 'Tên bị trùng, vui lòng chọn tên khác.'
            ]
        );

        $group-> name = $request -> name;
        $group -> save();
        return back()-> with('msg', 'Cập nhật nhóm người dùng thành công');
    }

    public function delete(Groups $group){
        $this->authorize('delete', $group);
        $usersCount = $group-> user-> count();
        if($usersCount == 0){
            Groups::destroy($group -> id);
        return redirect() -> route('admin.groups.index')-> with('msg', 'Xoá nhóm người dùng thành công');
        }
        return redirect() -> route('admin.groups.index')-> with('msg', 'Trong nhóm vẫn còn '.$usersCount.' người dùng');

    }

    public function permission(Groups $group){
        $this->authorize('permission', $group);
        $modules = Modules::all();
        $roleListArr = [
            'view' => 'Xem',
            'add' => 'Thêm',
            'edit' => 'Sửa',
            'delete' => 'Xoá'
        ];
        $roleJson = $group->permissions;
        if(!empty($roleJson)){
            $roleArr = json_decode($roleJson, true);
        }
        else
        {
            $roleArr =[];
        }

        return view('admin.groups.permission', compact('group', 'modules', 'roleListArr','roleArr'));
    }
    public function postPermission(Groups $group, Request $request){
        $this->authorize('permission', $group);
        if(!empty($request -> role)){
            $roleArr = $request -> role;
        }else {
            $roleArr = [];
        }

        $roleJson = json_encode($roleArr);
        $group-> permissions = $roleJson;
        $group -> save();
        return back()->with('msg', 'Phân quyền thành công');
    }
}
