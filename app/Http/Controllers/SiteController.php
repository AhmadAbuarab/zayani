<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\contact_us;
use App\car_offers_images;
use App\value_car;
use App\test_drive;
use App\car_brand;
use App\car_brand_model;
use App\contact_log;
use App\contact_value_imgs;
use Mail;
use App\subscriber;

class SiteController extends Controller {

    private $lang = '';

    public function __construct(request $request) {
        $lang = $request->segment(1);
        if ($lang == "ar") {
            $this->lang = 'ar';
        } else {
            $this->lang = 'en';
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if ($this->lang == 'ar') {
            $cars = DB::table('cars')->select('*')->get();
            $carsModelMan = DB::table('car_model_main')->select('*')->get();
            $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('main_ar', compact('contactUsData', 'cars', 'carsModelMan'));
        } else {
            $cars = DB::table('cars')->select('*')->get();
            $carsModelMan = DB::table('car_model_main')->select('*')->get();
            $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('main', compact('contactUsData', 'cars', 'carsModelMan'));
        }
    }

    public function offers(request $request, $id) {
        $carsModel = DB::table('cars_model')->select('id', 'car_id', 'car_model_id', 'name_ar', 'name_en', 'img_slider', 'img_slider_slider')->where('car_model_id', '=', $id)->get();
        $extraSliders = DB::table('offers_more_slider')->select('id', 'car_model_id', 'slider_arabic', 'slider_english')->where('car_model_id', '=', $id)->get();
        if ($carsModel) {
            if ($this->lang == 'ar') {
                $carsModelDetails = DB::table('cars_model_other_details_model')->select('id', 'car_id', 'car_model_id', 'detail_ar')->get();
                $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
                return view('offers_ar', compact('contactUsData', 'carsModel', 'carsModelDetails'));
            } else {
                $carsModelDetails = DB::table('cars_model_other_details_model')->select('id', 'car_id', 'car_model_id', 'detail_en')->get();
                $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
                return view('offers_en', compact('contactUsData', 'carsModel', 'carsModelDetails'));
            }
        }
        return back();
    }

    public function details(request $request, $id) {
        $offerImages = DB::table('car_offers_images')->select('*')->where('car_offer_id', '=', $id)->get();
        $carsModelData = DB::table('cars_model')->select('*')->where('id', '=', $id)->get();
        if ($carsModelData) {
            if ($this->lang == 'ar') {
                $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
                return view('details_ar', compact('contactUsData', 'carsModelData', 'offerImages'));
            } else {
                $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
                return view('details_en', compact('contactUsData', 'carsModelData', 'offerImages'));
            }
        }
        return back();
    }

    public function enquiry(request $request, $id) {
        $offerImages = DB::table('car_offers_images')->select('*')->where('car_offer_id', '=', $id)->get();
        $carsModelData = DB::table('cars_model')->select('*')->where('id', '=', $id)->get();
        if ($this->lang == 'ar') {
            $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('enquiry_ar', compact('contactUsData', 'carsModelData', 'offerImages'));
        } else {
            $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('enquiry_en', compact('contactUsData', 'carsModelData', 'offerImages'));
        }
    }

    public function valuecar(request $request, $id) {
        $contactUsSliders = DB::table('contact_value_imgs')->select('*')->get();
        $offerImages = DB::table('car_offers_images')->select('*')->where('car_offer_id', '=', $id)->get();
        $carsModelData = DB::table('cars_model')->select('*')->where('id', '=', $id)->get();
        if ($this->lang == 'ar') {
            $carsBran = car_brand::lists('name_ar', 'id');
            $carsBran->prepend('اختيار', 'اختيار');
            $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('valuecar_ar', compact('contactUsData', 'carsBran', 'carsModelData', 'offerImages', 'contactUsSliders'));
        } else {
            $carsBran = car_brand::lists('name_en', 'id');
            $carsBran->prepend('Select', 'Select');
            $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('valuecar_en', compact('contactUsData', 'carsBran', 'carsModelData', 'offerImages', 'contactUsSliders'));
        }
    }

    public function contact_us(request $request) {
        $carsModelMan = DB::table('car_model_main')->select('*')->get();

        $contactUsSliders = DB::table('contact_value_imgs')->select('*')->get();

        if ($this->lang == 'ar') {
            $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            $contactUsPageData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('contact_us_ar', compact('contactUsPageData', 'contactUsData', 'carsModelMan', 'contactUsSliders'));
        } else {
            $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            $contactUsPageData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('contact_us_en', compact('contactUsPageData', 'contactUsData', 'carsModelMan', 'contactUsSliders'));
        }
    }

    public function valuecaraddlog(request $request) {
        $this->validate($request, [
            'email' => 'required',
            'first_name' => 'required',
            'phone_number' => 'required',
        ]);
        value_car::create([
            'brand_id' => $request->input('brand_id'),
            'model_id' => $request->input('model_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'best_time_to_contact' => $request->input('best_time_to_contact'),
            'ownership_year' => $request->input('ownership_year'),
            'year' => $request->input('year'),
            'body_condition' => $request->input('body_condition'),
            'engine_condition' => $request->input('engine_condition'),
            'ac_condition' => $request->input('ac_condition'),
            'mileage' => $request->input('mileage'),
            'gear_condition' => $request->input('gear_condition'),
            'message' => $request->input('message')
        ]);

        $data = array(
            'brand_id' => $request->input('brand_id'),
            'model_id' => $request->input('model_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'best_time_to_contact' => $request->input('best_time_to_contact'),
            'ownership_year' => $request->input('ownership_year'),
            'year' => $request->input('year'),
            'body_condition' => $request->input('body_condition'),
            'engine_condition' => $request->input('engine_condition'),
            'ac_condition' => $request->input('ac_condition'),
            'mileage' => $request->input('mileage'),
            'gear_condition' => $request->input('gear_condition'),
            'message' => $request->input('message')
        );
        Mail::send('emails.valuecar', $data, function($message) {
            $message->to('ama91@live.com')->subject('Value Car');
        });

        return back();
    }

    public function subscriberlog() {
        $subscriberData = subscriber::get();
        return view('subscriber.subscriber', compact('subscriberData'));
    }

    public function addsubscribelog(request $request) {
        subscriber::create([
            'email' => $request->input('subemail')
        ]);
        $data = array('name' => $request->input('subemail'));
        Mail::send('emails.subscri', $data, function($message) {
            $message->to('ama91@live.com')->subject('This is test e-mail');
        });
        return back();
    }

    public function getCarBrandModel(request $request) {
        $carBrandModel = DB::table('car_brand_model')->select('*')->where('brand_id', '=', $request->input('brandId'))->get();
        return json_encode($carBrandModel);
    }

    public function addcontactlog(request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'message' => 'required',
        ]);

        contact_log::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'mobile_number' => $request->input('mobile_number'),
            'phone_number' => $request->input('phone_number'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message')
        ]);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
