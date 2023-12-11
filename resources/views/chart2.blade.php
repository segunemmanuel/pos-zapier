<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chart Display</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always; /* This will enforce a page break for printing */
        }

        .recommendation-section {
            background-color: rgb(14, 86, 112);
            color: #ffffff; /* White text for contrast */
            width: 1000px; /* Set width to 100% of the parent element */
            margin-left: -33.33%;
            margin-right: -33.33%;
            padding: 20px 0; /* Padding at the top and bottom */
            box-sizing: border-box;
          }
    </style>
</head>
<body>
    {{--  Title page  --}}

    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Visualizations for school</h1>

                </div>
            </div>

        </div>
    </div>

    <div class="page-break"></div> <!-- This will enforce a page break -->

    {{--  End of title page  --}}


    {{--  Page 1  --}}

    <div class="page">

        <div class="recommendation-section">
            <h6 class="text-center">Comprehensive Analysis of School Safety Trends and Incident Patterns : Historic Data</h6>
        </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                    {{--  School shooting by relationship of shooter to school  --}}
                    <img src="data:image/png;base64,{{ $base64Image2 }}" alt="Graph" style="width: 100%; height: auto;">

                </div>
            </div>

            <div class="row">
                <div class="col-md-9">


                </div>
            </div>
        </div>
    </div>

    <div class="page-break"></div> <!-- This will enforce a page break -->

    {{--  End of Page 1  --}}

    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>School incidence breakdown</p>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p>School shooting by type</p>

                </div>
            </div>
        </div>
    </div>

    <div class="page-break"></div> <!-- This will enforce a page break -->

</body>
</html>
          {{--  <img src="path-to-your-logo.png" alt="Protecting Our Students Logo" class="logo">  --}}
