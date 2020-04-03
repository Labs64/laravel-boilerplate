<?php

namespace App\Http\Controllers\Admin;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Repositories\Access\Package\EloquentPackageRepository;
use Validator;
use Carbon\Carbon as Carbon;
class ManagePackageController extends Controller
{
    //
    
   protected $repository;

   /**
    * Construct
    
    * 
    */
   public function __construct()
   {
       $this->repository = new EloquentPackageRepository;
   }

    public function index(Request $request)
    {
        // dd('hello');
       // $package = Package::select('name','type','description','category_id','price','active')->get();
     //dd($query);
     return view('admin.package.index', ['packages' => Package::sortable(['type' => 'asc'])->groupBy('name')->paginate(10)]);
        // $package = Package::paginate(15);
     
        // return view('admin.package.index', compact('package'));
    }

    public function getPackage($type)
    {
        //
        // dd('asdasf');
        $query = Package::where('type', $type)->get();
        return response()->json($query);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.package.create');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'type' => 'required|max:255',
            'name' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'sometimes',
            'price' => 'required',
            'min_person' => 'required'
        ]);

        if($request->get('active'))
            $status=true;
        
        else 
            $status=false;

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());
        
            $package = new Package();
            $package->name = strtoupper($request->get('name'));
            $package->type =  strtoupper($request->get('type'));
            $package->active = $status;
            $package->category_id = $request->get('category_id');
            $package->description = $request->get('description');
            $package->price = $request->get('price');
            $package -> min_person = $request->get('min_person');
            $package -> created_at = Carbon::now();
            $package -> updated_at = Carbon::now();
            $package->save();

        
          return redirect()->route('admin.packages.index')->withFlashSuccess('Package Created Successfully!'); 

      
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
        return view('admin.package.show', ['package' => $package]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('admin.package.edit', ['package' => $package]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
        $validator = Validator::make($request->all(), [
            'type' => 'required|max:255',
            'name' => 'required|max:255',
            'active' => 'required|boolean',
            'category_id' => 'required',
            'description' => 'sometimes',
            'price' => 'required',
            'min_person' => 'required'
        ]);

        

        $package->name = strtoupper($request->get('name'));
        $package->type =  strtoupper($request->get('type'));
        $package->active =  $request->get('active');
        $package->category_id = $request->get('category_id');
        $package->description = $request->get('description');
        $package->price = $request->get('price');
        $package -> min_person = $request->get('min_person');
        $package -> updated_at = Carbon::now();
        $package->save();
        return redirect()->intended(route('admin.packages.show',['package' => $package]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroyPackage($id)
    {
        //
        $status = $this->repository->destroy($id);

        if($status)
        {
            return redirect()->route('admin.packages.index')->withFlashSuccess('Package Deleted Successfully!');
        }

        return redirect()->route('admin.packages.index')->withFlashDanger('Unable to Delete Package!');
    }
    //
}
