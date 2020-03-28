<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Str;
use App\Tourpackages;
use App\Country;
use App\Tourtype;
use App\Tourlocations;
use App\Accommodation;
use App\Packageimages;
use App\Tourtransportation;
use App\Tourinclude;
use App\Coupon;
use App\User;
use App\Booking;
use App\BookingsPackage;
use App\TravelAddress;
use Auth;
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

             if(empty($data['Category_id'])){
                 return redirect()->back()->with('flash_message_error', 'Select Under category option!');
             }
             if (Tourpackages::where('PackageCode', $request->PackageCode)->exists()){
                return redirect()->back()->with('flash_message_error', 'Package code already exists!');
            }
            $tourpackages = new Tourpackages;
            $tourpackages->Category_id = $data['Category_id'];
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
            $tourpackagecategory_dropdown .= "<option value='".$cat->id."'>".$cat->CategoryName."</option>";
        }
        return view('admin.tour.tourpackage')->with(compact('tourpackagecategory_dropdown'));
    }

    public function viewTour()
    {
        $tourpackages = Tourpackages::get();
        $tourpackages = json_decode(json_encode($tourpackages));
            foreach($tourpackages as $key => $val){
                $CategoryName = Tourpackagecategory::where(['id'=>$val->Category_id])->first();
                $tourpackages[$key]->CategoryName = $CategoryName->CategoryName;
            }

        return view('admin.tour.view_tourpackages')->with(compact('tourpackages'));
    }

    public function editTour(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['Status'])){
                $Status = 0;
            }else{
                $Status = 1;
            }

            if(empty($data['Category_id'])){
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

            Tourpackages::where(['id'=>$id])->update([
                'Category_id'=>$data['Category_id'],
                'PackageName'=>$data['PackageName'],
                'PackageCode'=>$data['PackageCode'],
                'Description'=>$data['Description'],
                'PackagePrice'=>$data['PackagePrice'],
                'Status'=>$Status,
                'Imageaddress'=>$filename

            ]);
            return redirect()->back()->with('flash_message_success', 'Tour has been updated successfully!');
        }

        $tourpackagesDetails = Tourpackages::where(['id'=>$id])->first();

        $tourpackagecategory = Tourpackagecategory::get();
        $tourpackagecategory_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($tourpackagecategory as $cat) {
            if($cat->id==$tourpackagesDetails->Category_id){
                $selected ="selected";
            }else{
                $selected = " ";
            }
            $tourpackagecategory_dropdown .= "<option value='".$cat->id."'>".$cat->CategoryName."</option>";
        }

        return view('admin.tour.edit_tourpackages')->with(compact('tourpackagesDetails', 'tourpackagecategory_dropdown'));
    }

    public function deleteTourImage($id = null)
    {
        $tourpackageimage = Tourpackages::where(['id'=>$id])->first();
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

        Tourpackages:: where(['id'=>$id])->update(['Imageaddress'=>'']);
        return redirect()->back()->with('flash_message_success', 'Tour Image has been deleted successfully!');
    }

    public function deleteTourpackage($id=null)
    {
        Tourpackages::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Tour has been deleted successfully!');
    }

    public function deleteTourtype($id = null)
    {
        Tourtype::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Tour type has been deleted successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tourtype(Request $request, $id = null)
    {
        $tourpackagesDetails = Tourpackages::with('tourtypes')->where(['id'=>$id])->first();
        // $tourpackagesDetails = json_decode(json_encode($tourpackagesDetails ));
        // echo "<pre>"; print_r($tourpackagesDetails); die;


        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['SKU'] as $key => $val){
                if(!empty($val)){
                    //prevent duplicate sku
                    $typeCountSKU = Tourtype::where('SKU', $val)->count();
                    if($typeCountSKU>0){
                        return redirect('admin/add-tourtype/'.$id)->with('flash_message_error', 'SKU already exist! Please add another SKU.');
                    }

                    //prevent duplicate tourtype
                    $typeCountName = Tourtype::where(['Package_id'=>$id,'TourTypeName'=>$data['TourTypeName'][$key]])->count();
                    if($typeCountName>0){
                        return redirect('admin/add-tourtype/'.$id)->with('flash_message_error','"'.$data['TourTypeName'][$key].'"Tour type name already exist for this tour! Please add another name.');
                    }


                    $tourtype = new Tourtype;
                    $tourtype->Package_id =$id;
                    $tourtype->SKU =$val;
                    $tourtype->TourTypeName =$data['TourTypeName'][$key];
                    $tourtype->TourTypeSize =$data['TourTypeSize'][$key];
                    $tourtype->PackagePrice =$data['PackagePrice'][$key];
                    $tourtype->save();
                }
            }
            return redirect('admin/add-tourtype/'.$id)->with('flash_message_success', 'Tour Type has been added successfully');
        }
        return view('admin.tour.add_tourtype')->with(compact('tourpackagesDetails'));
    }

    public function edittourtype(Request $request, $id = null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
             foreach($data['idType'] as $key => $type){
                 Tourtype::where(['id' =>$data['idType'][$key]])->update([
                     'PackagePrice'=>$data['PackagePrice'][$key],
                     'TourTypeSize'=>$data['TourTypeSize'][$key]
                     ]);
             }
             return redirect()->back()->with('flash_message_success', 'Tour Type has been updated successfully');
         }
    }



    public function image(Request $request, $id = null)
    {
        $tourpackagesDetails = Tourpackages::with('packageimages')->where(['id'=>$id])->first();

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
                 $Image->Package_id = $data['Package_id'];
                 $Image->save();
               }
               return redirect('admin/add-image/'.$id)->with('flash_message_success', 'Image has been added successfully');
            }
        }
        $packageimages = Packageimages::where(['Package_id' => $id])->get();
        $packageimages = json_decode(json_encode($packageimages));

        return view('admin.tour.add_image')->with(compact('tourpackagesDetails','packageimages'));
    }

    public function deleteAltimage($id = null)
    {
        $tourpackageimage = Packageimages::where(['id'=>$id])->first();
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

        Packageimages:: where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Alt Image has been deleted successfully!');
    }


    public function transport(Request $request, $id = null)
    {
        $tourpackagesDetails = Tourpackages::with('tourtransports')->where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['TransportName'] as $key => $val){
                if(!empty($val)){

                    //prevent duplicate tourtransport
                    $tranCountName = Tourtransportation::where(['Package_id'=>$id,'TransportName'=>$val])->count();
                    if($tranCountName>0){
                        return redirect('admin/add-tourtype/'.$id)->with('flash_message_error','"'.$val.'"Transportation name already exist for this tour! Please add another name.');
                    }

                    $tourtransportation = new Tourtransportation;
                    $tourtransportation->Package_id =$id;
                    $tourtransportation->TransportName =$val;
                    $tourtransportation->TransportCost =$data['TransportCost'][$key];
                    $tourtransportation->save();
                }
            }
            return redirect('admin/add-tourtype/'.$id)->with('flash_message_success', 'Tour Transport has been added successfully');
        }
        return view('admin.tour.add_tourtype')->with(compact('tourpackagesDetails'));
    }

    public function edittransport(Request $request, $id = null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            foreach($data['idTransport'] as $key => $transport){
                Tourtransportation::where(['id' =>$data['idTransport'][$key]])->update(
                    ['TransportCost'=>$data['TransportCost'][$key]]);
            }
            return redirect()->back()->with('flash_message_success', 'Tour Transport has been updated successfully');
        }
    }



    public function deleteTransport($id = null)
    {
        Tourtransportation::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Tour Transportation has been deleted successfully!');
    }

    public function tourinclude(Request $request, $id = null)
    {
        $tourpackagesDetails = Tourpackages::with('tourincludes')->where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['IncludeName'] as $key => $val){
                if(!empty($val)){
                    $tourinclude = new Tourinclude;
                    $tourinclude->Package_id =$id;
                    $tourinclude->IncludeName =$val;
                    $tourinclude->TourIncludeInfo =$data['TourIncludeInfo'][$key];
                    $tourinclude->TourExcludeName =$data['TourExcludeName'][$key];
                    $tourinclude->save();
                }
            }
            return redirect('admin/add-tourtype/'.$id)->with('flash_message_success', 'Tour details has been added successfully');
        }
        return view('admin.tour.add_tourtype')->with(compact('tourpackagesDetails'));
    }

    public function deleteTourinclude($id = null)
    {
        Tourinclude::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Tour Include has been deleted successfully!');
    }


    public function accommodation(Request $request, $id = null)
    {
        $tourpackagesDetails = Tourpackages::with('accommodations')->where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();

            //prevent duplicate accommodation
            $accCountName = Accommodation::where(['Package_id'=>$id,'AccommodationName'=>$data['AccommodationName']])->count();
            if($accCountName>0){
                return redirect('admin/add-tourtype/'.$id)->with('flash_message_error','"'.$data['AccommodationName'].'"Accommodation Name already exist for this tour! Please add another name.');
            }

            $accommodation = new Accommodation;
            $accommodation->Package_id =$id;
            $accommodation->AccommodationName =$data['AccommodationName'];
            $accommodation->save();

            return redirect('admin/add-tourtype/'.$id)->with('flash_message_success', 'Accomodation has been added successfully');
        }
        return view('admin.tour.add_tourtype')->with(compact('tourpackagesDetails','tourlocations_dropdown'));
    }

    public function deleteAccommodation($id = null)
    {
        Accommodation::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Accommodation has been deleted successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function location(Request $request, $id = null)
    {
        $tourpackagesDetails = Tourpackages::where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;

            $tourlocations = new Tourlocations;
            $tourlocations->Package_id =$id;
            $tourlocations->LocationName = $data['LocationName'];
            $tourlocations->Longitude = $data['Longitude'];
            $tourlocations->Latitude = $data['Latitude'];
            $tourlocations->Weather = $data['Weather'];
            $tourlocations->GhanaPostAddress = $data['GhanaPostAddress'];
            $tourlocations->OtherAddress = $data['OtherAddress'];
            $tourlocations->save();

            return redirect('/admin/add-location/'.$id)->with('flash_message_success', 'tour location added Successfully!');
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
        $tourpackagecategory = Tourpackagecategory::with('tourcategories')->where($id=null)->get();
        $categoryDetails = Tourpackagecategory::where(['CategoryName'=>$CategoryName])->first();


        $tourpackagesAll = Tourpackages::where(['Category_id' => $categoryDetails->id ])->get();
        return view('tour.package')->with(compact('tourpackagecategory','categoryDetails', 'tourpackagesAll'));
    }


    public function tours($id = null)
    {

        $tourpackagesCount = Tourpackages::where(['id'=>$id, 'Status'=>1])->count();
        if($tourpackagesCount == 0){
            abort(404);
        }

        $tourpackagesDetails = Tourpackages::with('tourtypes','accommodations','tourincludes','tourtransports','tourlocations')->where('id', $id)->first();
        $tourpackagesDetails = json_decode(json_encode($tourpackagesDetails));

       // echo "<pre>"; print_r($tourpackagesDetails);die;
       $relatedTour = Tourpackages::where('id','!=',$id)->where(['Category_id'=>$tourpackagesDetails->Category_id])->get();


       $tourAltImage = Packageimages::where('Package_id',$id)->get();
    //    $tourAltImage = json_decode(json_encode($tourAltImage));
    //    echo "<pre>"; print_r($tourAltImage); die;

    $total_availability = TourType::where('Package_id',$id)->sum('TourTypeSize');
    //dd( $tourpackagesDetails);
        return view('tour.details')->with(compact('tourpackagesDetails','tourAltImage','relatedTour','total_availability'));
    }


    public function getTourpackagePrice(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $tourArr = explode("-", $data['idTourTypeName']);
        //echo $tourArr[0]; echo $tourArr[1]; die;

        $tourtypeAtt = Tourtype::where(['Package_id' => $tourArr[0], 'TourTypeName' => $tourArr[1]])->first();
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

        $tranAtt = Tourtransportation::where(['Package_id' => $tranArr[0], 'TransportName' => $tranArr[1]])->first();
        echo $tranAtt->TransportCost;
    }

    public function addtocart(Request $request){
        $data = $request->all();


        //echo "<pre>"; print_r($data); die;

        if (empty($data['UserEmail'])){
            $data['UserEmail'] = '';
        }
        if (empty($data['TransportCost'])){
            $data['TransportCost'] = '';
        }

        if (empty($data['TransportName'])) {
            $data['TransportName']= '';
        }


        $Session_id = Session::get('Session_id');
        if(empty($Session_id)){
            $Session_id = str::random(40);
            Session::put('Session_id',$Session_id);
        }

        if (empty($data['TransportName'])){
            $data['TransportName'] = '';
        }


        $TourTypeNameArr = explode("-", $data['TourTypeName']);
        $TransportNameArr = explode("-", $data['TransportName']);

        if(empty($data['TourTypeName'])){
            return redirect()->back()->with('flash_message_error', 'Select Tour type !');
        }

        $countTourpackages = DB::table('carts')->where([
            'Package_id'=>$data['Package_id'],
            'PackageName'=>$data['PackageName'],
            'TourTypeName'=>$TourTypeNameArr[1],
            'Session_id'=>$Session_id])->count();
        if($countTourpackages>0){
            return redirect()->back()->with('flash_message_error',  'Tour Package already exist in cart!');
        }else{
            $getSKU =Tourtype::select('SKU')->where(['Package_id' =>$data['Package_id'],'TourTypeName'=>$TourTypeNameArr[1]])->first();
            DB::table('carts')->insert([
                'Package_id'=>$data['Package_id'],
                'PackageName'=>$data['PackageName'],
                'PackageCode'=>$getSKU->SKU,
                'PackagePrice'=>$data['PackagePrice'],
                'Travellers'=>$data['Travellers'],
                'TourTypeName'=>$TourTypeNameArr[1],
                'TransportName'=>$TransportNameArr[1],
                'UserEmail'=>$data['UserEmail'],
                'Session_id'=>$Session_id]);
            }
        return redirect('cart')->with('flash_message_success','tour added to cart');

    }


    public function cart()
    {
            $Session_id = Session::get('Session_id');
            $userCart = DB::table('carts')->where(['Session_id'=>$Session_id])->get();

        foreach($userCart as $key =>$tourpackages){
            $tourpackagesDetails = Tourpackages::where('id', $tourpackages->Package_id)->first();
            $userCart[$key]->Imageaddress = $tourpackagesDetails->Imageaddress;
        }
         //echo "<pre>"; print_r($userCart); die;
        return view('tour.cart')->with(compact('userCart'));
    }

    public function deleteCartPackage($id = null){
        DB::table('carts')->where('id', $id)->delete();
        return redirect('cart')->with('flash_message_success', 'Tour Package has been deleted from cart!');
    }

    public function applyCoupon(Request $request)
    {
        Session::put('CouponAmount');
        Session::put('CouponCode');

        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $couponCount = Coupon::where('CouponCode', $data['CouponCode'])->count();
        if($couponCount == 0){
            return redirect()->back()->with('flash_message_error', 'This coupon does not exist');
        }else{
            //get coupon details
            $couponDetails = Coupon::where('CouponCode', $data['CouponCode'])->first();

            //if coupon is Inactive
            if($couponDetails->Status==0){
                return redirect()->back()->with('flash_message_error', 'This coupon is not active');
            }
            //if coupon is expired
             $ExpiryDate = $couponDetails->ExpiryDate;
            $current_date = date('Y-m-d');
            if($ExpiryDate < $current_date){
                return redirect()->back()->with('flash_message_error', 'This coupon is expired');
            }

            //Coupon is valid for discount

            //Get Cart Total Amount
            $Session_id = Session::get('Session_id');

            if(Auth::check()){
                $UserEmail = Auth::user()->UserEmail;
                $userCart = DB::table('carts')->where(['UserEmail'=>$UserEmail])->get();
            }else{
                $Session_id = Session::get('Session_id');
                $userCart = DB::table('carts')->where(['Session_id'=>$Session_id])->get();
            }

            $total_amount = 0;
            foreach($userCart as $item){
                $total_amount = $total_amount + ($item->PackagePrice * $item->Travellers);

            }

            //check if amount type is fixed or percentage
            if($couponDetails->AmountType=="Fixed"){
                $couponAmount = $couponDetails->Amount;
            }else{
                //echo $total_amount;die;
                $couponAmount = $total_amount * ($couponDetails->Amount/100);
            }

            //add coupon code $ amount in session
            Session::put('CouponAmount', $couponAmount);
            Session::put('CouponCode', $data['CouponCode']);

            return redirect()->back()->with('flash_message_success', 'Coupon code successfully applied. You are availing discount!');
        }
    }

    public function billing(Request $request){
        $user_id =Auth::user()->id;
        $UserEmail =Auth::user()->UserEmail;
        $userDetails = User::find($user_id);
        $countries =Country::get();

        //checking if Travelling Address exists
        $travellingCount = TravelAddress::where('user_id',$user_id)->count();
        $travellingDetails = array();
            if($travellingCount>0){
                $travellingDetails = TravelAddress::where('user_id',$user_id)->first();
            }

            //update cart table with user Email
            $Session_id = Session::get('Session_id');
            DB::table('carts')->where(['Session_id'=>$Session_id])->update(['UserEmail'=>$UserEmail]);
        if($request->isMethod('post')){
            $data =$request->all();

            //return to checkout page if any of the field is empty
            if(empty($data['billing_SurName']) || empty($data['billing_OtherNames']) ||
              empty($data['billing_Country']) || empty($data['billing_Mobile']) || empty($data['billing_OtherContact']) ||
              empty($data['billing_Address']) || empty($data['billing_City']) || empty($data['billing_State']) ||
              empty($data['travelling_SurName']) || empty($data['travelling_OtherNames']) ||
              empty($data['travelling_Country']) || empty($data['travelling_Mobile']) || empty($data['travelling_OtherContact']) ||
              empty($data['travelling_Address']) || empty($data['travelling_City']) || empty($data['travelling_State'])){


                  return redirect()->back()->with('flash_message_error', 'Please fill all fields to Checkout!');
              }
              //Update user details
              User::where('id',$user_id)->update([
                  'SurName'=>$data['billing_SurName'],
                  'OtherNames'=>$data['billing_OtherNames'],
                  'Country'=>$data['billing_Country'],
                  'Mobile'=>$data['billing_Mobile'],
                  'Address'=>$data['billing_Address'],
                  'City'=>$data['billing_City'],
                  'State'=>$data['billing_State'],
                  'OtherContact'=>$data['billing_OtherContact'],
              ]);

              if($travellingCount>0){
                  //update Travelling Address
                  TravelAddress::where('user_id',$user_id)->update([
                    'SurName'=>$data['travelling_SurName'],
                    'OtherNames'=>$data['travelling_OtherNames'],
                    'Country'=>$data['travelling_Country'],
                    'Mobile'=>$data['travelling_Mobile'],
                    'Address'=>$data['travelling_Address'],
                    'City'=>$data['travelling_City'],
                    'State'=>$data['travelling_State'],
                    'OtherContact'=>$data['travelling_OtherContact']
                ]);
              }else{
                  //Add new travelling Address
                  $travelling = new TravelAddress;
                  $travelling->user_id =$user_id;
                  $travelling->UserEmail =$UserEmail;
                  $travelling->SurName=$data['travelling_SurName'];
                  $travelling->OtherNames=$data['travelling_OtherNames'];
                  $travelling->Mobile=$data['travelling_Mobile'];
                  $travelling->OtherContact=$data['travelling_OtherContact'];
                  $travelling->Country=$data['travelling_Country'];
                  $travelling->Address=$data['travelling_Address'];
                  $travelling->City=$data['travelling_City'];
                  $travelling->State=$data['travelling_State'];
                  $travelling->save();
              }
              return redirect('/tour-review');

        }

        return view('tour.billing')->with(compact('userDetails','countries','travellingDetails'));
    }


    public function tourReview(Request $request)
    {
        $user_id =Auth::user()->id;
        $UserEmail =Auth::user()->UserEmail;
        $userDetails = User::where('id',$user_id)->first();
        $travellingDetails = TravelAddress::where('user_id',$user_id)->first();
        $travellingDetails = json_decode(json_encode($travellingDetails));
        $userCart = DB::table('carts')->where(['UserEmail'=>$UserEmail])->get();
        foreach($userCart as $key =>$tourpackages){
            $tourpackagesDetails = Tourpackages::where('id', $tourpackages->Package_id)->first();
            $userCart[$key]->Imageaddress = $tourpackagesDetails->Imageaddress;
        }

        return view('tour.tour_review')->with(compact('userDetails','travellingDetails','userCart'));
    }


    public function placePackage(Request $request)
    {
        if($request->isMethod('post')){
            $data= $request->all();
            $user_id = Auth::user()->id;
            $UserEmail = Auth::user()->UserEmail;
            //Get travelling Address of User
            $travellingDetails =TravelAddress::where(['UserEmail' => $UserEmail])->first();

            if(empty(Session::get('CouponCode'))){
                $CouponCode ='';
            }else{
                $CouponCode = Session::get('CouponCode');
            }

            if(empty(Session::get('CouponAmount'))){
                $Amount ='';
            }else{
                $Amount = Session::get('CouponAmount');
            }

            $booking = new Booking;
            $booking->user_id = $user_id;
            $booking->UserEmail = $UserEmail;
            $booking->SurName = $travellingDetails->SurName;
            $booking->OtherNames = $travellingDetails->OtherNames;
            $booking->Address = $travellingDetails->Address;
            $booking->City = $travellingDetails->City;
            $booking->State = $travellingDetails->State;
            $booking->Country = $travellingDetails->Country;
            $booking->Mobile = $travellingDetails->Mobile;
            $booking->CouponCode = $CouponCode;
            $booking->Amount = $Amount;
            $booking->Status = "new";
            $booking->Payment_method = $data['Payment_method'];
            $booking->Grand_total = $data['Grand_total'];
            $booking->save();

            //DB::table()->insert($data);
            $Booking_id = DB::getPdo()->lastInsertId();
            //return Response()->json(array('success'=>true, 'lat_insert_id'=>$booking->id),200);
            $cartPackages = DB::table('carts')->where(['UserEmail'=>$UserEmail])->get();
            foreach($cartPackages as$pro){
                $cartPro = new BookingsPackage;
                $cartPro->Booking_id = $Booking_id;
                $cartPro->user_id = $user_id;
                $cartPro->Package_id = $pro->Package_id;
                $cartPro->PackageName = $pro->PackageName;
                $cartPro->PackageCode = $pro->PackageCode;
                $cartPro->TourTypeName = $pro->TourTypeName;
                $cartPro->Travellers = $pro->Travellers;
                $cartPro->PackagePrice = $pro->PackagePrice;
                $cartPro->TransportName = $pro->TransportName;
                $cartPro->save();
            }
        }
    }
}
