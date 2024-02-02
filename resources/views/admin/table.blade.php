<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORT MANAGEMENT SYSTEM FOR SITESAFETYNET</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">File</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Row -->
                @foreach ($data as $dat )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$dat->filename}}</td>
                    <td>{{$dat->email}}</td>
                    <td>{{$dat->created_at}}</td>
                    <td>
                    <a href="{{route('report.delete',$dat->id)}}" class="btn btn-danger btn-sm">Delete</a>
                   <a href="" class="btn btn-secondary btn-sm" >Send as Email </a>
                   <a href="{{$dat->filename}}" target="blank" class="btn btn-primary btn-sm">View </a>
                    </td>
                </tr>
                @endforeach

                <!-- Rows will be dynamically inserted here -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
