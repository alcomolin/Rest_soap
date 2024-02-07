<?php

namespace App\Http\Controllers\Wdsl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisaninweb\SoapWrapper\SoapWrapper;

class SoapController extends Controller
{

    protected $soapWrapper;
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request('year')) {
            die("year required");
        }
        $this->soapWrapper->add('Holidays', function ($service) {
            $service
                ->wsdl('http://kayaposoft.com/enrico/ws/v2.0/index.php?wsdl')
                ->trace(true);
        });
        $results = $this->soapWrapper->call('Holidays.getHolidaysForYear', [[
            'year' => request('year')
        ]]);
        echo "<pre>";
        foreach ($results->holiday as $result) {
            echo "<strong>" . $result->name->text . "</strong>: " . $result->holidayType . "(" . $result->date->day . '/' . $result->date->month . '/' . $result->date->year . ")" . "<br/>";
        }
        echo "</pre>";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
