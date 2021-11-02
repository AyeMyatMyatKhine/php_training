<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retrieve Data using raw query</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <h4>Search Employee data between</h4>
            </div>
            <form action="{{ route('show') }}" method="get" class="form-inline">
                <label for="" class="mr-2">First Date:</label> <br>
                <input type="date" name="firstDate" required class="form-control mr-2">
                <label for="" class="mr-2">Second Date:</label><br>
                <input type="date" name="secondDate" required class="form-control mr-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        @isset($employee)
            <div class="row">
                <div class="col-md-10 offset-1 mt-5">
                    <table class="table table-hover text-center border">
                        <thead class="text-primary">
                            <th>Name</th>
                            <th>Region</th>
                            <th>City</th>
                            <th>Date Of Joining</th>
                            <th>Department</th>
                        </thead>
                        <tbody>
                            @forelse($employee as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->region }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->dateOfJoin }}</td>
                                <td>{{ $item->department }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" >No Record</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endisset
    </div>
</body>
</html>
