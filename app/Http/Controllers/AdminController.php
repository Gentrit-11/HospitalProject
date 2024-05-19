<?php namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new Doctor();
        $image = $request->file;
        $imagename = time() . '.' . $image->getClientoriginalExtension();
        $request->file->move('doctorimage', $imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->doctor_id = $request->doctor_id;
        $doctor->room = $request->room;
        $doctor->save();
        Alert::success('registered', 'Doctor is added');
        return redirect('/show_doctor')->with('success', 'Doctor is added');


    }
    public function addpatient(){
        return view('admin.add_patient');
    }
    public  function uploadPatient(Request $request){
        $pacient = new Patient();
//        $image = $request->file;
//        $imagename = time() . '.' . $image->getClientoriginalExtension();
//        $pacient->file->move('doctorimage', $imagename);
//        $pacient->image = $imagename;
        $pacient->name = $request->name;
        $pacient->last_name = $request->last_name;

        $pacient->appointment_date = $request->appointment_time;
        $pacient->disease = $request->disease;
        $pacient->save();
        Alert::success('registered', 'Patient is added');
        return redirect('/show_patient')->with('success', 'Patient is added');




    }
    public function showPatient()
    {
        // Retrieve all the doctors from the database
        $patient = Patient::all();
        // Pass the doctors to the view for displaying
        return view('admin.show_patient', ['patient' => $patient]);
    }
    public function show()
    {
        // Retrieve all the doctors from the database
        $doctor = Doctor::all();
        // Pass the doctors to the view for displaying
        return view('admin.show_doctor', ['doctor' => $doctor]);
    }


    public function editt($id)
    {
        $doctor = Doctor::where('id', '=', $id)->first();
        return view('admin.update_doctor', ['doctor' => $doctor]);

    }


    public function saveDoctor(Request $request, $id)
    {
        // Retrieve the doctor record from the database based on the provided ID
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|required|max:2048',
            'phone' => 'required|string|max:255',
            'room' => 'required|string|max:255',
        ]);

        // Get the doctor record to update
        $doctor = Doctor::findOrFail($id);

        // Update the doctor record with the new data
        $doctor->name = $validatedData['name'];
        $doctor->speciality = $validatedData['speciality'];
        $doctor->phone = $validatedData['phone'];
        $doctor->room = $validatedData['room'];
        if ($request->has('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('doctorimage/'), $filename);
            $doctor->image = $request->file('image')->getClientOriginalName();
        }

        $doctor->save();
        // Redirect back to the doctor list page with a success message
        return redirect('/show_doctor')->with('success', 'Doctor is added');
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor not found.');
        }

        $doctor->delete();
        Alert::success('registered', 'Doctor is added');
        return redirect()->back()->with('success', 'Doctor deleted successfully.');
    }

    public function add_appoinment()
    {
        $doctors = Doctor::all();


        return view('admin.appoinment', ['doctors' => $doctors]);

    }
     public function u_appoinment(Request $request)
    {
       // dd($request->all());

        $appoinment = new appointments();
        $appoinment->p_name = $request->patient_name;
      $appoinment->doctor_id = $request->doctor_id;
        $appoinment->appointment_date = $request->appointment_time;
        $appoinment->notes = $request->patient_notes;
        $appoinment->save();

        return view('admin.appoinment');

}
    public function edittPatient($id)
    {
        $patient = Patient::where('id', '=', $id)->first();
        return view('admin.update_patient', ['patient' => $patient]);

    }

    public function savePatient(Request $request, $id)
    {
        // Retrieve the doctor record from the database based on the provided ID
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'disease' => 'required|string|max:255',

        ]);


        $patient = Patient::findOrFail($id);


        $patient->name = $validatedData['name'];
        $patient->last_name = $validatedData['last_name'];
        $patient->disease = $validatedData['disease'];



        $patient->save();
        // Redirect back to the doctor list page with a success message
        return redirect('/show_patient')->with('success', 'Patient is added');
    }
    public function deletePatient($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found.');
        }

        $patient->delete();
        Alert::success('registered', 'Patient is added');
        return redirect()->back()->with('success', 'Patient deleted successfully.');
    }


}
