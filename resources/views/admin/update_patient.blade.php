<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <style>
        body {
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            animation: slide-up 0.5s ease;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 1.1rem;
        }

        input[type="text"],
        select {
            display: block;
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1.1rem;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #3c8dbc;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 50px;
        }

        input[type="submit"]:hover {
            background-color: #367fa9;
        }

        @keyframes slide-up {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0px);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
{{--@include('admin.css')--}}


{{--@include('admin.sidebar')--}}
{{--<!-- partial -->--}}
{{--@include('admin.navbar');--}}
{{--<!-- partial -->--}}

{{--@include('admin.script')--}}
<h1>Edit the Patient</h1>
<form method="POST" action="{{ route('save_patient', ['id' => $patient->id]) }}" enctype="multipart/form-data">

    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $patient->name }}" required>



    <label for="last_name">Last_name:</label>
    <input type="text" name="last_name" value="{{ $patient->last_name }}" required>

    <label for="disease">Disease:</label>
    <input type="text" name="disease" value="{{ $patient->disease }}" required>
    <div class="form-group">
        <label for="appointment_time">Appointment Time</label>
        <input type="datetime-local" class="form-control" id="appointment_time" name="appointment_time" value="{{ $patient->appointment_date }}" required>
    </div>


    <input type="submit" value="Update">
</form>
</body>

</html>
