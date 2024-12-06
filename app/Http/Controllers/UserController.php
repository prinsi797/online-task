<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Log;
use PDF;

class UserController extends Controller
{

    private AdminRepository $_adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->_adminRepository = $adminRepository;
    }

    public function register (Request $request){
        return view('registration.create');
    }
    public function registerProcess(Request $request)
    {
        
        $admin = new User;
        
        if(isset($request->image)){
            $file_name = date("YmdHis").rand(100,900);
            $file = $request->image;
            $extension = $file->getClientOriginalName();
            $admin_image = $file_name.".".$extension;
            $destination_path = public_path() . "/user_image/";
            if(!is_dir($destination_path)){
                mkdir($destination_path, 0777, true);
            }
            if($file->move($destination_path, $admin_image)){
                $admin->image = $admin_image;
            }
           
        }

        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->phone = $request['phone'];
        $admin->country = $request['country'];
        $admin->state = $request['state'];
        $admin->city = $request['city'];
        $admin->password = hash('sha256', $request['password']);
        $admin->image= $admin_image;
        $admin->save();

        return redirect()->route('admin.list')->with("success", "Registartion Successfully");
    
    }

    public function adminList(Request $request)
{
    $data['title'] = "AdminList";
    return view('registration.index', compact('data'));
}

public function ajax(Request $request)
{
    $searchColumns = array(
        'users.id',
        'users.name',
        'users.email',
        'users.city',
        'users.state',
        'users.country',
        'users.phone',
        'users.image',
        'users.created_at',
        'users.updated_at',
    );

    $sortingColumns = array(
        0 => 'users.id',
        1 => 'users.name',
        2 => 'users.email',
        3 => 'users.city',
        4 => 'users.state',
        5 => 'users.country',
        6 => 'users.phone',
        7 => 'users.image',
        8 => 'users.created_at',
        9 => 'users.updated_at',
    );

    $selectColumns = array(
        'users.id',
        'users.name',
        'users.email',
        'users.city',
        'users.state',
        'users.country',
        'users.phone',
        'users.image',
        'users.created_at',
        'users.updated_at',
    );

    $query = User::query();
    $recordsTotal = $query->count();

    if ($request->filled('search.value')) {
        $searchValue = $request->input('search.value');
        $query->where(function ($query) use ($searchValue, $searchColumns) {
            foreach ($searchColumns as $column) {
                $query->orWhere($column, 'like', '%' . $searchValue . '%');
            }
        });
    }

    $recordsFiltered = $query->count();

    $query->select($selectColumns);
    $query->offset($request->input('start', 0));
    $query->limit($request->input('length', 10));
    $query->orderBy($sortingColumns[$request->input('order.0.column', 0)], $request->input('order.0.dir', 'asc'));

    $data = $query->get();

    $viewData = array();
    foreach ($data as $key => $value) {
        $viewData[$key] = array(
            'id' => $value->id,
            'name' => $value->name,
            'email' => $value->email,
            'city' => $value->city,
            'state' => $value->state,
            'country' => $value->country,
            'phone' => $value->phone,
            'image' => $value->image,
            'created_at' => $value->created_at,
            'updated_at' => $value->updated_at,
            'edit' => '<ul class="list-inline font-size-20 contact-links mb-0">
                            <li class="list-inline-item px-2">
                                <a href="edit-admin/' . $value->id . '" title="Edit" style="margin-right:10px;">
                                <i class="fas fa-edit"></i>
                                </a>
                            </li>
                        </ul>',
            'delete' => '<ul class="list-inline font-size-20 contact-links mb-0">
                            <li class="list-inline-item px-2">
                                <a href="delete-admin/' . $value->id . '" title="Delete" style="margin-right:10px;">
                                    <i class="fas fa-trash-alt"></i>
                                    </a>
                                </li>
                            </ul>',

            'view' => '<ul class="list-inline font-size-20 contact-links mb-0">
                            <li class="list-inline-item px-2">
                                <a href="admin/' . $value->id . '" title="View" style="margin-right:10px;">
                                <i class="fas fa-eye"></i>
                                    </a>
                            </li>
                        </ul>',
            );
        }
    
        $jsonData = array(
            'draw' => intval($request->input('draw', 1)),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $viewData,
        );
    
        return response()->json($jsonData);
    }
    
    public function editAdmin(Request $request, $id)
    {
        $user = User::where('id',$id)->get();
        return view('registration/update', ['user' => $user]);
    }

    public function updateAdmin(Request $request)
    {
        $id =isset($request->id)? $request->id :0;
        
        $user = User::find($id);
            if(isset($request->image)){

                $file_name = date("YmdHis").rand(100,900);
                $file = $request->image;
                $extension = $file->getClientOriginalName();
                $user_image = $file_name.".".$extension;
                $destination_path = public_path() . "/user_image/";
                if(!is_dir($destination_path)){
                    mkdir($destination_path, 0777, true);
                }
                if($file->move($destination_path, $user_image)){
                    $user->image = $user_image;
                }
               
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country =$request->country;
            $user->phone = $request->phone;
            $user->save();

            return redirect('admin-list')->with('success','User Updated Successfully.');

    }

    public function adminDelete(Request $request,$id)
    {
        $user = User::find($id);
        $user->delete();
       
        return redirect('admin-list')->with('success','User Updated Successfully.');
    }

    public function login(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.login');
    }

    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function generatePDF($id)
    {
        $user = User::findOrFail($id);
        $pdf = PDF::loadView('registration.pdf', compact('user'));
        return $pdf->download('registration.pdf');
    }
}
