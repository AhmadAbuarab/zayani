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
            $cars = DB::table('cars')->select('id', 'name_ar', 'slider_img', 'main_img')->get();
            $carsModelMan = DB::table('car_model_main')->select('id', 'car_id', 'car_model_main_name_ar','slider_img')->get();
            $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('main_ar', compact('contactUsData', 'cars', 'carsModelMan'));
        } else {
            $cars = DB::table('cars')->select('id', 'name_en', 'slider_img', 'main_img')->get();
            $carsModelMan = DB::table('car_model_main')->select('id', 'car_id', 'car_model_main_name_en','slider_img')->get();
            $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('main', compact('contactUsData', 'cars', 'carsModelMan'));
        }
    }

    public function offers(request $request, $id) {
        $carsModel = DB::table('cars_model')->select('id', 'car_id', 'car_model_id', 'name_ar', 'name_en', 'img_slider')->where('car_model_id', '=', $id)->get();
        if ($carsModel) {
            if ($this->lang == 'ar') {
                $carsModelDetails = DB::table('cars_model_other_details_model')->select('id', 'car_id', 'car_model_id', 'detail_ar')->get();
                $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
                return view('offers_ar', compact('contactUsData', 'carsModel', 'carsModelDetails'));
            } else {
                $carsModel = DB::table('cars_model')->select('id', 'car_id', 'car_model_id', 'name_ar', 'name_en', 'img_slider')->where('car_model_id', '=', $id)->get();
                $carsModelDetails = DB::table('cars_model_other_details_model')->select('id', 'car_id', 'car_model_id', 'detail_en')->get();
                $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
                return view('offers_en', compact('contactUsData', 'carsModel', 'carsModelDetails'));
            }
        }
        return back();
    }

    public function details(request $request, $id) {
        $offerImages = DB::table('car_offers_images')->select('*')->where('car_offer_id', '=', $id)->get();
//        var_dump($id); die();
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

    public function enquiry(request $request, $id ) {
        $carsModelData = DB::table('cars_model')->select('*')->where('id', '=', $id)->get();
        if ($this->lang == 'ar') {
            $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('enquiry_ar', compact('contactUsData','carsModelData'));
        } else {
            $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('enquiry_en', compact('contactUsData','carsModelData'));
        }
    }

    public function valuecar(request $request, $id) {
        $carsModelData = DB::table('cars_model')->select('*')->where('id', '=', $id)->get();
        if ($this->lang == 'ar') {
            $carsBran = car_brand::lists('name_ar', 'id');
            $carsBran->prepend('اختيار', 'اختيار');
            $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('valuecar_ar', compact('contactUsData', 'carsBran','carsModelData'));
        } else {
            $carsBran = car_brand::lists('name_en', 'id');
            $carsBran->prepend('Select', 'Select');
            $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('valuecar_en', compact('contactUsData', 'carsBran','carsModelData'));
        }
    }

    public function contact_us(request $request) {
        $carsModelMan = DB::table('car_model_main')->select('id', 'car_id', 'car_model_main_name_ar','slider_img')->get();

        if ($this->lang == 'ar') {
            $contactUsData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            $contactUsPageData = DB::table('contact_us')->select('feed_back_ar', 'address_ar', 'po_box_ar', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('contact_us_ar', compact('contactUsPageData', 'contactUsData','carsModelMan'));
        } else {
            $contactUsData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            $contactUsPageData = DB::table('contact_us')->select('feed_back_en', 'address_en', 'po_box_en', 'telephone', 'showroom_openning_hours', 'servuce_and_parts_openning_hours', 'email', 'mobile')->get();
            return view('contact_us_en', compact('contactUsPageData', 'contactUsData','carsModelMan'));
        }
    }

    public function valuecaraddlog(request $request) {
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
        return back();
    }

    public function getCarBrandModel(request $request) {
        $carBrandModel = DB::table('car_brand_model')->select('*')->where('brand_id', '=', $request->input('brandId'))->get();
        return json_encode($carBrandModel);
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
