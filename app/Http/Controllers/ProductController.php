<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Product_Photo;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::all();

        return view('admin.product.index',[
            'products' => $product
        ]);

    }
    
    public function create()
    {
        $service = Service::where('is_active',true)->get();
        return view('admin.product.create',[
            'services' => $service
        ]);
    }
    
    public function store(ProductRequest $request)
    {
        $data = $request->all();                    
        $thumbnail = $request->file('thumbnail_photo');        

        if ($thumbnail) {
            $filename = $thumbnail->getClientOriginalName();            
            $time = time();
            $newName = $time.$filename;            
            $path = Storage::putFileAs('photo_product',$thumbnail,$newName);
            $data['thumbnail_photo'] = $path;            
        }        

        $product = Product::create($data);        

        if ($request->hasFile('foto_produk')) {
            
            $dataPhoto = $request->file('foto_produk');

            foreach ($dataPhoto as $foto) {

                $dataFoto =$foto->getClientOriginalName();            
                $waktu = time();
                $name = $waktu.$dataFoto;            

                $nameFile = Storage::putFileAs('photo_product',$foto,$name);

                $photoProduct = array(
                    'product_id' => $product->id,
                    'photo_product' => $nameFile
                );

                Product_Photo::create($photoProduct);
            }
        }        

        return redirect()->route('product.index');                

    }

    
    public function show($id)
    {
        $product = Product::where('id',$id)
                  ->with('productPhoto')
                  ->with('service')
                  ->first();

        return view('admin.product.show',[
            'product' => $product
        ]);
    }

    
    public function edit($id)
    {
        $service = Service::where('is_active',true)->get();

        $product = Product::where('id',$id)
                  ->with('productPhoto')
                  ->with('service')
                  ->first();
        
        return view('admin.product.edit',[
            'product' => $product,
            'services' => $service
        ]);

    }

    
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $photo = $request->file('thumbnail_photo');
        $product = Product::findOrFail($id);

        if ($photo) {
            Storage::disk('public')->delete($product->thumbnail_photo);                

            $filename = $photo->getClientOriginalName();            
            $time = time();
            $newName = $time.$filename;            
            $path = Storage::putFileAs('photo_product',$photo,$newName);
            $data['thumbnail_photo'] = $path;            

        }

        $product->update($data);

        return back();
        
        
    }    
    
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $listPhoto = Product_Photo::where('product_id',$product->id)->pluck('photo_product');
            
            foreach ($listPhoto as $photo) {
                Storage::disk('public')->delete($photo);                
            }
                        
            Storage::disk('public')->delete($product->thumbnail_photo);        
            
    
            $product->productPhoto()->delete();
            $product->delete();

            return back();

        } catch (\Exception $e) {
            return $e->getMessage();
        }       
    }

    public function uploadFotoProduk(Request $request , $id)
    {
        $data = $request->file('foto_produk');
        
        foreach ($data as $foto) {
            $dataFoto =$foto->getClientOriginalName();            
            $waktu = time();
            $name = $waktu.$dataFoto;            
            $nameFile = Storage::putFileAs('photo_product',$foto,$name);

            $photoProduct = array(
                'product_id' => $id,
                'photo_product' => $nameFile
            );

            Product_Photo::create($photoProduct);
        }

        return back();
        
    }

    public function deleteFotoProduk($id)
    {
        $foto = Product_Photo::findOrFail($id); 
        if ($foto) {
            Storage::disk('public')->delete($foto->photo_product);        
        }
        $foto->delete();

        return back();

    }
}
