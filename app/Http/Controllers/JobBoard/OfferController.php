<?php

namespace App\Http\Controllers\JobBoard;


use App\Http\Controllers\Controller;
use App\Models\JobBoard\Company;
use App\Models\JobBoard\Category;
use App\Models\JobBoard\Offer;
use App\Models\JobBoard\Professional;
use App\Models\JobBoard\Location;
use App\Models\Ignug\State;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    /**
     * Obtiene todas las ofertas activas dentro del rango de fecha actual.
     */
    function getAllOffers()
    {
        $now = Carbon::now();
        $offers = Offer::with('father_category')->with('children_category')
            ->with('city')->with('province')->where('state_id', '1')
            ->where('finish_date', '>=', $now->format('Y-m-d'))
            ->where('start_date', '<=', $now->format('Y-m-d'))
            ->get();
        return response()->json(['offers' => $offers], 200);
    }
/* 

    with(['father_category' => function($query) 
            { $query->where('father_category_id', ) }]) 

            */
    function getOffers(Request $request)
    {
        $now = Carbon::now();
        $offers = Offer::with('father_category')->with('children_category')
            ->with('city')->with('province')->where('state_id', '1')
            ->where('finish_date', '>=', $now->format('Y-m-d'))
            ->where('start_date', '<=', $now->format('Y-m-d'))
            ->orderby($request->field, $request->order)
            ->paginate($request->limit)
            ->get();

            /* ->with(['state' => function ($query) {
                $query->where('code', '1');
            }]) */
        return response()->json([
            'pagination' => [
                'total' => $offers->total(),
                'current_page' => $offers->currentPage(),
                'per_page' => $offers->perPage(),
                'last_page' => $offers->lastPage(),
                'from' => $offers->firstItem(),
                'to' => $offers->lastItem()
            ], 'offers' => $offers], 200);
    }

    /**
     * Para filtro avanzado de pantalla principal de ofertas.
     * yo nunca jaja
     * con with
     */
    function advancedFilterOffers(Request $request)
    {
        $data = $request->json()->all();
        $dataFilter = $data['filter'];
        $offers = Offer::where('code', '=', $dataFilter['code'])
            ->orWhere('broad_field', 'like', $dataFilter['broad_field'] . '%')
            ->orWhere('specific_field', 'like', $dataFilter['specific_field'] . '%')
            ->orWhere('position', 'like', $dataFilter['position'] . '%')
            ->orWhere('province', 'like', $dataFilter['province'] . '%')
            ->orWhere('city', 'like', $dataFilter['city'] . '%')
            ->orderby($request->field, $request->order)
            ->paginate($request->limit);
        return response()->json([
            'pagination' => [
                'total' => $offers->total(),
                'current_page' => $offers->currentPage(),
                'per_page' => $offers->perPage(),
                'last_page' => $offers->lastPage(),
                'from' => $offers->firstItem(),
                'to' => $offers->lastItem()
            ], 'offers' => $offers], 200);

    }

    /**
     * Filtro de busqueda normal, segun disponibilidad de la oferta en fecha y activo, y paginado.
     */
    function filterOffers(Request $request)
    {
        $now = Carbon::now();
        $data = $request->json()->all();
        $dataFilter = $data['filters'];
        $offers = Offer::with(['father_category' => function ($query) use($dataFilter) {
                foreach ($dataFilter['conditionsCategoryChildren'] as $key) {
                    // $i++;
                    $query->orWhere($key);
                }

                // $query->orWhere($dataFilter['conditionsCategoryFather']);
                }])
            ->with(['children_category' => function ($query) use($dataFilter) {
                // $query->orWhere($dataFilter['conditionsCategoryChildren']);
                foreach ($dataFilter['conditionsCategoryChildren'] as $key) {
                    // $i++;
                    $query->orWhere($key);
                }
                }])
            ->with(['city' => function ($query) use($dataFilter) {
                $query->orWhere($dataFilter['conditionsCity']);
                }])
            ->with(['province' => function ($query) use($dataFilter) {
                $query->orWhere($dataFilter['conditionsProvince']);
                }])
            ->orWhere($dataFilter['conditions'])
            ->where('state_id', 1)
            ->where('finish_date', '>=', $now->format('Y-m-d'))
            ->where('start_date', '<=', $now->format('Y-m-d'))
            ->orderby($request->field, $request->order)
            ->paginate($request->limit);
        return response()->json([
            'pagination' => [
                'total' => $offers->total(),
                'current_page' => $offers->currentPage(),
                'per_page' => $offers->perPage(),
                'last_page' => $offers->lastPage(),
                'from' => $offers->firstItem(),
                'to' => $offers->lastItem()
            ], 'offers' => $offers], 200);
    }

    
    /**
     * Cuenta todas las ofertas activas dentro del rango de fecha actual.
     */
    function getTotalOffers() {
        $now = Carbon::now();
        $totalOffers = Offer::where('state_id', '1')
            ->where('finish_date', '>=', $now->format('Y-m-d'))
            ->where('start_date', '<=', $now->format('Y-m-d'))
            ->count();
        return response()->json(['totalOffers' => $totalOffers], 200);
    }

    function filterOffersFields(Request $request)
    {
        $now = Carbon::now();
        $offers = Offer::where('state_id', '1')
            ->where('code', 'like', strtoupper($request->filter) . '%')
            ->OrWhere('position', 'like', '%' . strtoupper($request->filter) . '%')
            ->OrWhere('activities', 'like', strtoupper($request->filter) . '%')
            ->where('finish_date', '>=', $now->format('Y-m-d'))
            ->where('start_date', '<=', $now->format('Y-m-d'))
            ->orderby($request->field, $request->order)
            ->paginate($request->limit);
        return response()->json([
            'pagination' => [
                'total' => $offers->total(),
                'current_page' => $offers->currentPage(),
                'per_page' => $offers->perPage(),
                'last_page' => $offers->lastPage(),
                'from' => $offers->firstItem(),
                'to' => $offers->lastItem()
            ], 'offers' => $offers], 200);

    }

    // CRUD
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $offerts = Offer::with('father_category')->with('children_category')
            ->with('city')->with('province')->where('code', 'ilike', '%' . $request->search . '%')
                ->orWhere('position', 'ilike', '%' . $request->search . '%')
                ->limit(1000)
                ->get();
        } else {
            $offerts = Offer::all();
        }
        return response()->json($offerts, 200);
    }

    public function store(Request $request)
    {
        $data = $request->json()->all();
        $offer = DB::table('job_board.offers')->insert([
                "code" => $data['code'],
                "company_id" => $data['company_id'],
                "contact" => $data['contact'],
                "email" => $data['email'],
                "phone" => $data['phone'],
                "cell_phone" => $data['cell_phone'],
                "contract_type" => $data['contract_type'],
                "position" => $data['position'],
                "training_hours" => $data['training_hours'],
                "remuneration" => $data['remuneration'],
                "working_day" => $data['working_day'],
                "number_jobs" => $data['number_jobs'],
                "experience_time" => $data['experience_time'],
                "activities" => $data['activities'],
                "aditional_information" => $data['aditional_information'],
                "start_date" => $data['start_date'],
                "finish_date" => $data['finish_date'],
                "city_id" => $data['city_id'],
                "province_id" => $data['province_id'],
                "father_category_id" => $data['father_category_id'],
                "children_category_id" => $data['children_category_id'],
                "state_id" => $data['state_id']
            ]);
        return response()->json($offer, 201);
    }

    public function show(Offert $offert)
    {
        $offer = Offer::with('father_category')->with('children_category')
        ->with('city')->with('province')->findOrFail($offert)->get();
        return response()->json(['offer' => $offer], 200);
    }

    public function update(Request $request)
    {
        $data = $request->json()->all();
        $offert = Offer::find($data['id'])->update($data['offer']);
        return response()->json($offert, 201);
    }

    public function destroy(Request $request)
    {
        $offer = Offer::findOrFail($request->id);
        $offer->update([
            'state_id' => 3
        ]);
        return response()->json($offer, 201);
    }

    // CRUD END

    function finishOffer(Request $request)
    {
        try {
            $offer = Offer::findOrFail($request->id)->update([
                'state' => 'FINISHED',
            ]);
            return response()->json($offer, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function getAppliedProfessionals(Request $request)
    {
        try {
            $offer = Offer::findOrFail($request->offer_id);
            $professionals = $offer->professionals()
                ->orderby($request->field, $request->order)
                ->paginate($request->limit);
            return response()->json([
                'pagination' => [
                    'total' => $professionals->total(),
                    'current_page' => $professionals->currentPage(),
                    'per_page' => $professionals->perPage(),
                    'last_page' => $professionals->lastPage(),
                    'from' => $professionals->firstItem(),
                    'to' => $professionals->lastItem()
                ], 'professionals' => $professionals], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException  $e) {
            return response()->json($e, 405);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function validateAppliedOffer(Request $request)
    {
        try {
            $professional = Professional::where('user_id', $request->user_id)->first();
            if ($professional) {
                $appliedOffer = DB::table('job_board.offer_professional')
                    ->where('offer_id', $request->offer_id)
                    ->where('professional_id', $professional->id)
                    ->first();
                if ($appliedOffer) {
                    return response()->json(true, 200);
                } else {
                    return response()->json(false, 200);
                }
            } else {
                return response()->json(null, 404);
            }

        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 409);
        } catch (\PDOException $e) {
            return response()->json($e, 409);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function applyOffer(Request $request)
    {
        try {
            $data = $request->json()->all();
            $user = $data['user'];
            $offer = $data['offer'];
            $professional = Professional::where('user_id', $user['id'])->first();
            if ($professional) {
                $appliedOffer = DB::table('job_board.offer_professional')
                    ->where('offer_id', $offer['id'])
                    ->where('professional_id', $professional->id)
                    ->first();
                if (!$appliedOffer) {
                    $professional->offers()->attach($offer['id']);
                    return response()->json(true, 201);
                } else {
                    return response()->json(false, 201);
                }
            } else {
                return response()->json(null, 404);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException $e) {
            return response()->json($e, 409);
        } catch (\PDOException $e) {
            return response()->json($e, 409);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }

    }
}
