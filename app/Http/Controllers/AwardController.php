<?php

namespace App\Http\Controllers;

use App\Http\Requests\AwardRequest;
use App\Models\Award;
use App\Models\AwardPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
   
    public function index()
    {
        $award = Award::all();
        return view('admin.award.index',[
            'award' => $award
        ]);
    }

  
    public function create()
    {
        return view('admin.award.create');
    }

   
    public function store(AwardRequest $request)
    {
        $data = $request->all();
        
        $thumbnail = $request->file('thumbnail_photo');
        if ($thumbnail) {
            $filename = $thumbnail->getClientOriginalName();            
            $time = time();
            $newName = $time.$filename;            
            $path = Storage::putFileAs('photo_award',$thumbnail,$newName);
            $data['thumbnail_photo'] = $path;
        }

        $award = Award::create($data);
        $fotoAward = $request->file('foto_award');

        if ($fotoAward) {
            foreach ($fotoAward as $foto ) {

                $dataFoto =$foto->getClientOriginalName();            
                $waktu = time();
                $name = $waktu.$dataFoto;            

                $nameFile = Storage::putFileAs('photo_award',$foto,$name);

                $photoAward = array(
                    'award_id' => $award->id,
                    'photo_award' => $nameFile
                );

                AwardPhoto::create($photoAward);
            }
        }

        return redirect()->route('award.index');  
    }

   
    public function show($id)
    {
        $award = Award::where('id',$id)->with('awardPhoto')->first();

        return view('admin.award.show',[
            'award' => $award
        ]);

    }

   
    public function edit($id)
    {
        $award = Award::where('id',$id)->with('awardPhoto')->first();

        return view('admin.award.edit',[
            'award' => $award
        ]);
    }

   
    public function update(AwardRequest $request, $id)
    {
        $data = $request->all();
        $photo = $request->file('thumbnail_photo');
        $award = Award::findOrFail($id);

        if ($photo) {
            Storage::disk('public')->delete($award->thumbnail_photo);                

            $filename = $photo->getClientOriginalName();            
            $time = time();
            $newName = $time.$filename;            
            $path = Storage::putFileAs('photo_product',$photo,$newName);
            $data['thumbnail_photo'] = $path;            

        }

        $award->update($data);

        return back();
    }

    public function destroy($id)
    {
        try {
            $award = Award::findOrFail($id);
            $listPhoto = AwardPhoto::where('award_id',$award->id)->pluck('photo_award');
            
            foreach ($listPhoto as $photo) {
                Storage::disk('public')->delete($photo);                
            }
                        
            Storage::disk('public')->delete($award->thumbnail_photo);        
            
    
            $award->awardPhoto()->delete();
            $award->delete();

            return back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }       
    }

    public function uploadFotoAward(Request $request , $id)
    {
        $data = $request->file('foto_award');
        
        foreach ($data as $foto) {
            $dataFoto =$foto->getClientOriginalName();            
            $waktu = time();
            $name = $waktu.$dataFoto;            
            $nameFile = Storage::putFileAs('photo_awardt',$foto,$name);

            $photoAward = array(
                'award_id' => $id,
                'photo_award' => $nameFile
            );

            AwardPhoto::create($photoAward);
        }

        return back();
        
    }

    public function deleteFotoAward($id)
    {
        $foto = AwardPhoto::findOrFail($id); 
        if ($foto) {
            Storage::disk('public')->delete($foto->photo_award);        
        }
        $foto->delete();

        return back();

    }
}
