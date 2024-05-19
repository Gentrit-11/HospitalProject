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
            color: black !important;

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

        @media screen and (max-width: 600px) {

            input[type=text],
            input[type=tel],
            input[type=number],
            select {
                width: 100%;
                margin: 8px 0;
                color: black;
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
        <h1>Doctor Registration Form</h1>
        <form action="{{ url('upload_doctor') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="room">Room Number:</label>
            <input type="number" id="room" name="room" required>

            <label for="d_id">doctor_id:</label>
            <input type="text" id="doctor_id" name="doctor_id" required>



            <label for="specialization">Specialization:</label>
            <select id="specialization" name="speciality" required>
                <option value="">-- Select Specialization --</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Dermatology">Dermatology</option>
                <option value="Endocrinology">Endocrinology</option>
                <option value="Gastroenterology">Gastroenterology</option>
                <option value="Neurology">Neurology</option>
                <option value="Ophthalmology">Ophthalmology</option>
                <option value="Orthopedics">Orthopedics</option>
                <option value="Pediatrics">Pediatrics</option>
                <option value="Psychiatry">Psychiatry</option>
                <option value="Radiology">Radiology</option>
                >
            </select>

            <label for="image">Image:</label>
            <input type="file" id="image" name="file" accept="image/*" required>

            <input type="submit" value="Register">
        </form>
    </div>


</div>
</body>
</head>

</html>
