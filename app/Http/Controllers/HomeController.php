<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TabelKebenarans;
use App\Preposisi;
use App\Histories;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.home');
    }

    public function user(){
        $data['metatitle'] = "User Management";
        $data['users'] = user::get();
        return view('dashboard.users', $data);
        
    }

    public function userAdd(){
        $data['metatitle'] = "User Management";
        return view('dashboard.user-add', $data);        
    }

    public function getThumb($img){
        $explode = explode('/', $img);
        if(is_array($explode)){   
            $m = $explode[count($explode)-1];
        }
        $sisa = str_replace($m, '', $img);
        return $sisa.'thumbs/'.$m;
    }

    public function userStore(Request $request){
        $new = new User;
        $new->name = $request->first_name;
        $new->full_name = $request->first_name.' '.$request->last_name;
        $new->email = $request->email;
        $new->nim = ( !empty($request->nim) ) ? $request->nim : 'A11.2017.00000';
        if( !empty($request->image_profile) ){
            $new->images = $request->image_profile;
            $new->thumbs = $this->getThumb($request->image_profile);
        }else{
            $new->images = url('/assets/images/not-available.png');
            $new->thumbs = url('/assets/images/not-available.png');
        }

        if($request->password == $request->confirm_password){
            $new->password = bcrypt($request->password);
            
        }
        $new->save();
        return redirect('/dashboard/users');
        
    }

    public function userEdit($id){
        $data['metatitle'] = "User Management";
        $data['user'] = User::where('id',$id)->first();
        return view('dashboard.user-edit', $data);
    }

    public function userUpdate(Request $request, $id){
        $user = User::find($id);
        if( isset($request->first_name) && !empty($request->first_name) ){
            $user->name = $request->first_name;
            $last = str_replace($request->first_name, '', $user->full_name);

            if( isset($request->last_name) && !empty($request->last_name) ){
                $user->full_name = $request->first_name.' '.$request->last_name;
            }else{
                $user->full_name = $request->first_name.''.$last;
            }
        }else{

            if( isset($request->last_name) && !empty($request->last_name) ){
                $user->full_name = $user->name.' '.$request->last_name;
            }
        }


        if( isset($request->nim) && !empty($request->nim) ){
            $user->nim = $request->nim;
        }

        if( isset($request->gender) && !empty($request->gender) ){
            $user->gender = $request->gender;
        }

        if( isset($request->email) && !empty($request->email) ){
            $user->email = $request->email;

        }

        if( isset($request->password) && !empty($request->password) && isset($request->confirm_password) && !empty($request->confirm_password) ){
            if($request->password == $request->confirm_password){
                $user->password = bcrypt($request->password);
            }
        }

        if( isset($request->image_profile) && !empty($request->image_profile) ){
            $user->images = $request->image_profile;
            $user->thumbs = $this->getThumb($request->image_profile);
        }
        $user->save();
        return redirect('/dashboard/users');

        
    }

    public function userDelete($id){
        if(Auth::user()->id != $id){
            $user = User::where('id', $id)->delete();
        }
        return back();
        
    }

    public function appModulo(){

        $data['metatitle'] = "Aplikasi - Modulo";
        $data['user'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.modulo', $data);
    
    }

    public function appModuloStore(request $request){

        $data['metatitle'] = "Aplikasi - Modulo";
        $data['user'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.modulo', $data);
    
    }

    public function appTable(Request $request){
        if(isset($request->his) && !empty($request->his)){

            $history = Histories::find($request->his);
            if(count($history) == 0){
                return redirect('/dashboard/app/table-kebenaran');
                return abort('404');
            }
            $app = Preposisi::find($history->app_id);
            $lists = json_decode($app->jawaban, true);

            foreach ($lists as $rp) {
                if(isset($rp[0]) && !empty($rp[0])){
                    $data['list'][] = [$rp[0], $this->replaceTxt($rp[1])];
                }
            }

            $data['soal'] = $this->replaceTxt($app->soal);
        }
        $data['metatitle'] = "Aplikasi - Logika Proposisi";
        $data['user'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.table-kebenaran ', $data);
    
    }

    function minimizeText($text, $table, $list){
        if(empty($list)){
            $list = []; 
        }

        foreach ($table as $tab) {
            $count = 0;
            $text = str_replace($tab->variable_1, $tab->variable_2, $text, $count);
            if($count > 0){
                $list[] = [$tab->nama_hukum, $text];
                return $this->minimizeText($text, $table, $list);
            }
        }
        return $list;

    }
    function replaceTxt($text){

        $text = str_replace('{', '', $text);
        $text = str_replace('}', '', $text);
        $text = str_replace('-', '¬', $text);
        $text = str_replace('^', '∧', $text);
        $text = str_replace('V', '∨', $text);
        return $text;
    }

    public function appTableStore(request $request){
        $text = $request->fullscript;
        $table = TabelKebenarans::where('status',1)->get();        
        $lists = $this->minimizeText($text, $table, []);

        $new = new Preposisi;
        $new->soal = $text;
        $new->jawaban = json_encode($lists);
        $new->user_id = Auth::user()->id;
        $new->save();

        $his = new Histories;
        $his->type_apps = 'preposisi';
        $his->app_id = $new->id;
        $his->user_id = Auth::user()->id;
        $his->save();

        return redirect('/dashboard/app/table-kebenaran?his='.$his->id);
    
    }

    public function contact(){
        $data['metatitle'] = "Personal Information";
        $data['user'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.contact', $data);
    }


    public function history(){
        $data['histories'] = Histories::with('user')->paginate(10);
        $data['metatitle'] = "History";
        $data['user'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.history', $data);
    }

    public function historyView($id){
        $data['metatitle'] = "History";
        $data['user'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.history', $data);
    }

    public function historyDelete($id){
        $data['metatitle'] = "History";
        $data['user'] = User::where('id',Auth::user()->id)->first();
        return view('dashboard.history', $data);
    }

}
