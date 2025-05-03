<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Enums\Status;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\CustomeClasses\OwnClasses;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;


class UserController extends Controller
{
    public function index(Request $request)
    {
            $filters = $request->only(['created_at', 'name', 'status','ordering','phone']);
            $sortOrder = $request->ordering ?? 'desc';
            $status = Status::cases();
            $users = User::filter($filters,'id', $sortOrder)
                    ->paginate(self::WEB_PAGINATOR_NUMBER)->withQueryString();
         return $request->ajax()
                    ? view('backend.pages.users.filter', compact('users','status'))
                    : view('backend.pages.users.index', compact('users','status'));
    }

    public function create()
    {
        $status = Status::cases();
        return view('backend.pages.users.create',compact('status'));
    }

    public function store(UserStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $photo = $request->hasFile('image')
                    ? $this->UploadImage($request, 'image', 'uploads/users')
                    : 'dummy/user/user.png';

            $user = User::create([
                'full_name' => $request->full_name,
                'slug' => Str::slug($request->full_name),
                'user_name' => $request->user_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make($request->password),
                'created_by' => Auth::user()->id,
                'photo' => $photo,
            ]);
            DB::commit();
            return redirect()->route('users.index')->with('message', 'User Create SuccessFully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('error',self::DEFAULT_ERROR_MESSAGE); 
        }
       
    }


    public function edit(User $user)
    {
        $status = Status::cases();
        return view('backend.pages.users.edit', compact('user','status'));
    }

    public function view(User $user)
    {
        $status = Status::cases();
        return view('backend.pages.users.view', compact('user','status','roles'));
    }

    public function update(User $user, UserUpdateRequest $request)
    {
       
        try {
            DB::beginTransaction();

            if (!$request->hasFile('image')) {
                $photo = $user->photo;
            }else{
                $this->deleteExistingImage($user->photo);
                $photo = $this->uploadImage($request, 'image', 'uploads/users');
            }

            $user->update([
                'full_name' => $request->full_name,
                'slug' => Str::slug($request->full_name),
                'user_name' => $request->user_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => $request->status,
                'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
                'updated_by' => Auth::user()->id,
                'photo' => $photo,
            ]);
            DB::commit();
            return redirect()->route('users.index')->with('message', 'User Update SuccessFully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('error',self::DEFAULT_ERROR_MESSAGE); 
        }
       
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
    
        if ($user->photo) {
           if(!$user->photo == 'dummy/user/user.png')
           {
            $this->deleteExistingImage($user->photo);
           }
        }
        $data = $user->delete();
        return response()->json([
            'data'=>$data,
            'success' => 'User deleted successfully!'
        ]);

    }
}
