<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin;
use App\models\ThongTinCaNhan;
use App\models\noi_dung;
use App\models\tags;
use App\models\tagnews;
use App\models\admin_news2;
use App\models\category;
use App\models\contact;
use App\models\comment;
use App\models\videos;
use App\models\comment_news;
use App\models\comment_reply;
use App\models\category_news;
use App\models\evaluate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidatesRequests;
use App\Http\Controllers\service\checkService;
use Carbon\Carbon;
use Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Hash;
use Session;
use App\ImageUpload;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\MimeType\ExtensionGuesser;
use App\ImageModel;
class mycontroller extends Controller
{

        protected $checkService;
        protected $trieu = 'abcxyz';



        public function __construct(checkService $doiTuongCheckSv)
        { 
            $this->checkService = $doiTuongCheckSv;
        }

    public function login () {
        if(Auth::guard('admin_news2')->check()){
            return redirect()->route('admin');
        }
        $title = "Đăng nhập";
        return view('admin.login',compact('title'));
    } 
     public function loginAction(Request $request)
    {

        $username = $request['userName'];
        $password = $request['password'];
        if(Auth::guard('admin_news2')->attempt(['username'=>$username,'password'=>$password]))
            return "true";
        else
            return "false";
    } 
    public function homenews(){
        $noi_dung = noi_dung::skip(0)->take(2)->orderBy('date', 'desc')->get();
        $contentHightView = noi_dung::skip(0)->take(5)->orderBy('viewNumber','desc')->get(); 
        $category = category_news::all();
        $categoryName = category::all();
        $popular = tags::orderBy('viewNumber','desc')->skip(0)->take(10)->pluck('tagsName');
        $noi_dung2 = noi_dung::skip(12)->take(3)->get();
        $the_thao = category_news::where('id_cate',1)->skip(0)->take(3)->pluck('id_news');
        $the_thao = noi_dung::whereIn('id',$the_thao)->orderBy('date','desc')->get();
        $news = noi_dung::skip(2)->take(1)->get();
        $news = $news[0];
        $news2 = noi_dung::skip(5)->take(2)->get();
        $news3 = noi_dung::skip(8)->take(2)->get();
        $news5 = noi_dung::skip(11)->take(2)->get();
        $giai_tri = category_news::where('id_cate',1)->skip(0)->take(4)->pluck('id_news');
        $giai_tri = noi_dung::whereIn('id',$giai_tri)->orderBy('date','desc')->get();
        foreach ($categoryName as $key => $value) {
            $nameCategory = $value->name;
            $total_news = category_news::where('id_cate',$value->id)->get();
            $total_news= count($total_news);
            $list[] = [
                'name' => $nameCategory,
                'total_news' => $total_news
            ];
        }
        return view('index', compact('news','news2','news3','news5','noi_dung','noi_dung2','category','categoryName','contentHightView','the_thao','giai_tri','list','popular'));
    }
    public function form_insert(){
        $category = category::all();
        $image = noi_dung::all();
        return view('form_insert',compact('category','image'));
    }
    public function acction_insert(Request $request){
        if ( $request->viewStatus == null ) {
            $viewStatus = 'Yes';
        }else{
            $viewStatus = $request->viewStatus;
        }
            $str = $this->checkService->getSlug($request->tieu_de);
            dd($str);
        $idnews = DB::table('noi_dung')->insertGetId(
            [
                'id_creator' => $request->id_creator,
                'slug'=>$str,
                'tieu_de' => $request->tieu_de,
                'noi_dung_tin' => $request->noi_dung_tin,
                'image' => $request->image,
                'noi_dung_tom_tat' => $request->noi_dung_tom_tat,
                'viewNumber' => $request->viewNumber,
                'viewStatus' => $viewStatus,
            ]
            );
        foreach ($request->the_loai as $key => $value) {
            DB::table('category_news')->insert([
                'id_news' => $idnews,
                'id_cate' => $value,
            ]);
            $tags = $request->tagsInput;
            $tags = explode( ',', $tags );
        }
        foreach ($tags as $key => $value) {
            $checkTags = tags::where('tagsName',$value)->get();
            if (count($checkTags) == 0 || count($checkTags) == null) {
                $str = $this->checkService->getSlug($value);
                $idTags = DB::table('tags')->insertGetId([
                'slug' => $str,
                'tagsName' => $value,
                'viewNumber'=> 0,
                ]);
                DB::table('tagnews')->insert([
                    'idNews'=> $idnews,
                    'idTags'=> $idTags
                ]);
                }
            if (count($checkTags) > 0) {
                $checkTags = tags::where('tagsName',$value)->pluck('id');
                DB::table('tagnews')->insert([
                    'idNews'=> $idnews,
                    'idTags'=> $checkTags[0]
                ]);
            }
            
        }
        $category = category::all();
        return view('form_insert',compact('category'));

    }
    public function detailListNews(Request $request){
        $slugArr = explode('-', $request->slug);
        $id = (int)$slugArr[count($slugArr) - 1];

        $news_id = category_news::where('id_cate',$id)->pluck('id_news');
        $idMax = category::orderBy('id', 'desc')->skip(0)->take(1)->pluck('id');
        // trường hợp 1: từ thể loại bình thường
        if ($id <= $idMax[0] - 2) {
            $news_id1 = category_news::where('id_cate',$id + 1)->skip(0)->take(5)->pluck('id_news');
            $news_id2 = category_news::where('id_cate',$id + 2)->skip(0)->take(5)->pluck('id_news');
            $nameCategoryOffer1 = category::where('id',$id+1)->pluck('name');
            $nameCategoryOffer2 = category::where('id',$id+2)->pluck('name');
        }
       
        if ($id == $idMax[0] - 1 ) {
            $news_id1 = category_news::where('id_cate',$id + 1)->skip(0)->take(5)->pluck('id_news');
            $news_id2 = category_news::where('id_cate',1)->skip(0)->take(5)->pluck('id_news');
            $nameCategoryOffer1 = category::where('id',$id+1)->pluck('name');
            $nameCategoryOffer2 = category::where('id',1)->pluck('name');
        }
        if ($id  == $idMax[0]) {
            $news_id1 = category_news::where('id_cate',1)->skip(0)->take(5)->pluck('id_news');
            $news_id2 = category_news::where('id_cate',2)->skip(0)->take(5)->pluck('id_news');
            $nameCategoryOffer1 = category::where('id',1)->pluck('name');
            $nameCategoryOffer2 = category::where('id',2)->pluck('name');
        }
        $nameCategory = category::where('id',$id)->pluck('name');
        $news = noi_dung::whereIn('id',$news_id)->orderBy('date', 'desc')->get();
        $contentOffer1 = noi_dung::whereIn('id',$news_id1)->orderBy('date', 'desc')->get();
        $contentOffer2 = noi_dung::whereIn('id',$news_id2)->orderBy('date', 'desc')->get();
        return view('detailListNews', compact('news','nameCategory','nameCategoryOffer1','nameCategoryOffer2','contentOffer1','contentOffer2'));
    }

