<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Enquiry;

class CmsController extends Controller
{
    public function contact(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $enquiry = new Enquiry;
            $enquiry->SurName = $data['SurName'];
            $enquiry->OtherNames =$data['OtherNames'];
            $enquiry->UserEmail =$data['UserEmail'];
            $enquiry->Subject =$data['Subject'];
            $enquiry->message =$data['message'];
            $enquiry->save();

            //send Contact Email
            $UserEmail ="ghanatrek.toursite@gmail.com";
            $messageData = [
                'SurName'=>$data['SurName'],
                'OtherNames'=>$data['OtherNames'],
                'UserEmail'=>$data['UserEmail'],
                'Subject'=>$data['Subject'],
                'comment'=>$data['message']
            ];
            Mail::send('emails.enquiry', $messageData, function($message)use($UserEmail){
                $message->to($UserEmail)->subject('Enquiry from Ghanatrek');
            });
            return redirect()->back()->with('flash_message_success', 'Thanks for your enquiry. We will get back to you soon.');
        }
        $meta_title = "Contact Us - GhanaTrek";
        $meta_description = "Contact Us for any queries related to our tour";
        $meta_keywords = "Contact Us, queries";
        return view('pages.contact')->with(compact('meta_title','meta_description','meta_keywords'));
    }

    public function addPost(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //dd($data);
            $enquiry = new Enquiry;
            $enquiry->SurName = $data['SurName'];
            $enquiry->OtherNames =$data['OtherNames'];
            $enquiry->UserEmail =$data['UserEmail'];
            $enquiry->Subject =$data['Subject'];
            $enquiry->message =$data['message'];
            $enquiry->save();
            echo "Thanks for contacting us. We will get back to you soon"; die;
        }
        return view('pages.post');
    }

    public function getEnquiries(){
        $enquiries = Enquiry::orderby('id', 'DESC')->get();
        $enquiries = json_encode($enquiries);
        return $enquiries;
    }

    public function viewEnquiries(){
        return view('admin.enquiries.view_enquiries');
    }

    public function getContact(){
        $contacts = Enquiry::get();
        return view('admin.enquiries.view_contacts')->with(compact('contacts'));
    }

    public function deleteContact($id){
        Enquiry::where('id', $id)->delete();
        return redirect()->back()->with('flash_message_success', 'Message has been deleted');
    }
}
