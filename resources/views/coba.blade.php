<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>no</th>
                <th>kriteria</th>
                <th>sub_kriteria</th>
                <th>nilai_profil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai_profils as $nilai)
                <tr>
                    <td>{{ $nilai->id }}</td>
                    <td>{{ $nilai->dataranges->kriteria->name }}</td>
                    <td>{{ $nilai->dataranges->nama_sub_kriteria }}</td>
                    <td>{{ $nilai->dataranges->nilai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>