    public function sign() {
        if(Auth::guard('admin_news2')->check()){
            return redirect()->route('admin');
        }
        $title = " Đăng ký";
        return view('admin.sign',compact('title'));
    }

    public function signAction(Request $request)
    {    
        $check = admin_news2::where('username',$request->userName)->get();
        if (count($check) !=  0 ) {
            return "false";
        }else{
            DB::table('admin_news2')->insert([
            [
                'username' => $request->userName, 
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'password' => bcrypt($request->password)
            ]
            ]);
            return "true";
        }
    }

    public function list_news (){
        $id_now1 = Auth::guard('admin_news2')->user()->id;
        $list_news = DB::table('noi_dung')->where('id_creator',$id_now1)->orderBy('date', 'desc')->get();
        $total_news = count($list_news);
        // sort($list_news1);

        return view('news_views.list_news',compact('total_news'));
    }
    public function showTags(Request $request){
        $idTags = tagnews::where('idNews',$request->id)->pluck('idTags');
        foreach ($idTags as $key => $value) {
            $tags = tags::where('id',$value)->pluck('tagsName');
            $tagsName[] = $tags[0];
        }
        return $tagsName;
    }
    public function get_edit(Request $request){
        $slugArr = explode('-', $request->slug);
        $id = (int)$slugArr[count($slugArr) - 1];
        $edit_news = noi_dung::find($id);
        $category = category::all();
        $category_news = category_news::where('id_news',$id)->pluck('id_cate');

        foreach ($category_news as $key => $value) {
            $cate[] = $value;
        }

        // lấy ra các thẻ tag của bài viết
        $idTags = tagnews::where('idNews',$id)->pluck('idTags');
        foreach ($idTags as $key => $value) {
            $tags = tags::where('id',$value)->pluck('tagsName');
            $tagsName[] = $tags[0];
        }
        $tagsName = join(",",$tagsName);
        if ($tagsName == "" || $tagsName == null) {
            $tagsName = "";
        }
        // dd($category_news);
        return view('news_views.edit_news',compact('cate','edit_news','category','tagsName'));
    }

