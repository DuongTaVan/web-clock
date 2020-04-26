<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\{Product, Category, Attributes,ProductAttribute,Keyword,ProductKeyword};
class AdminProductController extends Controller
{
    public function index(){
    	$product = Product::with('cate')->paginate(8); 
    	return view('admin.product.index', compact('product'));
    }
    public function create(){
    	$categories = Category::all();
        $keywords = Keyword::all();
        $attributes = $this->syncAttributeGroup();
       
        $attributesOld = [];
        $keywordOld = [];
    	return view('admin.product.create', compact('categories','attributes','attributesOld','keywords','keywordOld'));
    }
    public function store(AdminRequestProduct $Request){
        
    	$product = new Product;
    	$product->pro_name = $Request->pro_name;
    	$product->pro_slug = Str::slug($Request->pro_name);
    	$product->pro_category_id = $Request->pro_category_id;
        $product->pro_price = $Request->pro_price;
        $product->pro_sale = $Request->pro_sale;
    	$product->created_at = Carbon::now();
        $product->pro_country = $Request->pro_country;
        $product->pro_number = $Request->pro_number;
        $product->pro_energy = $Request->pro_energy;
        $product->pro_resistant = $Request->pro_resistant;
        if ($Request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1) 
                $pro_avatar = $image['name'];
        } 
        $product->pro_avatar = $pro_avatar;

    	$product->save();
        $attributes = $Request->attribute;
        //dd($attributes);
        foreach($attributes as $pa){
            $atb = new ProductAttribute();
            $atb->pa_product_id = $product->id;
            $atb->pa_attribute_id = $pa;
            $atb->save();
        }
        $keyword = $Request->keywords;
        //dd($attributes);
        foreach($keyword as $kw){
            $kwd = new ProductKeyword();
            $kwd->pk_product_id  = $product->id;
            $kwd->pk_keyword_id  = $kw;
            $kwd->save();
        }
        if ($Request->file) {
                $this->syncAlbumImageAndProduct($Request->file, $product->id);
            }

    	return redirect()->route('admin.product.index');
    }
    public function active($id){
    	$product = Product::find($id);
    	$product->pro_active =! $product->pro_active;
    	$product->save();
    	return redirect()->back();
    }
    public function hot($id){
    	$product = Product::find($id);
    	$product->pro_hot =! $product->pro_hot;
    	$product->save();
    	return redirect()->back();
    }
    public function edit($id){
    	$product = Product::find($id);
        $keywords = Keyword::all();
    	$categories = Category::all();
        $attributes = $this->syncAttributeGroup();
        $attributesOld = ProductAttribute::where('pa_product_id',$id)->pluck('pa_attribute_id')->toArray();
        $keywordOld = ProductKeyword::where('pk_product_id',$id)->pluck('pk_keyword_id')->toArray();
        $images = \DB::table('product_images')
            ->where("pi_product_id", $id)
            ->get();
       // dd($attributesOld);
    	return view('admin.product.update', compact('product','categories','attributes','attributesOld','keywords','keywordOld','images'));
    }
    public function update(AdminRequestProduct $Request, $id){
    	$product =  Product::find($id);
    	$product->pro_name = $Request->pro_name;
    	$product->pro_slug = Str::slug($Request->pro_name);
    	$product->pro_category_id = $Request->pro_category_id;
    	$product->created_at = Carbon::now();
        $product->pro_country = $Request->pro_country;
        $product->pro_sale = $Request->pro_sale;
        $product->pro_number = $Request->pro_number;
        $product->pro_energy = $Request->pro_energy;
        $product->pro_resistant = $Request->pro_resistant;
        if ($Request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1) 
                $pro_avatar = $image['name'];
        } 
        $product->pro_avatar = $pro_avatar;
    	$product->save();
        $attributes = $Request->attribute;
        $att = ProductAttribute::where('pa_product_id',$id)->delete();;

        //dd($att);
        foreach($attributes as $pa){
            $atb = new ProductAttribute();
            $atb->pa_product_id = $product->id;
            $atb->pa_attribute_id = $pa;
            $atb->save();
        }
        $keyword = $Request->keywords;
        $pk = ProductKeyword::where('pk_product_id',$id)->delete();;

        //dd($att);
        foreach($keyword as $kw){
            $kwd = new ProductKeyword();
            $kwd->pk_product_id  = $product->id;
            $kwd->pk_keyword_id  = $kw;
            $kwd->save();
        }
        if($Request->file){
            $this->syncAlbumImageAndProduct($Request->file, $id);
        }
    	return redirect()->route('admin.product.index');
    }
    public function syncAlbumImageAndProduct($files, $productID){
        foreach ($files as $key => $fileImage) {
            $ext = $fileImage->getClientOriginalExtension();
            $extend = [
                'png','jpg','jpeg','PNG','JPG'
            ];

            if (!in_array($ext, $extend)) return false;

            $filename = date('Y-m-d__').Str::slug($fileImage->getClientOriginalName()).'.'.$ext;
            $path = public_path().'/uploads/'.date('Y/m/d/');
            if (!\File::exists($path)){
                mkdir($path, 0777, true);
            }

            $fileImage->move($path, $filename);
            \DB::table('product_images')
            ->insert([
                'pi_name' => $fileImage->getClientOriginalName(),
                'pi_slug' => $filename,
                'pi_product_id' => $productID,
                'created_at' => Carbon::now()
            ]);
        }
    }
    public function delete($id){
    	$product = Product::find($id);
    	$product->delete();
    	return redirect()->back();
    }



    public function syncAttributeGroup(){
        $attributes = Attributes::get();
        $groupAttribute = [];
        foreach($attributes as $key =>$attribute){

            $key = $attribute->getType($attribute->atb_type)['name'];
            
            $groupAttribute[$key][]= $attribute->toArray();
        }
        return $groupAttribute;
    }
    public function deleteImage($imageID)
    {
        \DB::table('product_images')->where('id', $imageID)->delete();
        return redirect()->back();
    }
}
