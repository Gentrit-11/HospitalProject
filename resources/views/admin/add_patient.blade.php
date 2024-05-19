<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-top: 0;
            color: black;
        }

        input[type=text],
        input[type=tel],
        input[type=number],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;

            border-radius: 4px;
            background-color: #f2f2f2;
            font-size: 16px;
            color: black;
        }

        select option {
            color: black;

        }

        input[type=submit] {

            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;

        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: black;
        }

        input[type="file"] {
            color: black;
        }
        #appointment_time{
            color: black;
        }

        @media screen and (max-width: 600px) {

            input[type=text],
            input[type=tel],
            input[type=number],
            select {
                width: 100%;
                margin: 8px 0;
            }
        }
    </style>
@include('admin.css')


@include('admin.sidebar')
<!-- partial -->
    @include('admin.navbar');
    <!-- partial -->

@include('admin.script')




<!-- partial -->


    <div class="container-fluid page-body-wrapper">


        <div class="container">

            @include('sweetalert::alert')
            <h1>Patient Registration Form</h1>
            <form action="{{ url('upload_patient') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="name">Surname:</label>
                <input type="text" id="surname" name="last_name" required>
                <label for="name">disease:</label>
                <input type="text" id="dissease" name="disease" required>

{{--                <label for="phone">Phone:</label>--}}
{{--                <input type="tel" id="phone" name="phone" required>--}}


{{--                <label for="d_id">doctor_id:</label>--}}
{{--                <input type="text" id="doctor_id" name="doctor_id" required>--}}

                <div class="form-group">
                    <label for="appointment_time">Appointment Time</label>
                    <input type="datetime-local" class="form-control" id="appointment_time" name="appointment_time" required>
                </div>


{{--                <label for="image">Image:</label>--}}
{{--                <input type="file" id="image" name="file" accept="image/*" required>--}}

                <input type="submit" value="Register">
            </form>
        </div>


    </div>
    </body>
</head>

</html>