    public function post_edit (Request $request,$id){
        $post_edit = noi_dung::find($id);
        $post_edit->tieu_de = $request->tieu_de;
        $post_edit->noi_dung_tin = $request->noi_dung_tin;
        $post_edit->image = $request->image;
        $post_edit->noi_dung_tom_tat = $request->noi_dung_tom_tat;
        $post_edit->save();
        // xóa thể loại cũ
        $delete_news_category = category_news::where('id_news',$id)->pluck('id');
        foreach ($delete_news_category as $key => $value) {
            $delete_news = category_news::find($value);
            $delete_news->delete();
        }
        // thêm thể loại mới
        foreach ($request->the_loai as $key => $value) {
            DB::table('category_news')->insert([
                'id_news' => $id,
                'id_cate' => $value
            ]);
                $tags = $request->tagsInput;
                $tags = explode( ',', $tags );
        }

        // xóa thẻ tag cũ
        $deleteTags = tagnews::where('idNews',$id)->pluck('id');
        foreach ($deleteTags as $key => $value) {
            $deleteTags = tagnews::find($value);
            $deleteTags->delete();
        }

        // thêm thẻ tag mới
        foreach ($tags as $key => $value) {
            $checkTags = tags::where('tagsName',$value)->get();
            if (count($checkTags) == 0 || count($checkTags) == null) {
                $str = $this->checkService->getSlug($value);
                $idTags = DB::table('tags')->insertGetId([
                // 'id_news' => $idnews,
                'tagsName' => $value,
                'slug'=> $str,
                ]);
                DB::table('tagnews')->insert([
                    'idNews'=> $id,
                    'idTags'=> $idTags,
                ]);
                }
            if (count($checkTags) > 0) {
                $checkTags = tags::where('tagsName',$value)->pluck('id');
                DB::table('tagnews')->insert([
                    'idNews'=> $id,
                    'idTags'=> $checkTags[0]
                ]);
            }
        }
        if ($request->viewStatus == null ) {
            $viewStatus = 'No';
        } else {
            $viewStatus = 'Yes';
        }
        
        DB::table('noi_dung')->where('id', $id)->update(array('viewStatus' => $viewStatus));
        return redirect()->route('list_news');
    }

    public function deleteNews (Request $request){
        // xóa nội dung bài viết
        $delete_news = noi_dung::find($request->id);
        if($delete_news == null){
            return redirect()->route('list_news');
        }
        $delete_news->delete();
        //xóa thể loại bài viết
        $deleteCategory = category_news::where('id_news',$request->id)->pluck('id');
        foreach ($deleteCategory as $key => $value) {
            $deleteCategory = category_news::find($value);
            $deleteCategory->delete();
        }
            // return redirect()->route('list_news');
        // xóa thẻ tag bài viết
        $deleteTags = tagnews::where('idNews',$request->id)->pluck('id');
        foreach ($deleteTags as $key => $value) {
            $deleteTags = tagnews::find($value);
            $deleteTags->delete();
        }
        return ('success');
    }

    // đăng xuất
    public function logout(){
        Auth::guard('admin_news2')->logout();
        return redirect()->route('homepage');
    }

