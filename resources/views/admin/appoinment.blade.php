<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        form {
            margin: 50px auto;
            max-width: 600px;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            animation: slide-up 0.5s ease-out;
        }

        h1 {
            font-size: 32px;
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #555;
        }

        select, input[type="text"], input[type="datetime-local"] {
            display: block;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-out;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #0069d9;
        }

        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .area{
            width: 100%;
            height: 70px;
        }
    </style>






</head>

<!-- partial -->

<body>

<form action="{{ url('appoinment') }}" method="post" >
    @csrf

    <div class="form-group">
        <label for="doctor_id">Doctor</label>
        <select class="form-control" id="doctor_id" name="doctorid">
            @foreach($doctors as $doctor)

                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach

        </select>
        <label for="doctor_id">id</label>
        <select class="form-control" id="id" name="doctor_id">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" name="doctor_id">{{ $doctor->doctor_id }} </option>
            @endforeach

        </select>
        <label for="doctor_id">Specialization</label>
        <select class="form-control" id="doctor_id" name="doctorid">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->speciality }}</option>
            @endforeach

        </select>
    </div>
</form>
<form action="{{ url('upload_appoinment') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="patient_name">Patient Name</label>
        <input type="text" class="form-control" id="patient_name" name="patient_name" required>
    </div>
    <div class="form-group">
        <label for="appointment_time">Appointment Time</label>
        <input type="datetime-local" class="form-control" id="appointment_time" name="appointment_time" required>
    </div>
    <div class="form-group">
        <label for="appointment_time">Notes</label>
     <textarea class="area" id="patient_notes" name="patient_notes" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Appointment</button>
</form>





    </body>
</head>

</html>
