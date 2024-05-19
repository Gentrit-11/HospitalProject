
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctors List</title>
    <style>
        .main{

               margin-top: 60px;
            width: 100%;

        }
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;



        }

        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            color: black;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            background-color: #fff;
        }

        td img {
            max-width: 50px;
            height: auto;
            border-radius: 50%;
        }

        .update-btn {
            padding: 8px 12px;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .de{
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white;
            background-color: black;

        }

        .update-btn {
            background-color: #4CAF50;
        }



        .update-btn:hover, .de:hover {
            opacity: 0.8;
        }
        .mb-3{
            width: 50%;
        }
        .form-control{
            color: white;
        }

    </style>

</head>

<body>

<h1>Doctors List</h1>
@include('admin.css')


@include('admin.sidebar')
<!-- partial -->
@include('admin.navbar');
<!-- partial -->

@include('admin.script')


<div class="main">




    <table>

    <thead>
    <tr>
        <th>Name</th>
        <th>doctor_id</th>
        <th>Specialization</th>
        <th>Image</th>
        <th>Phone</th>
        <th>Room</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($doctor as $doctors)
        <tr>
            <td>{{ $doctors->name }}</td>
            <td>{{ $doctors->doctor_id }}</td>
            <td>{{ $doctors->speciality }}</td>
            <td><img src="doctorimage/{{$doctors->image}}" alt=""></td>
            <td>{{ $doctors->phone }}</td>
            <td>{{ $doctors->room }}</td>
            <td>
                <a href="{{ url('update_doctor', ['id' => $doctors->id]) }}" class="update-btn">Update</a>
            </td>
            <td>
                <form method="POST" action="{{ route('delete_doctor', ['id' => $doctors->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="de" style="background-color: #f44336">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



</div>

{{--<div class="other">--}}
{{--    <form method="POST" action="{{ url('show_doctor') }}">--}}
{{--        @csrf--}}
{{--        <div class="form">--}}
{{--            <label for="doctor_id">Doctor</label>--}}
{{--            <select class="form-control" id="doctor_id" name="doctor_id">--}}
{{--                @foreach($doctor as $doctors)--}}

{{--                    <option value="{{ $doctors->id }}">{{ $doctors->name }}</option>--}}

{{--                @endforeach--}}

{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form">--}}
{{--            <label for="patient_name">Patient Name</label>--}}
{{--            <input type="text" class="form-control" id="patient_name" name="patient_name" required>--}}
{{--        </div>--}}
{{--        <div class="form">--}}
{{--            <label for="appointment_time">Appointment Time</label>--}}
{{--            <input type="datetime-local" class="form-control" id="appointment_time" name="appointment_time" required>--}}
{{--        </div>--}}
{{--        <button type="submit" class="btn btn-primary">Add Appointment</button>--}}
{{--    </form>--}}

{{--</div>--}}

</body>
</html>
