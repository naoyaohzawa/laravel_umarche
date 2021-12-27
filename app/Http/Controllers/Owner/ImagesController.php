<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Validator; //この行を上に追加
use Auth; //追加
use Illuminate\Support\Str; //画像ファイル名（追加）

class ImagesController extends Controller
{

    // ログイン認証処理ミドルウェア
    public function __construct()
    {
        $this->middleware('auth:owners');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $file = $request->file('img');
        $voyage_id = $request->voyage_id;

        $validator = $request->validate( [
            'img' => 'required|file|image|max:2048', 
        ]);


        if ( !empty($file) ) {
    
            // ファイルの拡張子取得
            $ext = $file->guessExtension();
    
            //ファイル名を生成
            $fileName = Str::random(32).'.'.$ext;
            // dd($fileName);
    
            $images = new Image;
            // 画像のファイル名を任意のDBに保存
            $images->voyage_id = $voyage_id;
            $images->owner_id = Auth::id();//ここでログインしているユーザidを登録しています
            $images->img_url = $fileName;
            $images->save();
    
            //public/uploadフォルダを作成
            $target_path = public_path('/uploads/');
    
            //ファイルをpublic/uploadフォルダに移動
            // Image::make($file)->resize(300, 300);

            // InterventionImage::make($file)
            // ->resize(300, 300, function ($constraint) {
            //     $constraint->aspectRatio();
            // })
            // ->save($file);

            $file->move($target_path,$fileName);
    
        }else{
    
            return redirect()->route('owner.voyages.show', [ $voyage_id]);
        }

        //
        return redirect()->route('owner.voyages.show', [ $voyage_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
