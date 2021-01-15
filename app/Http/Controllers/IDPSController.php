<?php

namespace App\Http\Controllers;
use App\Models\idp;
use App\Models\idpspouse;
use App\Models\idpkids;
use App\Models\idphotos;
use DB;
use Illuminate\Http\Request;

class IDPSController extends Controller
{
      public function index()
    {
        $idps = idp::paginate(10);
  
        return view('idps.index',compact('idps'));

    }

    public function edit($id)
    {
        $main_id=$id;

         $idphotos= idphotos::where('main_id', 'LIKE','%'.$main_id.'%')->value('photo');
         $idpkids=idpkids::where('main_id', 'LIKE','%'.$main_id.'%')->get();
         $idpspouse=idpspouse::where('main_id', 'LIKE','%'.$main_id.'%')->get();
         $idp = idp::where('main_id', 'LIKE','%'.$main_id.'%')->get();
       


        return view('idps.edit', compact('idp','idphotos','idpkids','idpspouse'));

    }
        
    public function delete($id)  
    {       
           DB::DELETE('delete from idps where main_id = ?',[$id]);
           DB::DELETE('delete from idpspouses where main_id = ?',[$id]);
           DB::DELETE('delete from idpkids where main_id = ?',[$id]);
            return redirect()->route('idps.index')->with('success','Data Successfully Deleted!');
    }
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepOne(Request $request)
    {
        $idps = $request->session()->get('idps');
  
        return view('idps.create-step-one',compact('idps'));
    }
  
    /**  
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
        	'main_id' => 'required',
            'household_name' => 'required|unique:idps',
            'location' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'village' => 'required',
            
        ]);
  
        if(empty($request->session()->get('idps'))){
            $idp = new idp();
            $idp->fill($validatedData);
            $request->session()->put('idp', $idp);
        }else{
            $idp = $request->session()->get('idp');
            $idp->fill($validatedData);
            $request->session()->put('idp', $idp);
        }
  
        return redirect()->route('idps.create.step.two') ->with('success','1/6 Completed!');;
    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $idp = $request->session()->get('idp');
  
        return view('idps.create-step-two',compact('idp'));
    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'education' => 'required',
            'occupation' => 'required',
            'preferred_skill' => 'required',
            'cause' => 'required',
            'disability' => 'required',
            'status' => 'required',
            'telly' => 'required',
            'email' => '',



        ]);
  
        $idp = $request->session()->get('idp');
        $idp->fill($validatedData);
        $request->session()->put('idp', $idp);
  
        return redirect()->route('idps.create.step.three') ->with('success','2/6 Completed!');
    }
  
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepThree(Request $request)
    {
        $idp = $request->session()->get('idp');
  
        return view('idps.create-step-three',compact('idp'));
    }

    public function postCreateStepThree(Request $request)
    {
        $request->validate([
           'moreFields.*.main_id' => 'required',	
           'moreFields.*.household_name' => '',
           'moreFields.*.spouse_name' => '',
           'moreFields.*.dob' => '',
           'moreFields.*.gender' => '',
           'moreFields.*.disability' => '',
           'moreFields.*.education' => '',
           'moreFields.*.occupation' => '',
           'moreFields.*.preferred_skill' => '',
           'moreFields.*.telly' => ''
           
        ]);
  
        
         foreach ($request->moreFields as $key => $value) {
            idpspouse::create($value);
        }

     return redirect()->route('idps.create.step.four')->with('success', '3/6 Completed!');
    }

    
  
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */

    public function createStepFour(Request $request)
    {
        $idp = $request->session()->get('idp');
  
        return view('idps.create-step-four',compact('idp'));
    }
    public function postCreateStepFour(Request $request)
    {
        $request->validate([
           'moreFields.*.main_id' => 'required',
           'moreFields.*.household_name' => '',
           'moreFields.*.child_name' => '',
           'moreFields.*.dob' => '',
           'moreFields.*.gender' => '',
           'moreFields.*.disability' => '',
           'moreFields.*.education' => '',
           'moreFields.*.occupation' => '',
           'moreFields.*.preferred_skill' => '',
           
        ]);
  
        
         foreach ($request->moreFields as $key => $value) {
            idpkids::create($value);
        }

     return redirect()->route('idps.create.step.five')->with('success', '4/6 Completed!');
    }

     public function createStepFive(Request $request)
    {
        $idp = $request->session()->get('idp');
  
        return view('idps.create-step-five',compact('idp'));
    }

       public function imageUploadPost(Request $request)
    {
           $this->validate($request, [
            'main_id' => 'required',
            'household_name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

           $idphotos = new idphotos($request->input()) ;

       if($file = $request->hasFile('photo')) {
            
            $file = $request->file('photo') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $idphotos->photo = $fileName ;
        }
        $idphotos->save() ;
         return redirect()->route('idps.create.step.six')
                        ->with('success','5/6 Completed!');
   
    }


      public function createStepSix(Request $request)
    {
        $idp = $request->session()->get('idp');
        $main_id=($idp->main_id);
        $idphotos= idphotos::where('main_id', 'LIKE','%'.$main_id.'%')->value('photo');
      
        
        $years = \Carbon\Carbon::parse($idp->dob)->age;

        $idpspouse= idpspouse::where('main_id', 'LIKE','%'.$main_id.'%')->count('*');
         $idpkids= idpkids::where('main_id', 'LIKE','%'.$main_id.'%')->count('*');
        return view('idps.create-step-six',compact('idp'))->with('years',$years)->with('idphotos',$idphotos)->with('idpspouse',$idpspouse)->with('idpkids',$idpkids);
    }
    public function postCreateStepSix(Request $request)
    {
        $idp = $request->session()->get('idp');
        $idp->save();
  
        $request->session()->forget('idp');
  
        return redirect()->route('idps.index')->with('success', '6/6 Completed');;
    }

   
}