    // detail news
    public function news_detail(Request $request){
        $slugArr = explode('-', $request->slug);
        $id = (int)$slugArr[count($slugArr) - 1];
        $news = noi_dung::find($id);
        // đề xuất bài viết
        $idtags = tagnews::where('idNews',$id)->pluck('idTags');
        $idNewsOffer = tagnews::whereIn('idTags',$idtags)->pluck('idNews')->toArray();
        $idNewsOffer =array_unique($idNewsOffer);
        $news_offer = noi_dung::whereIn('id',$idNewsOffer)->get();
        // thẻ tags của bài viết
        $idTags = tagnews::where('idNews',$id)->pluck('idTags');
        // dd($idTags);
        $tagnames = tags::whereIn('id',$idTags)->pluck('tagsName');
        return view('news_views.news_detail',compact('tagnames','news','news_offer'));
    }

    // validate
    public function postSearchNews(Request $request){
        $search = $request->search ?? '';
        // tìm và lấy ra id bài viết được tìm thấy trong thẻ tag
        $idTags = tags::where('tagsName','like', '%'.$search.'%')->pluck('id');
        $idnews = tagnews::whereIn('idTags',$idTags)->pluck('idNews')->toArray();
        $idnews = array_unique($idnews);
        // dd($idnews);
        $id_creator_input = Auth::guard('admin_news2')->user()->id;
        $list = DB::table('noi_dung')
            ->where('id_creator',$id_creator_input)
            ->where(function($query) use ($search){
                $query->where('tieu_de', 'like' ,'%'.$search.'%');
                $query->orwhere('id', 'like' ,'%'.$search.'%');
                $query->orwhere('noi_dung_tom_tat', 'like' ,'%'.$search.'%');
            })->pluck('id')->toArray();
        // dd($data);
        $idnews = array_merge($idnews, $list);
        $idnews = array_unique($idnews);
        $data = DB::table('noi_dung')->whereIn('id',$idnews)->skip($request->sk)->take($request->ta)->get();
        $total_news =  count($idnews);

        $dataId = $data->pluck('id');
        $totalNewsNow = count($data);
        // thêm chuỗi tags vào mảng  bằng ánh xạ "&"
        foreach ($data as $key => &$value) {
            $arrTag = tagnews::join('tags', 'tags.id','=','tagnews.idTags')->where('tagnews.idNews', $value->id)->pluck('tags.tagsName')->toArray();
            $value->tagdata = implode(', ', $arrTag);
        }
        $list = [
            'totalNewsNow' => $totalNewsNow,
            'data'=> $data,
            'total_news'=> $total_news,
        ];
        $list = json_encode($list); 
        return $list;
    }

    public function viewNumber(Request $request){
        //lượt xem của bài viết
        $views = noi_dung::where('id',$request->id)->pluck('viewNumber');
        $viewLate = $views[0] + 1 ;
        DB::table('noi_dung')
        ->where('id', $request->id)->update(array('viewNumber' => $viewLate));

        // lượt xem của thẻ tag
        $viewTags = tagnews::where('idNews',$request->id)->pluck('idTags');
        $viewTags = tags::whereIn('id',$viewTags)->get();
        foreach ($viewTags as $key => $value) {
            $view = tags::where('id',$value->id)->pluck('viewNumber');
            $viewLate = $view[0] + 1;
            tags::where('id',$value->id)->update(array('viewNumber'=>$viewLate));
        }
    }

    public function admin(){
        return view('partial.layOutAdmin');
    }

    public function listCategory() {
        $listCategory = category::all();
        $listCategory = json_encode($listCategory); 
        return $listCategory;
    }

    public function showCategory(Request $request){
        $nameCategory = category::where('id',$request->id)->pluck('name');
        $idCategory = category::where('id',$request->id)->pluck('id');
        $nameCategory = [
            'id' => $idCategory[0],
            'name'=> $nameCategory[0],
        ];
        // dd($nameCategory);
        $nameCategory = json_encode($nameCategory);
        return $nameCategory;
    }

    public function updateCategory(Request $request){
        category::where('id',$request->id)->update(array('name'=>$request->name));
        return "success";
    }

    public function deleteCategory($id){
        $deleteCategory = category::find($id);
        $deleteCategory->delete();

        $idNews = category_news::where('id_news',$id)->pluck('id');
        foreach ($idNews as $key => $value) {
            category_news::find($value)->delete();
        }
        return 'success';
    }

