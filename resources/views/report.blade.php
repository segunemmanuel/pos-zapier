<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $transformedData['title'] }}</title>
    <!-- Bootstrap CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        .page-break {

            page-break-after: always;
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

        body {
            body {font-family: 'Arial', sans-serif; }
            font-size: {{ $transformedData['fontSize'] }}pt;
            color: {{ $transformedData['textColor'] }};
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

            .page-break {
                page-break-after: always;
            }

        body {
                font-family: 'Arial', sans-serif;
                background-color: #f8f9fa;
                color: #333;
            }

            h1, h2, h3, h4, h6 {
                color: #0056b3;
                margin-bottom: 10px;
            }
            h1 {
                font-size: 24pt;
            }
            h2 {
                font-size: 18pt;
            }
            h3 {
                font-size: 14pt;
            }
            h4 {
                font-size: 12pt;
            }
            h6 {
                font-size: 10pt;
            }
            p {
                font-size: 10pt;
                line-height: 1.6;
                color: #555;
                text-align: justify;
            }
            ul, li {
                font-size: 10pt;
                padding-left: 20px;
            }


            .checkmark {
                color: green; /* Green checkmark color */
                margin-right: 5px;
            }



            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #e9ecef;
                color: #333;
            }
            .text-warning {
                color: #ffc107 !important;
            }
            .text-muted {
                color: #6c757d !important;
            }
            img {
                width: 100%;
                height: auto;
                margin-bottom: 20px;
            }

            .left-column {
                font-weight: bold;
                font-size: 24px;
                text-transform: uppercase;
                margin-right: 20px; /* Adjust spacing as needed */
            }
            .right-column {
                text-align: left;
                font-size: 18px;
            }
            .right-column label {
                font-weight: bold;
            }
            .right-column div {
                margin-bottom: 10px; /* Adjust spacing as needed */
            }
            .container little {
                display: flex;
                height: 100vh;
                align-items: center;
                justify-content: center;
            }
    </style>
</head>







<body>
{{--  page start  --}}
    <div class="page">
            <div class="content-summary">
                <h1>Safety and Vulnerability
                    Assessment Report</h1>
            </div>
        <div class="container">
<div class="row">
    <div class="col-lg-9">
        <p>Dear School Administrators,</p>

    <p>Our students and staff's safety and security are paramount in the contemporary educational landscape. However, it is a sobering reality that many of our nation's schools were constructed at a time when these critical considerations were not at the forefront of design and planning. The result is a nationwide portfolio of educational facilities that may need more modern security standards, leaving them vulnerable to today's evolving threats.</p>

    <p>Recognizing the urgent need to address these challenges, we have leveraged state-of-the-art technology to provide a comprehensive Safety and Vulnerability Assessment through our digital site assessment mobile app, SITE|SAFETYNET℠. This digital report is not only a reflection of our commitment to employing the latest technology to safeguard our students but also a versatile tool that can be shared and utilized in various ways:</p>

    <ul>
        <li>For Discussion: Engage stakeholders in meaningful conversations about your facilities' current safety and security.</li>
        <li>Tabletop Discussions: Utilize the report in simulated exercises to explore and understand potential scenarios, fostering a culture of preparedness.</li>
        <li>Safety Triage and Improvements: Leverage the insights provided to prioritize and implement necessary enhancements to your school's safety infrastructure.</li>
    </ul>

    <p>The report you are about to review includes a detailed analysis of your school's risk identification score, demography, areas for improvement, and specific recommendations. It is meticulously designed to evaluate K-12 schools nationwide, focusing on identifying strengths, deficiencies, and weaknesses relative to school shootings, gun safety, and active shooter prevention.</p>

    <p>By embracing this digital format, we ensure a swift and efficient assessment and provide a dynamic platform that can be instrumental in formulating and executing a robust safety strategy. We can take decisive steps towards a safer and more secure educational environment.</p>

    <p>Your partnership in this vital endeavor is greatly appreciated.</p>

    <p>Sincerely,<br>
    Protecting Our Students, Inc</p>
    </div>
</div>
        </div>

    </div>
    <div class="page-break"></div>
{{--  end   --}}


<div class="page">
    <div class="container">
        <div class="row">
<div class="col-lg-12">
    <div class="content-summary">
        <h1>REPORT CONTENT SUMMARY</h1>
    </div>
    <ul>
        <li><span class="checkmark"></span>ASSESSED SCHOOL</li>
        <li><span class="checkmark"></span>SCHOOL DEMOGRAPHY</li>
        <li><span class="checkmark"></span>THREE (3) LEVELS – IMPROVEMENT AREAS</li>
        <li><span class="checkmark"></span>LEVEL(S)-IMPROVEMENT AREAS</li>
        <li><span class="checkmark"></span>RECOMMENDATIONS</li>
        <li><span class="checkmark"></span>ASSESSMENT SCORE</li>
        <li><span class="checkmark"></span>RECOMMENDATIONS</li>
        <li><span class="checkmark"></span>ABOUT</li>
    </ul>
</div>
        </div>
    </div>
</div>
<div class="page-break"></div>
{{--  end  --}}


<div class="page">
    <div class="container little">
        <div class="left-column">
            <div>Assessed School</div>
            <div>School Name:</div>
            <div>Contact Person:</div>
            <div>Phone Number:</div>
            <div>School Address:</div>
        </div>
        <div class="right-column">
            <div><label>School Name:</label> Mary High</div>
            <div><label>Contact Person:</label> james9090</div>
            <div><label>Phone Number:</label> lorem ipsum</div>
            <div><label>School Address:</label> lorem street</div>
        </div>
    </div>

</div>
<div class="page-break"></div>



























    <div class="container">

    {{--  2  --}}
    <div class="page">
        <h1 class="text-center text-warning">Introduction Section</h1>
        <h1>SiteSafetyNet Report Objectives</h1>
<ul>
  <li>Incident Prevention: Ensure the implementation of measures that prevent accidents, injuries, or hazardous incidents on-site.</li>
  <li>Compliance: Assess and ensure compliance with safety regulations, standards, and protocols established by local authorities and industry best practices.</li>
  <li>Risk Assessment: Identify potential hazards and risks present in the workplace and develop strategies to mitigate or eliminate them.</li>
  <li>Training and Education: Provide ongoing training and educational programs for employees to increase awareness and adherence to safety procedures.</li>
  <li>Safety Culture Promotion: Foster a culture of safety consciousness among all personnel, encouraging proactive participation and responsibility in maintaining a safe working environment.</li>
  <li>Continuous Improvement: Continuously evaluate safety protocols and procedures, seeking opportunities for improvement and implementing necessary changes.</li>
  <li>Emergency Preparedness: Develop and maintain emergency response plans and procedures to effectively handle unexpected incidents.</li>
  <li>Documentation and Reporting: Ensure accurate and comprehensive documentation of safety-related incidents, near misses, and corrective actions taken.</li>
  <li>Equipment and Facility Maintenance: Regularly inspect and maintain safety equipment, tools, and facilities to ensure they are in optimal working condition.</li>
  <li>Communication: Establish clear communication channels for reporting safety concerns, incidents, and suggestions for improvement among all levels of the workforce.</li>
</ul>
</div>
<div class="page-break"></div>
    {{--  end  --}}

    <div class="page">

        <h1>Data Sources for School Gun Safety Report</h1>

        <p><strong>Gun Violence Archive:</strong> A comprehensive online archive that tracks gun-related violence incidents across the United States.</p>

        <p><strong>K-12 School Shooting Database:</strong> A specialized database focusing on incidents of shootings that have occurred in K-12 schools, offering detailed information and analysis.</p>

        <p><strong>National Institute of Justice (NIJ):</strong> Governmental organization providing research and resources on gun violence, including studies, reports, and initiatives related to school safety.</p>

        <p><strong>CDC's National Center for Injury Prevention and Control:</strong> The CDC gathers data and conducts research on injuries, including those related to firearms and school safety.</p>

        <p><strong>Everytown for Gun Safety:</strong> Advocacy group offering data, research reports, and policy analysis related to gun safety, including school-related incidents.</p>

        <p><strong>Bureau of Justice Statistics (BJS):</strong> Collects and analyzes data on crime, including firearm-related incidents, which can provide insights into school safety.</p>

        <p><strong>Sandy Hook Promise:</strong> Organization focused on preventing gun violence in schools, offering research reports, educational resources, and programs related to school safety.</p>

        <p><strong>Local Law Enforcement Agencies:</strong> Contacting local police departments or sheriff's offices can provide access to incident reports and data specific to the region or community.</p>
    </div>
    <div class="page-break"></div>

    {{--  end   --}}

{{--  start  --}}
    <div class="page">
    <h6>Visualizations Insights</h6>
    <div class="row">
        <div class="col-md-12">
                   {{--  <img src="{{ asset('images/51278149-b4bd-4b76-8fac-be23340f3081.png') }}" class="img-responsive" alt="image">  --}}
                   <img src="data:image/png;base64,{{ $base64ImagePie }}" alt="Graph">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <p>The presented pie chart illustrates the breakdown of school shootings across different school levels, which is a critical demographic component of the overall safety assessment. The data underscores a disproportionately high number of incidents occurring at the high school level, which necessitates targeted interventions.</p>
            <p><strong>School Type Breakdown:</strong></p>
<p><em>Elementary (19.4%) and Middle (10.4%) Schools:</em> These education levels, while accounting for a significant portion of incidents, have distinct security requirements owing to the different developmental stages of their students. Safety strategies here should focus on preventive measures, including educational and awareness programs designed for young learners.</p>

<p><em>High Schools (62.7%):</em> The high incidence of school shootings at this level calls for stringent safety measures. It is recommended that SITE|SAFETYNET℠ assessments be utilized to reinforce security. Additionally, the integration of advanced conflict resolution and mental health support services is advised, backed by research into the contributing factors specific to this demographic.</p>

<p><em>Junior High (2.0%) and K-8 (1.9%) Schools:</em> While these levels exhibit lower incident rates, it is essential to proportionally allocate resources without neglecting safety measures. Vigilance and regular updates to safety protocols are imperative to ensure the wellbeing of these learning environments.</p>

<p><strong>Insight:</strong></p>
<p>The disparity in incident rates across school levels suggests the necessity of a hierarchical approach to safety. High schools, as the most impacted tier, should be the main focus for intensive safety measures and thorough audits. A dynamic, data-informed strategy is crucial, allowing for adaptive responses to evolving trends in school safety.</p>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                   <img src="data:image/png;base64,{{ $base64Image2  }}" alt="Graph">
        </div>
    </div>

    {{--  end  --}}
    <div class="row">
        <div class="col-md-12">
            <p>Breakdown of incidences by school level</p>
                   <img src="data:image/png;base64,{{ $base64ImageSchoolIncidence  }}" alt="Graph">
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <p><strong>School Type Breakdown:</strong></p>
<p><em>Elementary (19.4%) and Middle (10.4%) Schools:</em> These education levels, while accounting for a significant portion of incidents, have distinct security requirements owing to the different developmental stages of their students. Safety strategies here should focus on preventive measures, including educational and awareness programs designed for young learners.</p>

<p><em>High Schools (62.7%):</em> The high incidence of school shootings at this level calls for stringent safety measures. It is recommended that SITE|SAFETYNET℠ assessments be utilized to reinforce security. Additionally, the integration of advanced conflict resolution and mental health support services is advised, backed by research into the contributing factors specific to this demographic.</p>

<p><em>Junior High (2.0%) and K-8 (1.9%) Schools:</em> While these levels exhibit lower incident rates, it is essential to proportionally allocate resources without neglecting safety measures. Vigilance and regular updates to safety protocols are imperative to ensure the wellbeing of these learning environments.</p>

<p><strong>Insight:</strong></p>
<p>The disparity in incident rates across school levels suggests the necessity of a hierarchical approach to safety. High schools, as the most impacted tier, should be the main focus for intensive safety measures and thorough audits. A dynamic, data-informed strategy is crucial, allowing for adaptive responses to evolving trends in school safety.</p>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
                   <img src="data:image/png;base64,{{ $base64Image3  }}" alt="Graph">
        </div>
    </div>
<div class="row">
    <div class="col-lg-8">
        <p><strong>Time Period When Shooting Occurred:</strong></p>
<p>The data indicates a need for heightened security during dismissal (431 incidents) and sports events (321 incidents), which are the timeframes with the highest occurrence of shootings. Continuous protective measures are also warranted during school hours, especially in the afternoon class period (280 incidents).</p>

<p><strong>Recommendations:</strong></p>
<p>Strategic deployment of security resources during peak times and consistent safety protocols throughout the school day can mitigate risks. Inclusive safety education for the school community is also crucial for preparedness and prevention.</p>
    </div>
</div>
    </div>
  <div class="page-break"></div>

        {{--  end  --}}


    <div class="page">
        <h2 class="text-center text-warning">LEVEL(S) IMPROVEMENTS AREAS</h2>
        <h2 class="text-center text-warning">{{ $transformedData['data']['courseName'] }}</h2>

    </div>
    <div class="page-break"></div>


    {{--  end of page  --}}
        <div class="page">
            <h3 class="text-center">School Demographics</h3>
        <table>
            <tr>
                <th>School Address</th>
                <td>{{ ucfirst(strtolower($transformedData['data']['schoolAddress'] ?? '')) }}</td>

            </tr>
            <tr>
                <th>Enrollment</th>
                <td>{{ ucfirst(strtolower($transformedData['data']['enrollment'] ?? '')) }}</td>
            </tr>
            <tr>
                <th>Geolocation</th>
                <td>{{ ucfirst(strtolower($transformedData['data']['geolocation'] ?? '')) }}</td>

            </tr>

            <tr>
                <th>Level</th>
                <td>{{ ucfirst(strtolower($transformedData['data']['level'] ?? '')) }}</td>

            </tr>
            <tr>
                <th>Square Feet</th>
                <td>{{ $transformedData['data']['squareFeet'] }}</td>

            </tr>
            <tr>
                <th>Course Name</th>
                <td>{{ ucfirst(strtolower($transformedData['data']['courseName'] ?? '')) }}</td>

            </tr>
            <tr>
                <th>Contact Person</th>
                <td>{{ ucfirst(strtolower($transformedData['data']['fullName'] ?? '')) }}</td>

            </tr>
            <!-- Other school details can be added here -->
        </table>
    </div>
    <div class="page-break"></div>
    {{--  end of page   --}}


        <!-- Content for page 1 -->

        <h2 class="text-warning text-center">Recommendations</h2>
        @foreach ($transformedData['data']['quizName'] as $index => $quizName)

 <div class="page">
            <div>
                <h4>{{ $quizName }}</h4>
                {{--  {{dd($transformedData['data']['score'][$index])}};  --}}
                <p><strong>Score:</strong> {{ $transformedData['data']['score'][$index]['score'] ?? 'N/A' }}</p>
                @if(isset($transformedData['data']['actionPlans'][$index]))
                    <p><strong>Action Plan:</strong></p>
                    @php
                        $actionPoints = explode("\n", $transformedData['data']['actionPlans'][$index]);
                    @endphp
                    @foreach($actionPoints as $point)
                        @php
                            $point = trim(str_replace('•', '', $point));
                        @endphp
                        @if($point)
                            <li>{{ $point }}</li>
                        @endif
                    @endforeach
                @else
                    <p>N/A</p>
                @endif
            </div>
        </div>
        <div class="page-break"></div>
        @endforeach

        <div class="page">
 <div class="page">
    <h2 class="text-warning text-center">KEY FOCUS AREAS FOR K-12 SCHOOL SAFETY AND
        SECURITY: EXPANDING ACTIVE SHOOTER PREVENTION</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla, quod praesentium! Repudiandae itaque, illum inventore mollitia omnis minus. Doloremque dolores architecto praesentium est expedita ea voluptatibus ab consequatur rem veniam?</p>

                    <!-- Display the chart as a base64-encoded image -->
                    <img src="data:image/png;base64,{{ $base64Image }}" alt="Graph">

        </div>
<div class="page-break"></div>

<div class="page">
    <!-- Other content... -->
    <h2 class="text-warning text-center">
        ENHANCING SCHOOL SAFETY:
        SCORING ACTIVE SHOOTER
        MEASURES
    </h2>
    <div class="container">
        <div class="row">
<div class="col-xs-10">

</div>
        </div>
    </div>
        <p>A total overall assessment score is calculated for each facility postassessment. In addition, the SITE|SAFETYNET℠ App scores
            each of the Three (3) Levels from 0 and 100 in the Top Priorities
            Chart, with 100 representing a school with ideal security. The
            scores are calculated using our analytic t e a m’ s assessment
            test, a well-established decision support method. In general, a grade
            of 90-100 represents a facility that offers optimal security, a grade of
            80-89 represents a facility that meets most security standards, a
            grade of 60-79 represents a facility that is lacking in significant
            areas of security, and a grade of < 60 represents a facility that is in
            serious need of critical security updates. The scoring methodology
            allows for effectively comparing all types of schools on the same
            scale to provide a school district with an overall picture of its
            portfolio’s needs. Even though there are different types of
            schools and supporting facilities, all facilities are graded on a
            similar set of factors and performance ratings using each school
            demography.
            In addition to a total overall score, facilities receive a subtotal
            score in each of the three (3) Levels. This enables comparisons
            between school facilities in these areas to determine
            consistency or priority throughout the district</p>


</div>
<div class="page-break"></div>
<div class="page">
    <div class="container">
        <div class="row">
<div class="col-xs-10">
    <p>
        ABOUT PROTECTING OUR STUDENTS
        Protecting Our Students, Inc. is a School Gun Safety Partner
        Coalition. Our mission is straightforward: To help reduce and end K-
        12 school shootings. Getting there takes work, but we’re dedicated to
        implementing our d i g i t a l SITE|SAFETYNET℠ mobile “Risk
        Assessment” app in every school nationwide. We build partnerships with
        educational institutions, public and private consultants, including
        Certified School Safety Professionals, School Security & Crises
        Preparedness Specialist, Law Enforcement, and Government Ag

    </p>
</div>
        </div>
    </div>
<div class="page-break"></div>


</body>
</html>
