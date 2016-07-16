<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\contact_us;
use App\cars;
use App\cars_model;
use App\car_model_main;
use App\cars_model_other_details_mode;
use App\car_brand;
use App\car_brand_model;
use App\value_car;
use App\test_drive;
use App\car_offers_images;
use Illuminate\Support\Facades\DB;
use App\subscriber;
use App\contact_log;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('master');
    }

    public function contact() {
        $contactData = contact_us::find(1);
        return view('contact.contact', compact('contactData'));
    }

    public function contactPost(request $request) {
        $conta = new contact_us();
        $conta = contact_us::firstOrNew(array('id' => 1));
        $conta->feed_back_ar = $request->input('feedBack_arabic');
        $conta->feed_back_en = $request->input('feedBack_english');
        $conta->address_ar = $request->input('Address_arabic');
        $conta->address_en = $request->input('Address_english');
        $conta->po_box_ar = $request->input('POBox_arabic');
        $conta->po_box_en = $request->input('POBox_english');
        $conta->telephone = $request->input('Tel_Office');
        $conta->showroom_openning_hours = $request->input('showroom_openning_hours');
        $conta->servuce_and_parts_openning_hours = $request->input('servuce_and_parts_openning_hours');
        $conta->email = $request->input('email');
        $conta->mobile = $request->input('mobile');
        $conta->save();
        return back();
    }

    public function cars() {
        $cars = cars::get();
        $allCars = cars::lists('name_en', 'id');
        return view('cars.cars', compact('cars', 'allCars'));
    }

    public function carchangeImg(request $request) {
        if ($request->file('change_main_car_image') != '') {
            $imageName = $request->file('change_main_car_image')->getClientOriginalName();
            $request->file('change_main_car_image')->move(
                    base_path() . '/public/carimages/', $imageName
            );
            $id = $request->input('carId_img');
            $car = new cars();
            $car = cars::firstOrNew(array('id' => $id));
            $car->main_img = '/carimages/' . $imageName;
            $car->save();
        }
        return back();
    }

    public function carmodelmainchangeImgSlider(request $request) {
        if ($request->file('change_car_model_slider') != '') {
            $imageName = $request->file('change_car_model_slider')->getClientOriginalName();
            $request->file('change_car_model_slider')->move(
                    base_path() . '/public/sliders/', $imageName
            );
//            var_dump($imageName); die();
            $id = $request->input('car_model');
            $carModelMain = new car_model_main();
            $carModelMain = car_model_main::firstOrNew(array('id' => $id));
            $carModelMain->slider_img = '/sliders/' . $imageName;
            $carModelMain->save();
        }
        return back();
    }

    public function addCarModelMain(request $request) {
        if ($request->file('slider_img') != '') {
            $imageName = $request->file('slider_img')->getClientOriginalName();
            $request->file('slider_img')->move(
                    base_path() . '/public/sliders/', $imageName
            );
            car_model_main::create([
                'car_id' => $request->input('carId'),
                'car_model_main_name_en' => $request->input('name_english'),
                'car_model_main_name_ar' => $request->input('name_arabic'),
                'slider_img' => '/sliders/' . $imageName
            ]);
            return back();
        }
        car_model_main::create([
            'car_id' => $request->input('carId'),
            'car_model_main_name_en' => $request->input('name_english'),
            'car_model_main_name_ar' => $request->input('name_arabic')
        ]);
        return back();
    }

    public function carsmodelmain(request $request) {
        $carsModelMain = car_model_main::get();
        $cars = cars::lists('name_en', 'id');
        $carsModelMainData = car_model_main::lists('car_model_main_name_en', 'id');
        return view('carsModelMain.carsModelMain', compact('carsModelMain', 'cars', 'carsModelMainData'));
    }

    public function addCar(request $request) {
        if ($request->file('upload_main_car_image') != '') {
            $imageName = $request->file('upload_main_car_image')->getClientOriginalName();
            $request->file('upload_main_car_image')->move(
                    base_path() . '/public/carimages/', $imageName
            );

            cars::create([
                'name_ar' => $request->input('name_arabic'),
                'name_en' => $request->input('name_english'),
                'main_img' => '/carimages/' . $imageName,
            ]);
            return back();
        } else {
            cars::create([
                'name_ar' => $request->input('name_arabic'),
                'name_en' => $request->input('name_english')
            ]);
            return back();
        }
    }

    public function deleteCar(request $request) {
        $carModelId = DB::table('cars_model')->select('id')->where('car_id', '=', $request->input('carId'))->get();
        if (isset($carModelId[0]->id))
            test_drive::where('car_model_offer_id', $carModelId[0]->id)->delete();
        foreach ($carModelId as $car) {
            car_offers_images::where('car_offer_id', $car->id)->delete();
        }
        cars_model_other_details_mode::where('car_id', $request->input('carId'))->delete();
        cars_model::where('car_id', $request->input('carId'))->delete();
        car_model_main::where('car_id', $request->input('carId'))->delete();
        cars::where('id', $request->input('carId'))->delete();
        return json_decode('1');
    }

    public function deleteCarModelMain(request $request) {
        $carModelOfferId = DB::table('cars_model')->select('id')->where('car_model_id', '=', $request->input('carId'))->get();
        if (isset($carModelOfferId[0]->id))
            test_drive::where('car_model_offer_id', $carModelOfferId[0]->id)->delete();
        cars_model::where('car_model_id', $request->input('carId'))->delete();
        car_model_main::where('id', $request->input('carId'))->delete();
        return json_decode('1');
    }

    public function deleteCarModelOffer(request $request) {
        test_drive::where('car_model_offer_id', $request->input('carId'))->delete();
        car_offers_images::where('car_offer_id', $request->input('carId'))->delete();
        cars_model_other_details_mode::where('car_model_id', $request->input('carId'))->delete();
        cars_model::where('id', $request->input('carId'))->delete();
        return json_decode('1');
    }

    public function carsModel() {
        $carsModel = cars_model::get();
        $carsModelOffersList = cars_model::lists('name_en', 'id');
        $cars = cars::lists('name_en', 'id');
        $carsModelMain = car_model_main::lists('car_model_main_name_en', 'id');
        return view('carsModel.carsModel', compact('cars', 'carsModel', 'carsModelMain', 'carsModelOffersList'));
    }

    public function changecarmodelofferimgs(request $request) {

        if ($request->file('change_img') != '' && $request->file('change_slider') != '') {
            $imageName = $request->file('change_img')->getClientOriginalName();
            $request->file('change_img')->move(
                    base_path() . '/public/carmodelofferimg/', $imageName
            );
            $sliderName = $request->file('change_slider')->getClientOriginalName();
            $request->file('change_slider')->move(
                    base_path() . '/public/carmodelofferimgslider/', $sliderName
            );
            $id = $request->input('car_model_offer');
            $car = new cars_model();
            $car = cars_model::firstOrNew(array('id' => $id));
            $car->img_slider = 'carmodelofferimg/' . $imageName;
            $car->img_slider_slider = 'carmodelofferimgslider/' . $sliderName;
            $car->save();
        } else if ($request->file('change_img') != '') {
            $imageName = $request->file('change_img')->getClientOriginalName();
            $request->file('change_img')->move(
                    base_path() . '/public/carmodelofferimg/', $imageName
            );
            $id = $request->input('car_model_offer');
            $car = new cars_model();
            $car = cars_model::firstOrNew(array('id' => $id));
            $car->img_slider = 'carmodelofferimg/' . $imageName;
            $car->save();
        } else if ($request->file('change_slider') != '') {
            $sliderName = $request->file('change_slider')->getClientOriginalName();
            $request->file('change_slider')->move(
                    base_path() . '/public/carmodelofferimgslider/', $sliderName
            );
            $id = $request->input('car_model_offer');
            $car = new cars_model();
            $car = cars_model::firstOrNew(array('id' => $id));
            $car->img_slider_slider = 'carmodelofferimgslider/' . $sliderName;
            $car->save();
        }
        return back();
    }

    public function carsModelImg() {
        $carsmodeldata = DB::table('car_offers_images')
                ->join('cars_model', 'car_offers_images.car_offer_id', '=', 'cars_model.id')
                ->select('car_offers_images.*', 'cars_model.name_en')
                ->get();





        $carsModelOffers = cars_model::lists('name_en', 'id');
//        $carsmodeldata = car_offers_images::get();
        return view('carsModelImg.carsModelImg', compact('carsModelOffers', 'carsmodeldata'));
    }

    public function caroffermodelimg(request $request) {

        if ($request->file('upload_image') != '') {
            $imageName = $request->file('upload_image')->getClientOriginalName();
            $request->file('upload_image')->move(
                    base_path() . '/public/carmodeloffermultiimg/', $imageName
            );
        }

        if ($request->file('upload_image_slider') != '') {
            $imageName2 = $request->file('upload_image_slider')->getClientOriginalName();
            $request->file('upload_image_slider')->move(
                    base_path() . '/public/carmodeloffermultiimgslider/', $imageName2
            );
        }
        if ($request->file('upload_image_slider') != '' && $request->file('upload_image') != '') {
            car_offers_images::create([
                'car_offer_id' => $request->input('carId'),
                'path' => 'carmodeloffermultiimg/' . $imageName,
                'path_slider' => 'carmodeloffermultiimgslider/' . $imageName2
            ]);
        } else if ($request->file('upload_image_slider') != '') {
            car_offers_images::create([
                'car_offer_id' => $request->input('carId'),
                'path_slider' => 'carmodeloffermultiimgslider/' . $imageName2
            ]);
        } else if ($request->file('upload_image') != '') {
            car_offers_images::create([
                'car_offer_id' => $request->input('carId'),
                'path' => 'carmodeloffermultiimg/' . $imageName
            ]);
        }
        return back();
    }

    public function addCarModel(request $request) {

        if ($request->file('upload_car_model_offer_image') != '' && $request->file('upload_car_model_offer_image_slider') != '') {

            $imageName = $request->file('upload_car_model_offer_image')->getClientOriginalName();
            $request->file('upload_car_model_offer_image')->move(
                    base_path() . '/public/carmodelofferimg/', $imageName
            );

            $imageName2 = $request->file('upload_car_model_offer_image_slider')->getClientOriginalName();
            $request->file('upload_car_model_offer_image_slider')->move(
                    base_path() . '/public/carmodelofferimgslider/', $imageName2
            );
            $carsModelinsert = cars_model::create([
                        'car_id' => $request->input('carId'),
                        'car_model_id' => $request->input('car_model'),
                        'name_ar' => $request->input('name_arabic'),
                        'name_en' => $request->input('name_english'),
                        'engine' => $request->input('engine'),
                        'fuel_type' => $request->input('fuel_type'),
                        'model_year' => $request->input('model_year'),
                        'paint_colour' => $request->input('paint_colour'),
                        'interior_color' => $request->input('interior_color'),
                        'body_style' => $request->input('body_style'),
                        'mileage' => $request->input('mileage'),
                        'num_of_doors' => $request->input('num_of_doors'),
                        'power' => $request->input('power'),
                        'hand_of_drive' => $request->input('hand_of_drive'),
                        'torque' => $request->input('torque'),
                        'maximum_speed' => $request->input('maximum_speed'),
                        'acceleration' => $request->input('acceleration'),
                        'transmission' => $request->input('transmission'),
                        'price' => $request->input('price'),
                        'img_slider' => 'carmodelofferimg/' . $imageName,
                        'img_slider_slider' => 'carmodelofferimgslider/' . $imageName2
            ]);
        } else if ($request->file('upload_car_model_offer_image') != '') {
            $imageName = $request->file('upload_car_model_offer_image')->getClientOriginalName();
            $request->file('upload_car_model_offer_image')->move(
                    base_path() . '/public/carmodelofferimg/', $imageName
            );

            $carsModelinsert = cars_model::create([
                        'car_id' => $request->input('carId'),
                        'car_model_id' => $request->input('car_model'),
                        'name_ar' => $request->input('name_arabic'),
                        'name_en' => $request->input('name_english'),
                        'engine' => $request->input('engine'),
                        'fuel_type' => $request->input('fuel_type'),
                        'model_year' => $request->input('model_year'),
                        'paint_colour' => $request->input('paint_colour'),
                        'interior_color' => $request->input('interior_color'),
                        'body_style' => $request->input('body_style'),
                        'mileage' => $request->input('mileage'),
                        'num_of_doors' => $request->input('num_of_doors'),
                        'power' => $request->input('power'),
                        'hand_of_drive' => $request->input('hand_of_drive'),
                        'torque' => $request->input('torque'),
                        'maximum_speed' => $request->input('maximum_speed'),
                        'acceleration' => $request->input('acceleration'),
                        'transmission' => $request->input('transmission'),
                        'price' => $request->input('price'),
                        'img_slider' => 'carmodelofferimg/' . $imageName
            ]);
        } else if ($request->file('upload_car_model_offer_image_slider') != '') {
            $imageName2 = $request->file('upload_car_model_offer_image_slider')->getClientOriginalName();
            $request->file('upload_car_model_offer_image_slider')->move(
                    base_path() . '/public/carmodelofferimgslider/', $imageName2
            );
            $carsModelinsert = cars_model::create([
                        'car_id' => $request->input('carId'),
                        'car_model_id' => $request->input('car_model'),
                        'name_ar' => $request->input('name_arabic'),
                        'name_en' => $request->input('name_english'),
                        'engine' => $request->input('engine'),
                        'fuel_type' => $request->input('fuel_type'),
                        'model_year' => $request->input('model_year'),
                        'paint_colour' => $request->input('paint_colour'),
                        'interior_color' => $request->input('interior_color'),
                        'body_style' => $request->input('body_style'),
                        'mileage' => $request->input('mileage'),
                        'num_of_doors' => $request->input('num_of_doors'),
                        'power' => $request->input('power'),
                        'hand_of_drive' => $request->input('hand_of_drive'),
                        'torque' => $request->input('torque'),
                        'maximum_speed' => $request->input('maximum_speed'),
                        'acceleration' => $request->input('acceleration'),
                        'transmission' => $request->input('transmission'),
                        'price' => $request->input('price'),
                        'img_slider_slider' => 'carmodelofferimgslider/' . $imageName2
            ]);
        } else {

            $carsModelinsert = cars_model::create([
                        'car_id' => $request->input('carId'),
                        'car_model_id' => $request->input('car_model'),
                        'name_ar' => $request->input('name_arabic'),
                        'name_en' => $request->input('name_english'),
                        'engine' => $request->input('engine'),
                        'fuel_type' => $request->input('fuel_type'),
                        'model_year' => $request->input('model_year'),
                        'paint_colour' => $request->input('paint_colour'),
                        'interior_color' => $request->input('interior_color'),
                        'body_style' => $request->input('body_style'),
                        'mileage' => $request->input('mileage'),
                        'num_of_doors' => $request->input('num_of_doors'),
                        'power' => $request->input('power'),
                        'hand_of_drive' => $request->input('hand_of_drive'),
                        'torque' => $request->input('torque'),
                        'maximum_speed' => $request->input('maximum_speed'),
                        'acceleration' => $request->input('acceleration'),
                        'transmission' => $request->input('transmission'),
                        'price' => $request->input('price')
            ]);
        }




        $lastId = $carsModelinsert->id;

        $details_arabic = explode(",", $request->input('details_arabic'));
        $details_english = explode(",", $request->input('details_english'));


        if (isset($details_arabic)) {
            foreach ($details_arabic as $detail_ar) {
                cars_model_other_details_mode::create([
                    'car_id' => $request->input('carId'),
                    'car_model_id' => $lastId,
                    'detail_ar' => $detail_ar
                ]);
            }
        }
        if (isset($details_english)) {
            foreach ($details_english as $detail_en) {
                cars_model_other_details_mode::create([
                    'car_id' => $request->input('carId'),
                    'car_model_id' => $lastId,
                    'detail_en' => $detail_en
                ]);
            }
        }

        return back();
    }

    public function editCarModel(request $request) {
        $imageName2 = $request->file('mainImg')->getClientOriginalName();
        $request->file('mainImg')->move(
                base_path() . '/public/carmodelofferimgslider/', $imageName2
        );
        var_dump($imageName2);
        die();
        $carModel = new cars_model();
        $carModel = cars_model::firstOrNew(array('id' => intval($request->input('id'))));
        $id = $request->input('id');
        $carModel->name_ar = $request->input('name_ar');
        $carModel->name_en = $request->input('name_en');
        $carModel->engine = $request->input('engine');
        $carModel->fuel_type = $request->input('fuel_type');
        $carModel->model_year = $request->input('model_year');
        $carModel->paint_colour = $request->input('paint_colour');
        $carModel->interior_color = $request->input('interior_color');
        $carModel->body_style = $request->input('body_style');
        $carModel->mileage = $request->input('mileage');
        $carModel->num_of_doors = $request->input('num_of_doors');
        $carModel->power = $request->input('power');
        $carModel->hand_of_drive = $request->input('hand_of_drive');
        $carModel->torque = $request->input('torque');
        $carModel->maximum_speed = $request->input('maximum_speed');
        $carModel->acceleration = $request->input('acceleration');
        $carModel->transmission = $request->input('transmission');
        $carModel->price = $request->input('price');
        $carModel->save();
        return back();
    }

    public function editCar(request $request) {
        $car = new cars();
        $car = cars::firstOrNew(array('id' => intval($request->input('id'))));
        $id = $request->input('id');
        $car->name_ar = $request->input('name_ar');
        $car->name_en = $request->input('name_en');
        $car->save();
        return back();
    }

    public function editCarModelMain(request $request) {
        $carModelMain = new car_model_main();
        $carModelMain = car_model_main::firstOrNew(array('id' => intval($request->input('id'))));
        $id = $request->input('id');
        $carModelMain->car_model_main_name_ar = $request->input('name_ar');
        $carModelMain->car_model_main_name_en = $request->input('name_en');
        $carModelMain->save();
        return back();
    }

    public function carsmodelotherdetails() {
        $otherDetails = cars_model_other_details_mode::get();
        $cars = cars::lists('name_en', 'id');
        $carsModelMain = car_model_main::lists('car_model_main_name_en', 'id');
        return view('carsmodelotherdetails.carsmodelotherdetails', compact('cars', 'carsModelMain', 'otherDetails'));
    }

    public function addcarsmodelotherdetails(request $request) {
        cars_model_other_details_mode::create([
            'car_id' => $request->input('car_Id'),
            'car_model_id' => $request->input('car_model_id'),
            'detail_ar' => $request->input('detail_arabic'),
            'detail_en' => $request->input('detail_english')
        ]);
        return back();
    }

    public function carsbrand() {
        $carBrand = car_brand::get();
        return view('carbrand', compact('carBrand'));
    }

    public function carsbrandmodel() {
        $cars = car_brand::lists('name_en', 'id');
        $carBrandModel = car_brand_model::get();
        return view('carbrandmodel', compact('carBrandModel', 'cars'));
    }

    public function deleteCarBrand(request $request) {
        car_brand::where('id', $request->input('carId'))->delete();
        return json_decode(1);
    }

    public function deleteCarOffersImgs(request $request) {
        car_offers_images::where('id', $request->input('carId'))->delete();
        return json_decode(1);
    }

    public function deleteCarBrandModel(request $request) {
        car_brand_model::where('id', $request->input('carId'))->delete();
        return json_decode(1);
    }

    public function addcarbrand(request $request) {
        car_brand::create([
            'name_en' => $request->input('name_english'),
            'name_ar' => $request->input('name_arabic')
        ]);
        return back();
    }

    public function addcarbrandmodel(request $request) {
        car_brand_model::create([
            'brand_id' => $request->input('carId'),
            'name_en' => $request->input('name_english'),
            'name_ar' => $request->input('name_arabic')
        ]);
        return back();
    }

    public function valuecarlog() {
        $valuecardata = value_car::get();
        return view('valuecarlog', compact('valuecardata'));
    }

    public function testdrivelog() {
        $testdrivedata = test_drive::get();
        return view('testdrivelog', compact('testdrivedata'));
    }

    public function testcaraddlog(request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        test_drive::create([
            'car_model_offer_id' => $request->input('id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'best_time_to_contact' => $request->input('best_time_to_contact'),
            'message' => $request->input('message')
        ]);
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
        return back();
    }

    public function contactlog() {
        $contactLogData = contact_log::get();
        return view('contactlog.contactlog', compact('contactLogData'));
    }

}
