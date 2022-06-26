<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Article_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
   
    public function index()
    {
        $article = Article::all();

        return view('admin.article.index',[
            'articles' => $article
        ]);
    }

    
    public function create()
    {
        return view('admin.article.create');
    }

    
    public function store(ArticleRequest $request)
    {
        $data = $request->all();        
        
        $thumbnail = $request->file('thumbnail_photo');
        if ($thumbnail) {
            $filename = $thumbnail->getClientOriginalName();            
            $time = time();
            $newName = $time.$filename;            
            $path = Storage::putFileAs('photo_article',$thumbnail,$newName);
            $data['thumbnail_photo'] = $path;
        }

        $article = Article::create($data);
        $fotoArticle = $request->file('foto_article');

        if ($fotoArticle) {
            foreach ($fotoArticle as $foto ) {

                $dataFoto =$foto->getClientOriginalName();            
                $waktu = time();
                $name = $waktu.$dataFoto;            

                $nameFile = Storage::putFileAs('photo_article',$foto,$name);

                $photoArticle = array(
                    'article_id' => $article->id,
                    'photo_article' => $nameFile
                );

                Article_Photo::create($photoArticle);
            }
        }

        return redirect()->route('article.index');  
    }

   
    public function show($id)
    {
        $article = Article::where('id',$id)->with('articlePhoto')->first();

        return view('admin.article.show',[
            'article' => $article
        ]);

    }

    
    public function edit($id)
    {
        $article = Article::where('id',$id)->with('articlePhoto')->first();

        return view('admin.article.edit',[
            'article' => $article
        ]);
        
    }

    
    public function update(ArticleRequest $request, $id)
    {
        $data = $request->all();
        $photo = $request->file('thumbnail_photo');
        $article = Article::findOrFail($id);

        if ($photo) {
            Storage::disk('public')->delete($article->thumbnail_photo);                

            $filename = $photo->getClientOriginalName();            
            $time = time();
            $newName = $time.$filename;            
            $path = Storage::putFileAs('photo_product',$photo,$newName);
            $data['thumbnail_photo'] = $path;            
        }

        $article->update($data);

        return back();
    }

   
    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);
            $listPhoto = Article_Photo::where('article_id',$article->id)->pluck('photo_article');
            
            foreach ($listPhoto as $photo) {
                Storage::disk('public')->delete($photo);                
            }
                        
            Storage::disk('public')->delete($article->thumbnail_photo);        
            
    
            $article->articlePhoto()->delete();
            $article->delete();

            return back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }      
    }

    public function uploadFotoArticle(Request $request , $id)
    {
        $data = $request->file('foto_article');
        
        foreach ($data as $foto) {
            $dataFoto =$foto->getClientOriginalName();            
            $waktu = time();
            $name = $waktu.$dataFoto;            
            $nameFile = Storage::putFileAs('photo_product',$foto,$name);

            $photoArticle = array(
                'article_id' => $id,
                'photo_article' => $nameFile
            );

            Article_Photo::create($photoArticle);
        }

        return back();
        
    }

    public function deleteFotoArticle($id)
    {
        $foto = Article_Photo::findOrFail($id); 

        if ($foto) {
            Storage::disk('public')->delete($foto->photo_article);        
        }
        
        $foto->delete();

        return back();

    }
}