    public function addCategory(Request $request){
        $str = $this->checkService->getSlug($request->name);
        DB::table('category')->insert([
            'name' => $request->name,
            'slug' => $str
        ]);
        return 'success';
    }

    public function contactView(){
        $contact = DB::table('contact')->get();
        $contact = $contact[0];
        // dd($contact->name);
        return view('admin.contact',compact('contact'));
    }
    public function contactUpdate(Request $request){
        contact::where('id',1)->update(array(
        'name'=>$request->name,
        'phoneNumber'=>$request->phoneNumber,
        'address'=>$request->address,
        'gmail'=>$request->gmail,
        'facebook'=>$request->facebook,
        'twitter'=>$request->twitter
    ));
       return redirect()->route('contactView');
    }

    public function resetPassword(){
        return view('admin.resetPassword');
    }

    public function saveChangePassword(Request $request){
        $user = admin_news2::find(\Auth::guard('admin_news2')->user()->id);
        // $a = Hash::check($request->passWordOld, $user->password);
        if (Hash::check($request->passWordOld, $user->password) == false) {
            return "false";
        }
        $user->password = bcrypt($request->confirmPassword);
        $user->save();
        return "true";
    }

    // post commnet 
    public function postComment(Request $request){
        // dd($request->contentb);
        $idCreate = Auth::guard('admin_news2')->user()->id;
        // dd($request->contentb);
        $idComment = DB::table('comment')->insertGetId([
                'content' => $request->contentb,
                'idCreate' => $idCreate
        ]);

        $binh = new comment_news();
        $binh->idComment = $idComment;
        $binh->idNews = $request->id;
        $binh->save();
        // DB::table('comment_news')->insert([
        //         'idComment' => $idComment,
        //         'idNews' => $request->id
        // ]);
        return "true" ;
    }
    public function commentShow(Request $request) {
        Carbon::setLocale('vi');
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        if(Auth::guard('admin_news2')->check()) {
            $check = 1;
        }else{
            $check = 0;
        }
        $idComment = comment_news::where('idNews',$request->id)->get();
        $totalComment = count($idComment) ;
        $idComment = comment_news::where('idNews',$request->id)->skip($request->skip)->take($request->take)->get();
            foreach ($idComment as $key => $value) {
                $comment1 = comment::where('id',$value->idComment)->get();
                $idCommentReply = comment_reply::where('idReply',$value->idComment)->get();
                $totalReply = count($idCommentReply);
                if (count($idCommentReply) != 0 ) {
                    foreach ($idCommentReply as $key => $val) {
                        $contentReply = comment::where('id',$val->idComment)->get();
                        $nameCreate = admin_news2::where('id',$contentReply[0]->idCreate)->get();
                        $time1 = $contentReply[0]->created_at;
                        $time1 = $time1->diffForHumans($now);
                        $commentReply[] = [
                            'nameCreateReply' => $nameCreate[0]->firstName." ".$nameCreate[0]->lastName,
                            'contentReplly' => $contentReply[0]->content,
                            'time' => $time1,
                            'totalReply' => $totalReply
                        ];
                    }
                }
                $nameCreate = admin_news2::where('id',$comment1[0]->idCreate)->get();
                $time = $comment1[0]->created_at;
                $time =  $time->diffForHumans($now);
                if (empty($commentReply) == false) {
                    $comment[] = [
                        'content' => $comment1[0]->content,
                        'time' => $time,
                        'nameCreate' => $nameCreate[0]->firstName . " " . $nameCreate[0]->lastName,
                        'idComment' => $value->idComment,
                        'commentReply' => $commentReply,
                        'totalComment' => $totalComment,
                        'check' => $check
                    ];
                }else{
                    $comment[] = [
                        'content' => $comment1[0]->content,
                        'time' => $time,
                        'nameCreate' => $nameCreate[0]->firstName . " " . $nameCreate[0]->lastName,
                        'idComment' => $value->idComment,
                        'commentReply' => null,
                        'totalComment' => $totalComment,
                        'check' => $check
                    ];
                }
                $commentReply = null;
                // dd($comment);
            }
        $comment = json_encode($comment);
        return $comment;
    }

