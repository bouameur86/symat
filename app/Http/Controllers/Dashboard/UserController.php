<?php
namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
use App\Structure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

    }//end of constructor

    public function index(Request $request)
    {

        $users = User::whereRoleIs('admin')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);

        return view('dashboard.users.index', compact('users'));

    }//end of index

    public function create()
    {
        $regions = Region::all();
        $structures = Structure::all();
        return view('dashboard.users.create' , compact('regions' , 'structures' ));

    }//end of create

    public
    function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'fonction' => 'required',
            'region' => 'required',
            'structure' => 'required',
            'email' => 'required|unique:users',
            'image' => 'image',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1'
      ]);

        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        $user = User::create($request_data);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->fonction= $request->fonction;
        $user->region_id = $request->region; 
        $user->structure_id = $request->structure; 
        $user->email = $request->email; 
        
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        $user->save();
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.users.index', $user);

    }//end of store

    public function edit(User $user)
    {
        $regions = Region::all();
        $structures = Structure::all();
        return view('dashboard.users.edit', compact('user' , 'regions', 'structures'));

    }//end of user

    public
    function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'fonction' => 'required',         
            'region_id' => 'required',
            'structure_id' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            'password' => 'required|confirmed',
            'image' => 'image',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->except([ 'password', 'password_confirmation','permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);

        if ($request->image) {
           if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

            }//end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of external if

        $user->update($request_data);

        $user->syncPermissions($request->permissions);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of update

    public
    function destroy(User $user)
    {
        if ($user->image != 'default.png') {

            Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

        }//end of if

        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of destroy

}//end of controller
