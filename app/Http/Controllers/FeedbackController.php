<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\Tourpackages;

class FeedbackController extends Controller
{
    public function feedback(Request $request, $id = null){
        $tourpackagesDetails = Tourpackages::where(['id'=>$id])->first();

        if ($request->isMethod('post')) {
            $data = $request->all();

            $feedback = new Feedback;
            $feedback->Package_id =$data['Package_id'];
            $feedback->SurName = $data['SurName'];
            $feedback->OtherNames =$data['OtherNames'];
            $feedback->UserEmail =$data['UserEmail'];
            $feedback->Message =$data['Message'];
            $feedback->Status = 1;
            $feedback->save();
            return redirect()->back()->with(compact('tourpackagesDetails'));

        }
        //return view('tour.details');
    }

    public function viewFeedback(){
        $feedbacks = Feedback::get();
        return view('admin.feedbacks.view_feedback')->with(compact('feedbacks'));
    }

    public function updateFeedbackStatus($id, $Status){
        Feedback::where('id', $id)->update(['Status'=>$Status]);
        return redirect()->back()->with('flash_message_success', 'Feddback Status has been updated');
    }

    public function deleteFeedback($id){
        Feedback::where('id', $id)->delete();
        return redirect()->back()->with('flash_message_success', 'Feedback has been deleted');
    }
}
