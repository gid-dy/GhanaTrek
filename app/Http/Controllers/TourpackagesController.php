<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourpackages;
use App\Country;
use App\Tourtype;
use App\Tourlocations;
use App\Accommodation;
use App\Packageimages;
use App\Tourtransportation;
use App\Tourinclude;
use Image;
use App\Tourpackagecategory;
use Session;
use DB;

class TourpackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addtour(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
             //echo "<pre>"; print_r($data); die;
             if(empty($data['Status'])){
                $Status = 0;
            }else{
                $Status = 1;
            }

             if(empty($data['categoryId'])){
                 return redirect()->back()->with('flash_message_error', 'Select Under category option!');
             }
             if (Tourpackages::where('PackageCode', $request->PackageCode)->exists()){
                return redirect()->back()->with('flash_message_error', 'Package code already exists!');
            }
            $tourpackages = new Tourpackages;
            $tourpackages->categoryId = $data['categoryId'];
            $tourpackages->PackageName = $data['PackageName'];
            $tourpackages->PackageCode = $data['PackageCode'];
            if (!empty($data['Description'])) {
                $tourpackages->Description = $data['Description'];
            }else{
                $tourpackages->Description = '';
            }
            $tourpackages->PackagePrice = $data['PackagePrice'];
            $tourpackages->Status = $Status;

             //upload image
             if($request->hasFile('Imageaddress')){
                $Imageaddress_tmp = $request->file('Imageaddress');
                if($Imageaddress_tmp->isValid()){
                    $extension = $Imageaddress_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/tours/large/'.$filename;
                    $medium_image_path = 'images/backend_images/tours/medium/'.$filename;
                    $small_image_path = 'images/backend_images/tours/small/'.$filename;

                    //Resize Images
                    Image::make($Imageaddress_tmp)->save($large_image_path);
                    Image::make($Imageaddress_tmp)->resize(270,180)->save($medium_image_path);
                    Image::make($Imageaddress_tmp)->resize(135,90)->save($small_image_path);

                    //store image name in tours table
                    $tourpackages->Imageaddress =$filename;
                }

            }
            $tourpackages->save();
            return redirect('/admin/view_tourpackages')->with('flash_message_success','Package has been added successfully!');
        }
        $tourpackagecategory = Tourpackagecategory::get();
        $tourpackagecategory_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($tourpackagecategory as $cat) {
            $tourpackagecategory_dropdown .= "<option value='".$cat->categoryId."'>".$cat->CategoryName."</option>";
        }
        return view('admin.tour.tourpackage')->with(compact('tourpackagecategory_dropdown'));
    }

    public function viewTour()
    {
        $tourpackages = Tourpackages::get();
        $tourpackages = json_decode(json_encode($tourpackages));
            foreach($tourpackages as $key => $val){
                $CategoryName = Tourpackagecategory::where(['categoryId'=>$val->categoryId])->first();
                $tourpackages[$key]->CategoryName = $CategoryName->CategoryName;
            }

        return view('admin.tour.view_tourpackages')->with(compact('tourpackages'));
    }

    public function editTour(Request $request, $PackageId=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['Status'])){
                $Status = 0;
            }else{
                $Status = 1;
            }

            if(empty($data['categoryId'])){
                return redirect()->back()->with('flash_message_error', 'Select Under category option!');
            }

            if($request->hasFile('Imageaddress')){
                $Imageaddress_tmp = $request->file('Imageaddress');
                if($Imageaddress_tmp->isValid()){
                    $extension = $Imageaddress_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/tours/large/'.$filename;
                    $medium_image_path = 'images/backend_images/tours/medium/'.$filename;
                    $small_image_path = 'images/backend_images/tours/small/'.$filename;

                    //Resize Images
                    Image::make($Imageaddress_tmp)->save($large_image_path);
                    Image::make($Imageaddress_tmp)->resize(270,180)->save($medium_image_path);
                    Image::make($Imageaddress_tmp)->resize(135,90)->save($small_image_path);
                }
            }else{
                $filename = $data['current_image'];
            }
            if (empty($data['description'])) {
                $data['description']= '';
            }

            Tourpackages::where(['PackageId'=>$PackageId])->update([
                'categoryId'=>$data['categoryId'],
                'PackageName'=>$data['PackageName'],
                'PackageCode'=>$data['PackageCode'],
                'Description'=>$data['Description'],
                'PackagePrice'=>$data['PackagePrice'],
                'Status'=>$Status,
                'Imageaddress'=>$filename

            ]);
            return redirect()->back()->with('flash_message_success', 'Tour has been updated successfully!');
        }

        $tourpackagesDetails = Tourpackages::where(['PackageId'=>$PackageId])->first();

        $tourpackagecategory = Tourpackagecategory::get();
        $tourpackagecategory_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($tourpackagecategory as $cat) {
            if($cat->PackageId==$tourpackagesDetails->categoryId){
                $selected ="selected";
            }else{
                $selected = " ";
            }
            $tourpackagecategory_dropdown .= "<option value='".$cat->categoryId."'>".$cat->CategoryName."</option>";
        }

        return view('admin.tour.edit_tourpackages')->with(compact('tourpackagesDetails', 'tourpackagecategory_dropdown'));
    }

    public function deleteTourImage($PackageId = null)
    {
        $tourpackageimage = Tourpackages::where(['PackageId'=>$PackageId])->first();
        //echo $tourpackageimage->Imageaddress; die;
        $large_image_path = 'images/backend_images/tours/large/';
        $medium_image_path = 'images/backend_images/tours/medium/';
        $small_image_path = 'images/backend_images/tours/small/';

        //deleting large image if not exist in folder
        if(file_exists($large_image_path.$tourpackageimage->Imageaddress)){
            unlink($large_image_path.$tourpackageimage->Imageaddress);
        }

         //deleting medium image if not exist in folder
         if(file_exists($medium_image_path.$tourpackageimage->Imageaddress)){
            unlink($medium_image_path.$tourpackageimage->Imageaddress);
        }

        //deleting small image if not exist in folder
        if(file_exists($small_image_path.$tourpackageimage->Imageaddress)){
            unlink($small_image_path.$tourpackageimage->Imageaddress);
        }

        Tourpackages:: where(['PackageId'=>$PackageId])->update(['Imageaddress'=>'']);
        return redirect()->back()->with('flash_message_success', 'Tour Image has been deleted successfully!');
    }

    public function deleteTourpackage($PackageId=null)
    {
        Tourpackages::where(['PackageId'=>$PackageId])->delete();
        return redirect()->back()->with('flash_message_success', 'Tour has been deleted successfully!');
    }

    public function deleteTourtype($TourTypeID = null)
    {
        Tourtype::where(['TourTypeID'=>$TourTypeID])->delete();
        return redirect()->back()->with('flash_message_success', 'Tour type has been deleted successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tourtype(Request $request, $PackageId = null)
    {
        $tourpackagesDetails = Tourpackages::with('tourtypes')->where(['PackageId'=>$PackageId])->first();
        // $tourpackagesDetails = json_decode(json_encode($tourpackagesDetails ));
        // echo "<pre>"; print_r($tourpackagesDetails); die;


        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['SKU'] as $key => $val){
                if(!empty($val)){
                    //prevent duplicate sku
                    $typeCountSKU = Tourtype::where('SKU', $val)->count();
                    if($typeCountSKU>0){
                        return redirect('admin/add-tourtype/'.$PackageId)->with('flash_message_error', 'SKU already exist! Please add another SKU.');
                    }

                    //prevent duplicate tourtype
                    $typeCountName = Tourtype::where(['PackageId'=>$PackageId,'TourTypeName'=>$data['TourTypeName'][$key]])->count();
                    if($typeCountName>0){
                        return redirect('admin/add-tourtype/'.$PackageId)->with('flash_message_error','"'.$data['TourTypeName'][$key].'"Tour type name already exist for this tour! Please add another name.');
                    }
                    

                    $tourtype = new Tourtype;
                    $tourtype->PackageId =$PackageId;
                    $tourtype->SKU =$val;
                    $tourtype->TourTypeName =$data['TourTypeName'][$key];
                    $tourtype->TourTypeSize =$data['TourTypeSize'][$key];
                    $tourtype->PackagePrice =$data['PackagePrice'][$key];
                    $tourtype->save();
                }
            }
            return redirect('admin/add-tourtype/'.$PackageId)->with('flash_message_success', 'Tour Type has been added successfully');
        }
        return view('admin.tour.add_tourtype')->with(compact('tourpackagesDetails'));
    }

    public function edittourtype(Request $request, $TourTypeID = null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
             foreach($data['idType'] as $key => $type){
                 Tourtype::where(['TourTypeID' =>$data['idType'][$key]])->update([
                     'PackagePrice'=>$data['PackagePrice'][$key],
                     'TourTypeSize'=>$data['TourTypeSize'][$key]
                     ]);
             }
             return redirect()->back()->with('flash_message_success', 'Tour Type has been updated successfully');
         }
    }

  

    public function image(Request $request, $PackageId = null)
    {
        $tourpackagesDetails = Tourpackages::with('packageimages')->where(['PackageId'=>$PackageId])->first();
        
        if($request->isMethod('post')){
            $data = $request->all();
           if($request->hasFile('Image')){
            $files = $request->file('Image');
               foreach($files as $file){
                //upload image
                 $Image = new Packageimages;
                 $extension = $file->getClientOriginalExtension();
                 $fileName = rand(111,999999).'.'.$extension;
     
                 $large_image_path = 'images/backend_images/tours/large/'.$fileName;
                 $medium_image_path = 'images/backend_images/tours/medium/'.$fileName;
                 $small_image_path = 'images/backend_images/tours/small/'.$fileName;
     
                 //Resize Images
                 Image::make($file)->save($large_image_path);
                 Image::make($file)->resize(270,180)->save($medium_image_path);
                 Image::make($file)->resize(135,90)->save($small_image_path);
     
                 $Image->Image =$fileName;
                 $Image->PackageId = $data['PackageId'];
                 $Image->save();
               }
               return redirect('admin/add-image/'.$PackageId)->with('flash_message_success', 'Image has been added successfully');
            }
        }
        $packageimages = Packageimages::where(['PackageId' => $PackageId])->get();
        $packageimages = json_decode(json_encode($packageimages));
        
        return view('admin.tour.add_image')->with(compact('tourpackagesDetails','packageimages'));
    }

    public function deleteAltimage($PackageImagesId = null)
    {
        $tourpackageimage = Packageimages::where(['PackageImagesId'=>$PackageImagesId])->first();
        //echo $tourpackageimage->Imageaddress; die;
        $large_image_path = 'images/backend_images/tours/large/';
        $medium_image_path = 'images/backend_images/tours/medium/';
        $small_image_path = 'images/backend_images/tours/small/';

        //deleting large image if not exist in folder
        if(file_exists($large_image_path.$tourpackageimage->Image)){
            unlink($large_image_path.$tourpackageimage->Image);
        }

         //deleting medium image if not exist in folder
         if(file_exists($medium_image_path.$tourpackageimage->Image)){
            unlink($medium_image_path.$tourpackageimage->Image);
        }

        //deleting small image if not exist in folder
        if(file_exists($small_image_path.$tourpackageimage->Image)){
            unlink($small_image_path.$tourpackageimage->Image);
        }

        Packageimages:: where(['PackageImagesId'=>$PackageImagesId])->delete();
        return redirect()->back()->with('flash_message_success', 'Alt Image has been deleted successfully!');
    }


    public function transport(Request $request, $PackageId = null)
    {
        $tourpackagesDetails = Tourpackages::with('tourtransports')->where(['PackageId'=>$PackageId])->first();
        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['TransportName'] as $key => $val){
                if(!empty($val)){

                    //prevent duplicate tourtransport
                    $tranCountName = Tourtransportation::where(['PackageId'=>$PackageId,'TransportName'=>$TransportName =$val])->count();
                    if($tranCountName>0){
                        return redirect('admin/add-tourtype/'.$PackageId)->with('flash_message_error','"'.$TransportName =$val.'"Transportation already exist for this tour! Please add another name.');
                    }

                    $tourtransportation = new Tourtransportation;
                    $tourtransportation->PackageId =$PackageId;
                    $tourtransportation->TransportName =$val;
                    $tourtransportation->TransportCost =$data['TransportCost'][$key];
                    $tourtransportation->save();
                }
            }
            return redirect('admin/add-tourtype/'.$PackageId)->with('flash_message_success', 'Tour Transport has been added successfully');
        }
        return view('admin.tour.add_tourtype')->with(compact('tourpackagesDetails'));
    }

    public function edittransport(Request $request, $TourTransportationID = null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            foreach($data['idTransport'] as $key => $transport){
                Tourtransportation::where(['TourTransportationID' =>$data['idTransport'][$key]])->update(
                    ['TransportCost'=>$data['TransportCost'][$key]]);
            }
            return redirect()->back()->with('flash_message_success', 'Tour Transport has been updated successfully');
        }
    }

    

    public function deleteTransport($TourTransportationID = null)
    {
        Tourtransportation::where(['TourTransportationID'=>$TourTransportationID])->delete();
        return redirect()->back()->with('flash_message_success', 'Tour Transportation has been deleted successfully!');
    }

    public function tourinclude(Request $request, $PackageId = null)
    {
        $tourpackagesDetails = Tourpackages::with('tourincludes')->where(['PackageId'=>$PackageId])->first();
        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['IncludeName'] as $key => $val){
                if(!empty($val)){
                    $tourinclude = new Tourinclude;
                    $tourinclude->PackageId =$PackageId;
                    $tourinclude->IncludeName =$val;
                    $tourinclude->TourIncludeInfo =$data['TourIncludeInfo'][$key];
                    $tourinclude->TourExcludeName =$data['TourExcludeName'][$key];
                    $tourinclude->save();
                }
            }
            return redirect('admin/add-tourtype/'.$PackageId)->with('flash_message_success', 'Tour details has been added successfully');
        }
        return view('admin.tour.add_tourtype')->with(compact('tourpackagesDetails'));
    }

    public function deleteTourinclude($TourIncludeID = null)
    {
        Tourinclude::where(['TourIncludeID'=>$TourIncludeID])->delete();
        return redirect()->back()->with('flash_message_success', 'Tour Include has been deleted successfully!');
    }


    public function accommodation(Request $request, $PackageId = null)
    {
        $tourpackagesDetails = Tourpackages::with('accommodations')->where(['PackageId'=>$PackageId])->first();
        if($request->isMethod('post')){
            $data = $request->all();

            //prevent duplicate accommodation
            $accCountName = Accommodation::where(['PackageId'=>$PackageId,'AccommodationName'=>$data['AccommodationName']])->count();
            if($accCountName>0){
                return redirect('admin/add-tourtype/'.$PackageId)->with('flash_message_error','"'.$data['AccommodationName'].'"Accommodation Name already exist for this tour! Please add another name.');
            }

            $accommodation = new Accommodation;
            $accommodation->PackageId =$PackageId;
            $accommodation->AccommodationName =$data['AccommodationName'];
            $accommodation->AccommodationType =$data['AccommodationType'];
            $accommodation->save();

            return redirect('admin/add-tourtype/'.$PackageId)->with('flash_message_success', 'Accomodation has been added successfully');
        }
        return view('admin.tour.add_tourtype')->with(compact('tourpackagesDetails','tourlocations_dropdown'));
    }

    public function deleteAccommodation($AccommodationID = null)
    {
        Accommodation::where(['AccommodationID'=>$AccommodationID])->delete();
        return redirect()->back()->with('flash_message_success', 'Accommodation has been deleted successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function location(Request $request, $PackageId = null)
    {
        $tourpackagesDetails = Tourpackages::where(['PackageId'=>$PackageId])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;

            $tourlocations = new Tourlocations;
            $tourlocations->PackageId =$PackageId;
            $tourlocations->LocationName = $data['LocationName'];
            $tourlocations->Longitude = $data['Longitude'];
            $tourlocations->Latitude = $data['Latitude'];
            $tourlocations->Weather = $data['Weather'];
            $tourlocations->GhanaPostAddress = $data['GhanaPostAddress'];
            $tourlocations->OtherAddress = $data['OtherAddress'];
            $tourlocations->save();

            return redirect('/admin/add-location/'.$PackageId)->with('flash_message_success', 'tour location added Successfully!');
        }

            return view('admin.tour.location')->with(compact('tourpackagesDetails'));

        }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tour($CategoryName = null)
    {
        $countCategory = Tourpackagecategory::where(['CategoryName'=>$CategoryName, 'CategoryStatus'=>1])->count();
        if ($countCategory==0){
            abort(404);
        }
        $tourpackagecategory = Tourpackagecategory::with('tourcategories')->where($categoryId=null)->get();
        $categoryDetails = Tourpackagecategory::where(['CategoryName'=>$CategoryName])->first();
        

        $tourpackagesAll = Tourpackages::where(['categoryId' => $categoryDetails->categoryId ])->get();
        return view('tour.package')->with(compact('tourpackagecategory','categoryDetails', 'tourpackagesAll'));
    }


    public function tours($PackageId = null)
    {
        $tourpackagesCount = Tourpackages::where(['PackageId'=>$PackageId, 'Status'=>1])->count();
        if($tourpackagesCount == 0){
            abort(404);
        }

        $tourpackagesDetails = Tourpackages::with('tourtypes','accommodations','tourincludes','tourtransports','tourlocations')->where('PackageId', $PackageId)->first();
        $tourpackagesDetails = json_decode(json_encode($tourpackagesDetails));
       // echo "<pre>"; print_r($tourpackagesDetails);die;
       $relatedTour = Tourpackages::where('PackageId','!=',$PackageId)->where(['categoryId'=>$tourpackagesDetails->categoryId])->get();
      

       $tourAltImage = Packageimages::where('PackageId',$PackageId)->get();
    //    $tourAltImage = json_decode(json_encode($tourAltImage));
    //    echo "<pre>"; print_r($tourAltImage); die;

    $total_availability = TourType::where('PackageId',$PackageId)->sum('TourTypeSize');
        return view('tour.details')->with(compact('tourpackagesDetails','tourAltImage','relatedTour','total_availability'));
    }


    public function getTourpackagePrice(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $tourArr = explode("-", $data['idTourTypeName']);
        //echo $tourArr[0]; echo $tourArr[1]; die;

        $tourtypeAtt = Tourtype::where(['PackageId' => $tourArr[0], 'TourTypeName' => $tourArr[1]])->first();
        echo $tourtypeAtt->PackagePrice;
        echo "#";
        echo $tourtypeAtt->TourTypeSize;
    }


    public function getTransportCost(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $tranArr = explode("-", $data['idTransportName']);
        //echo $tourArr[0]; echo $tourArr[1]; die;

        $tranAtt = Tourtransportation::where(['PackageId' => $tranArr[0], 'TransportName' => $tranArr[1]])->first();
        echo $tranAtt->TransportCost;
    }

    public function addtocart(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;

        if (empty($data['UserEmail'])){
            $data['UserEmail'] = '';
        }

        if (empty($data['sessionId'])){
            $data['sessionId'] = '';
        }

        $TourTypeNameArr = explode("-", $data['TourTypeName']);
       
        DB::table('carts')->insert([
            'PackageId'=>$data['PackageId'],
            'PackageName'=>$data['PackageName'],
            'PackageCode'=>$data['PackageCode'],
            'PackagePrice'=>$data['PackagePrice'],
            'Travellers'=>$data['Travellers'],
            'TourTypeName'=>$TourTypeNameArr[1],
            'UserEmail'=>$data['UserEmail'],
            'sessionId'=>$data['sessionId'],

        ]);
        die;
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
