<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thesis;
use Illuminate\Support\Facades\App;

class ThesisController extends Controller
{
    public function getThesisCreationView() {
        return view('create-thesis');
    }

    public function createThesis(Request $request) {

        $thesis = new Thesis();
        $thesis->name_en = $request->name;
        $thesis->thesis_problem = $request->thesis_problem;
        $thesis->study_type = $request->study_type;

        $thesis->save();

        return redirect('dashboard');
    }

    public function makeApplication(Request $request) {
        $applicant = $request->user();
        $selectedThesis = tHESIS::findOrFail($request->thesis_id);

        $applicant->theses()->attach($selectedThesis);

        return redirect('dashboard');
    }

    public function getApplicationsForThesis($thesis_id) {
        $thesis = Thesis::findOrFail($thesis_id);
        $students = $thesis->users()->get();
        return view('thesis-applications', ['students' => $students, 'thesis' => $thesis]);
    }

    public function acceptApplication(Request $request) {
        $thesis_id = $request->thesis_id;

        $thesis = Thesis::findOrFail($thesis_id);
        $thesis->available = false;
        $thesis->save();

        return redirect('dashboard');

    }
}
