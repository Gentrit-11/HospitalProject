
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patient List</title>
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
            <th>last name</th>
            <th>disease</th>

            <th>appoinmtent date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($patient as $patients)
            <tr>
                <td>{{ $patients->name }}</td>
                <td>{{ $patients->last_name }}</td>

                <td>{{ $patients->disease }}</td>
                <td>{{ $patients->appointment_date }}</td>
                <td>
                    <a href="{{ url('update_patient', ['id' => $patients->id]) }}" class="update-btn">Update</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('delete_patient', ['id' => $patients->id]) }}">
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


</body>
</html>