    public function postReplyComment(Request $request) {
        $idCreate = Auth::guard('admin_news2')->user()->id;
        $idComment = DB::table('comment')->insertGetId([
            'content'=>$request->contentb,
            'idCreate'=>$idCreate
        ]);
        DB::table('comment_reply')->insert([
            'idComment'=>$idComment,
            'idReply'=>$request->idReply
        ]);
    }
    public function showReplyComment(Request $request) {
        $idComment = comment_reply::where('idReply',$request->id)->get();
        foreach ($idComment as $key => $value) {
            $name = comment::join('admin_news2','idCreate.comment','=','id.admin_news2')->where('id.comment',$value->idComment)->pluck('content.comment','lastName.admin_news2');
        }
    }

    public function videos(){

        return view('videos.videos');
    }

    public function insertVideos() {
        return view('videos.insertVideos');
    }

    public function listVideos() {
        return view('admin.listVideos');
    }

    public function actionInsertVideos(Request $request) {

        if ($request->hasFile("upload_file")) {
            $file = $request->file("upload_file");
            $typeOfFile = $file->extension();
            if (strtolower($typeOfFile) == "gif" || strtolower($typeOfFile) == "jpg" || strtolower($typeOfFile) == "png" || strtolower($typeOfFile) == "jpeg") {
                $name = $file->getClientOriginalName();
                $name = explode( '.', $name);
                $date = Carbon::now()->timestamp;
                $name = str_random(8) . $date . "." . $typeOfFile;
                $urlImage = "/image/".$name;
                $file->move('image', $name );
                videos::insert([
                    'link' => $request->linkVideos,
                    'image' => $urlImage,
                    'category' => $request->categoryVideos,
                    'name' => $request->nameVideos,
                    'ortherName' => $request->ortherName
                ]);
            }
        }else{
            $a = "khong co file";
            dd($a);
        }
    }
    
    public function actionInsertVideosAjax(Request $request) {
        
        $image = $request->file('file');
        $typeOfFile = strtolower($image->extension());
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $urlImage = "/images/".$new_name;
        $image->move('images', $new_name);
        if( $typeOfFile == "gif" || $typeOfFile == "jpg" || $typeOfFile == "png" || $typeOfFile == "jpeg" ){
            videos::insert([
                'link' => $request->linkVideos,
                'image' => $urlImage,
                'imagename'=> $new_name,
                'category' => $request->categoryVideos,
                'name' => $request->nameVideos,
                'ortherName' => $request->ortherName
            ]);
        return response()->json([
            'message'   => 'true',
           ]);
        }else{
            return response()->json([
                'message'   => 'false',
               ]);
        }
    }

    public function updateVideos(Request $request) {
        $nameImage = videos::where('id',$request->idVideos)->pluck('imageName');
        if($request->file != null){
            unlink(public_path('images/'.$nameImage[0]));
        }
        $image = $request->file('file');
        $typeOfFile = strtolower($image->extension());
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $urlImage = "/images/".$new_name;
        $image->move('images', $new_name);
        if( $typeOfFile == "gif" || $typeOfFile == "jpg" || $typeOfFile == "png" || $typeOfFile == "jpeg" ){

            videos::insert([
                'link' => $request->linkVideos,
                'image' => $urlImage,
                'imagename'=> $new_name,
                'category' => $request->categoryVideos,
                'name' => $request->nameVideos,
                'ortherName' => $request->ortherName
            ]);
        return response()->json([
            'message'   => 'true',
           ]);
        }else{
            return response()->json([
                'message'   => 'false',
               ]);
        }   
    }

    public function showlistVideos(Request $request) {
            $videos = videos::all();
            $videos = json_encode($videos);
            // if(count($videos) == 0 ){
            //     return "false";
            // }else{
            //     $videos = json_encode($videos);
                return $videos;
            // }
    }

    public function editVideos($id) {
        $videos = videos::where('id',$id)->get();
        $videos = $videos[0];
        return view('videos.editVideos', compact('videos'));
    }

    public function deleteVideos(Request $request){
        $nameImage = videos::where('id',$request->id)->pluck('imageName');
        unlink(public_path('images/'.$nameImage[0]));
        $videos = videos::where('id',$request->id)->delete();
    }
}











