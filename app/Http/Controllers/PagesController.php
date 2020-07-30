<?php

namespace App\Http\Controllers;

use App\State;
use App\Contact;
use App\District;
use App\Complaint;
use App\Admin\About;
use App\Admin\Counter;
use App\Admin\Gretting;
use App\PurchaseRequest;
use App\Admin\HeroSection;
use App\Admin\Newfeatures;
use App\Admin\Testimonial;
use App\Admin\TopFeatures;
use Illuminate\Http\Request;
use App\Admin\ContactDetails;

class PagesController extends Controller
{
    public function index()
    {
        $herosection = HeroSection::orderBy('id', 'DESC')->first();
        $testimonial = Testimonial::orderBy('id', 'DESC')->get();
        $newfeatures = Newfeatures::orderBy('id', 'DESC')->get();
        $newfeatures = Newfeatures::orderBy('id', 'DESC')->get();
        $topfeature = TopFeatures::orderBy('id', 'DESC')->paginate(4);
        $counter = Counter::orderBy('id', 'DESC')->first();
        $gretting = Gretting::orderBy('id', 'DESC')->first();

        return view('welcome', compact('herosection', 'testimonial', 'newfeatures', 'counter', 'topfeature', 'gretting'));
    }
    public function about()
    {
        $about = About::orderBy('id', 'DESC')->first();
        $gretting = Gretting::orderBy('id', 'DESC')->first();
        $herosection = HeroSection::orderBy('id', 'DESC')->first();
        return view('about', compact('about', 'herosection', 'gretting'));
    }
    public function contact()
    {
        $contact = ContactDetails::orderBy('id', 'DESC')->first();
        return view('contact', compact('contact'));
    }
    public function purchase()
    {
        $state = State::orderBy('state')->get();
        return view('purchase', compact('state'));
    }
    public function complaint()
    {
        return view('complaint');
    }
    /**
     * POST Route Fun
     */

    public function storeContact(Request $request)
    {
        Contact::create($request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "subject" => "required|string",
            "message" => "required|string",
        ]));
        return back()->with('success', 'Thankyou will contact you shortly.');
    }

    public function disctrict(Request $request)
    {
        $id = $request->state_id;
        $district = District::where('state_id', $id)->get();
        return $district;
    }

    public function storePurchase(Request $request)
    {
        $dataBack = PurchaseRequest::create($request->validate([
            "name" => "required",
            "email" => "required|email",
            "school" => "required",
            "state_id" => "required",
            "district_id" => "required",
            "phone" => "required",
        ]));
        // $this->fileStore($dataBack);
        return back()->with('success', 'Thankyou we have recieved your purchase request.');
    }

    public function postComplaint(Request $request)
    {

        $dataBack = Complaint::create($request->validate([
            "name" => "required",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required",
            "logo" => "required",
             "phone" => "required",
        ]));
        $dataBack->ticket = '#' . $dataBack->id . '-' . date('dmyHis');
        $dataBack->save();
        $this->fileStore($dataBack);
        return back()->with(['success' => 'Thankyou we have recieved your complaint request.', 'ticket' => $dataBack->ticket]);
    }

    public function fileStore($data)
    {
        $imageName = time() . '.' . $data->logo->getClientOriginalExtension();
        $data->logo->move(public_path_custom('images/purchaseRequest'), $imageName);
        $data->logo = 'images/purchaseRequest/' . $imageName;
        $data->save();
    }
    
    public function purchaseCreate()
    {
        return view('purchasestore');
    }
}
