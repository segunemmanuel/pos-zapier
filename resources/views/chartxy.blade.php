<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Safety and Vulnerability Assessment Report for {{$transformedData['title']}}</title>
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  /* Inline styles for demonstration - move to an external stylesheet in production */
  .page-break {

    page-break-after: always;
}

  body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
  }
  .container{
background: white;
  }
  .report-header, .report-footer {
    color: white;
    padding: 1rem;
    text-align: center;
  }
  .report-header {
    background-color: #007bff; /* Bootstrap primary color */
  }
  .report-body {
    padding: 1rem;
    background-color: white;
    margin-top: 1rem;
    font-size: 0.9rem;
  }
  .report-footer {
    background-color: #343a40; /* Bootstrap dark color */
    padding: 0.8rem 1rem;
    margin-top: 1rem;
    font-size: 0.8rem;
  }
  h2 {
    color:#007bff;
  }
  ul {
    padding-left: 20px;
  }
  ul li {
    margin-bottom: 0.4rem;
  }

  .little{
    color:white;
  }


.content-summary-header {
    background-color: #007bff; /* Bootstrap primary color */
    color: white;
  }

  .content-summary-body {
    background-color: white; /* Use Bootstrap's 'white' class or keep default */
    color: #212529; /* Bootstrap's default text color */
  }

  .content-summary-body ul li {
    font-size: 1rem;
  }

  .content-summary-body ul li span {
    color: #28a745; /* Bootstrap 'success' color for check marks */
    margin-right: 0.5rem;
  }


/* ... [Previous CSS styles] ... */
{{--  page 3  --}}
.container {
    max-width: 600px; /* Adjust the width as needed */
    background: none
}

.assessed-school {
    text-align: left;
    border: 1px solid #ccc; /* Light gray border */
    padding: 20px;
    background-color: #f9f9f9; /* Light background for the content */
}

.header-title {
    color: #d9534f; /* Bootstrap 'danger' color */
    margin-bottom: 1rem;
}

.info p {
    margin-bottom: 1rem; /* Spacing between lines */
    line-height: 1.5; /* Line height for better readability */
}

.logo p {
    margin-top: 2rem; /* Space above the logo */
    font-weight: bold;
}

@media print {
    .page-break {
        page-break-after: always;
    }
}


/* Previous styles */

/* School Demography Section Styles */
.school-demography-container {
    background-color: #f8f8f8; /* Light grey background */
    color: #343a40; /* Bootstrap default dark color */
    padding: 20px;
    margin-top: 20px;
    border-left: 5px solid #d9534f; /* Bootstrap 'danger' color for left border */
}

.demography-title {
    color: #d9534f; /* Bootstrap 'danger' color */
    text-align: center;
    margin-bottom: 20px;
}

.demography-item {
    margin-bottom: 10px; /* Spacing between items */
    font-size: 0.9em; /* Slightly smaller font size */
}


@media print {
    .page-break {
        page-break-after: always;
    }
}


.improvement-areas-container {
    background-color: #f8f8f8; /* Light grey background */
    padding: 20px;
    border: 1px solid #ccc; /* Add a border for the container */
}

.improvement-title {
    background-color: #d9534f; /* Bootstrap 'danger' color */
    color: white;
    padding: 5px 10px;
    display: inline-block; /* Wrap background tightly around the text */
    margin-bottom: 15px;
}

.level-section {
    background-color: #e7e7e7; /* Slightly darker grey for each level section */
    padding: 10px;
    margin-bottom: 10px; /* Spacing between each level section */
}

.level-title {
    color: #d9534f; /* Bootstrap 'danger' color for the level title */
    margin-bottom: 5px;
}

.level-section p {
    font-size: 0.9em; /* Adjust the font size as needed */
    text-align: justify; /* Justify the text for better readability */
}

@media print {
    .page-break {
        page-break-after: always;
    }
}


/* ... [Previous CSS styles] ... */

.levels-improvements-container {
    background-color: #f8f8f8; /* Light grey background */
    padding: 30px;
    margin-top: 30px;
}


.improvements-title {
    color: #d9534f; /* Bootstrap 'danger' color */
    margin-bottom: 20px;
}

.site-demo {
    color: #d9534f; /* Bootstrap 'danger' color */
    font-size: 0.9em; /* Adjust the font size as needed */
    margin-bottom: 5px; /* Spacing between lines */
}

/* ... [Previous CSS styles] ... */

.recommendations-container {
    background-color: #ffffff; /* White background */
    color: #000000; /* Black text */
    padding: 20px;
    margin-top: 20px;
    border: 2px solid #d9534f; /* Red border as seen in the image */
}

.section-title {
    color: #d9534f; /* Red color for the section title */
    background-color: #e7e7e7; /* Light grey background */
    display: inline-block;
    padding: 5px 10px;
    margin-bottom: 10px;
}

.sub-section-title {
    color: #000000; /* Black color for the subsection title */
    margin-bottom: 10px;
}

.recommendations-list {
    list-style-position: inside; /* Bullet points inside */
    padding-left: 0; /* Remove default padding */
}

.recommendations-list li {
    margin-bottom: 5px; /* Spacing between list items */
}

/* If the text is too bright or not visible clearly, you can set a semi-transparent background for the text */
.recommendations-container {
    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
}

@media print {
    .page-break {
        page-break-after: always;
    }
}

.chart-title {
    margin-bottom: 1rem;
    font-size: 1.25rem;
    color: #004085; /* Adjust the color to match your design */
}

{{--  .chart-container {
    margin-top: 1rem;
    width: 100%;

}  --}}

{{--  .chart-row {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
}  --}}

.chart-label {
    width: 30%; /* Adjust based on your preference */
    margin-right: 1rem; /* Space between label and bar */
    text-align: right;
    font-weight: bold;
    color: #004085; /* Adjust the color to match your design */
}

.chart-bar {
    height: 20px; /* Height of the bar */
    background-color: #17a2b8; /* Use a Bootstrap color or any color you prefer */
    border-radius: 3px; /* Optional: rounded corners for the bar */
}

/* Responsive design adjustments if needed */
@media (max-width: 768px) {
    .chart-label {
        width: 50%; /* Increase label width on smaller screens */
        text-align: left;
    }
}
/* Previous styles */

.scoring-section {
    background-color: #ffffff; /* White background */
    border: 1px solid #000; /* Black border */
    padding: 20px;
}

.scoring-title {
    color: #d9534f; /* Bootstrap 'danger' color or any color as per your design */
    margin-bottom: 15px;
    font-size: 1.25rem; /* Adjust as per your design */
    background-color: #e7e7e7; /* Light grey background */
    display: inline-block; /* Wrap background tightly around the text */
    padding: 0.25rem 0.5rem;
}

.scoring-text {
    color: #212529; /* Bootstrap's default text color */
    font-size: 0.9rem; /* Adjust as per your design */
    margin-bottom: 0.5rem; /* Spacing between paragraphs */
    text-align: justify; /* Justify the text for better readability */
    background-color: #e7e7e7; /* Light grey background */
    padding: 0.25rem 0.5rem;
    display: block; /* Apply background color to the full width of the text */
}

/* Previous styles */

.complete-recommendations-section {
    background-color: #f8f8f8; /* Light grey background */
    color: #004085; /* Dark blue text */
    padding: 20px;
    margin-top: 20px;
    border: 1px solid #000; /* Black border */
}

.title {
    color: #d9534f; /* Bootstrap 'danger' color or any color as per your design */
    margin-bottom: 15px;
    font-size: 1.5rem; /* Adjust as per your design */
    background-color: #e7e7e7; /* Light grey background */
    display: inline-block; /* Wrap background tightly around the text */
    padding: 0.25rem 0.5rem;
}

.intro-text, .report-credit {
    font-size: 0.9rem; /* Adjust as per your design */
    margin-bottom: 0.5rem; /* Spacing between paragraphs */
    text-align: justify; /* Justify the text for better readability */
    padding: 0.25rem 0.5rem;
    display: block; /* Apply background color to the full width of the text */
}

.score-section {
    margin-top: 10px;
}

.score-range {
    font-size: 1.25rem; /* Larger font size for score range */
    color: #000; /* Black color for the score range */
    margin-bottom: 0.25rem;
}

.action-required {
    font-size: 0.9rem; /* Smaller font size for actions */
    color: #555; /* Grey color for the actions */
    margin-bottom: 1rem;
}

.less-than-sixty {
    color: #d9534f; /* Color indicating special attention for score less than 60% */
}


/* Previous styles */

.about-section {
    background-color: #004085; /* Dark blue background */
    color: #ffffff; /* White text */
    padding: 20px;
    border-radius: 5px; /* Optional: rounded corners */
}

.about-title {
    margin-bottom: 1rem;
    font-size: 1.5rem; /* Adjust as per your design */
}

.about-text {
    font-size: 0.9rem; /* Adjust as per your design */
    margin-bottom: 1.5rem; /* Spacing between paragraphs */
    text-align: justify; /* Justify the text for better readability */
}

.contact-info {
    font-size: 0.8rem; /* Smaller font size for contact information */
    line-height: 1.4; /* Line height for better readability */
}

.website-link {
    color: #add8e6; /* Light blue color for links */
    text-decoration: none; /* Optional: remove underline from links */
}

.website-link:hover {
    text-decoration: underline; /* Re-add underline on hover for better user interaction */
}

@media print {
    .page-break {
        page-break-after: always;
    }
}






</style>
</head>
<body>

{{--  page 1  --}}
<div class="page">
    <div class="container my-3">
    <div class="report-header">
    <h1>Safety and Vulnerability Assessment Report</h1>
    </div>
    <div class="report-body">
    <h2>Dear School Administrators,</h2>
    <p>Our students and staff's safety and security are paramount in the contemporary educational landscape. However, it is a sobering reality that many of our nation's schools were constructed at a time when these critical considerations were not at the forefront of design and planning. The result is a nationwide portfolio of educational facilities that may need more modern security standards, leaving them vulnerable to today's evolving threats.</p>
    <p>Recognizing the urgent need to address these challenges, we have leveraged state-of-the-art technology to provide a comprehensive Safety and Vulnerability Assessment through our digital site assessment mobile app, SITE|SAFETYNET℠. This digital report is not only a reflection of our commitment to employing the latest technology to safeguard our students but also a versatile tool that can be shared and utilized in various ways:</p>
    <ul>
    <li><strong>For Discussion:</strong> Engage stakeholders in meaningful conversations about your facilities' current safety and security.</li>
    <li><strong>Tabletop Discussions:</strong> Utilize the report in simulated exercises to explore and understand potential scenarios, fostering a culture of preparedness.</li>
    <li><strong>Safety Triage and Improvements:</strong> Leverage the insights provided to prioritize and implement necessary enhancements to your school's safety infrastructure.</li>
    </ul>
    <p>Your partnership in this vital endeavor is greatly appreciated.</p>
    <p><strong>Sincerely,</strong><br>Protecting Our Students, Inc.</p>
    </div>

    <div class="report-footer">
    <p>DISCLAIMER: The information contained in these documents is confidential, privileged and intended only for the recipient. It may not be published or redistributed without the prior written consent of both Protecting Our Students and the recipient.</p>
    </div>
    </div>
</div>
<div class="page-break"></div>
{{--  end of page 1  --}}






{{--  page 2  --}}

<div class="page">
    <!-- New container for the Report Content Summary -->
    <div class="container my-3">
      <div class="content-summary-header bg-primary text-white p-3 rounded">
        <h2 class="text-center little">Report Content Summary</h2>
      </div>

      <div class="content-summary-body bg-light p-3 rounded">
        <ul>
          <li class="mb-2"><span class="text-primary"></span> Assessed School</li>
          <li class="mb-2"><span class="text-primary"></span> School Demography</li>
          <li class="mb-2"><span class="text-primary"></span> Three (3) Levels – Improvement Areas</li>
          <li class="mb-2"><span class="text-primary"></span> Level(s)-Improvement Areas</li>
          <li class="mb-2"><span class="text-primary"></span> Recommendations</li>
          <li class="mb-2"><span class="text-primary"></span> Assessment Score</li>
          <li class="mb-2"><span class="text-primary"></span> Recommendations</li>
          <li class="mb-2"><span class="text-primary"></span> About</li>
        </ul>
      </div>
    </div>
</div>
<div class="page-break"></div>
{{--  end of page 2  --}}








{{--  page 3  --}}
<div class="page">
    <div class="container my-4">
        <div class="assessed-school">
            <h2 class="header-title">ASSESSED SCHOOL</h2>
            <div class="info">
                <p><strong>SCHOOL NAME:</strong>{{ ucfirst(strtolower($transformedData['data']['fullName'] ?? '')) }} </p>
                <p><strong>CONTACT PERSON:</strong> {{ ucfirst(strtolower($transformedData['data']['fullName'] ?? '')) }}</p>
                <p><strong>PHONE NUMBER:</strong> 079508753453</p>
                <p><strong>SCHOOL ADDRESS:</strong> {{ ucfirst(strtolower($transformedData['data']['schoolAddress'] ?? '')) }}</p>
            </div>
            <div class="logo">
                <p>Protecting Our Students Logo</p>
            </div>
        </div>
    </div>

</div>
<div class="page-break"></div>
{{--  end of page 3  --}}











{{--  page 4  --}}

<div class="page">

<!-- School Demography Section -->
<div class="school-demography-container">
    <h2 class="demography-title">SCHOOL DEMOGRAPHY</h2>
    <p class="demography-item"><strong>{{ ucfirst(strtolower($transformedData['data']['level'] ?? '')) }}</p>
    <p class="demography-item"><strong>Geography –</strong> {{ ucfirst(strtolower($transformedData['data']['geolocation'] ?? '')) }}</p>
    <p class="demography-item"><strong>Enrollment</strong> {{ ucfirst(strtolower($transformedData['data']['enrollment'] ?? '')) }}</p>
    <p class="demography-item"><strong>Building(s) Total Sq. Ft.</strong>{{ $transformedData['data']['squareFeet'] }}</p>
    <p class="demography-item"><strong>Campus Acreage</strong></p>
</div>
</div>
<div class="page-break"></div>
<!-- Continue with other content -->
{{--  end of page  --}}




{{--  page 5  --}}
<div class="page">
    <!-- ... [Previous content] ... -->

    <!-- Improvement Areas Section -->
    <div class="improvement-areas-container">
        <h3 class="improvement-title">THREE (3) LEVEL(S) - IMPROVEMENTS AREAS</h3>

        <div class="level-section">
            <h4 class="level-title">LEVEL A: POLICE PARTNERSHIP + SAFETY POLICIES</h4>
            <p>This level assesses your existing partnerships,
                highlighting misaligned safety discrepancies and security
                metrics and establishing a solid foundation for
                continuous improvement + Conduct a detailed
                examination and analysis of existing systems and safety
                protocols and policies, ensuring their alignment with
                industry best practices and mandated regulatory
                standards.</p>
        </div>

        <div class="level-section">
            <h4 class="level-title">LEVEL B: FACILITY EXTERIOR + NEIGHBORHOOD</h4>
            <p>Carry out a comprehensive evaluation of the
                campus's exterior areas, encompassing
                entranceways, parking facilities, boundary fencing,
                and all outdoor spaces, to ensure optimal safety
                measures + Carry out a comprehensive evaluation
                of the campus's exterior areas, encompassing
                entranceways, parking facilities, boundary fencing,
                and all outdoor spaces, to ensure optimal safety
                measure!</p>
        </div>

        <div class="level-section">
            <h4 class="level-title">LEVEL C: FACILITY INTERIOR</h4>
            <p>The Comprehensive Interior Campus Evaluation is
                an extensive assessment process that meticulously
                inspects and analyzes all interior spaces within a
                school's infrastructure. This evaluation is the most
                exhaustive level of our safety audits, ensuring a
                thorough examination of every corner of the
                school's interior. By conducting a Comprehensive
                Interior Campus Evaluation, we aim to identify and
                address potential safety concerns, creating a safer
                learning environment for students and staff. This
                rigorous process is part of our commitment to
                preventing school shootings and enhancing safety.</p>
        </div>
    </div>

    <!-- ... [Continue with other content] ... -->

</div>

<div class="page-break"></div>

{{--  end of page 5  --}}


{{--  page 6  --}}

<div class="page">
    <!-- Levels Improvements Areas Section -->
    <div class="levels-improvements-container text-center">
        <h2 class="improvements-title">LEVEL(S) IMPROVEMENTS AREAS</h2>
        <p class="site-demo">SITE|SAFETYNET℠ DEMO</p>
        <p class="site-demo">{{ $transformedData['data']['courseName'] }}</p>
    </div>

</div>
<div class="page-break"></div>
{{--  end of page 6  --}}




















{{--  page 7  --}}


@foreach ($transformedData['data']['quizName'] as $index => $quizName)
<div class="page">
    <div class="recommendations-container">
        <h2 class="section-title">RECOMMENDATIONS</h2>
        <h3 class="sub-section-title">{{ $quizName }}</h3>
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
{{--  end of page 7  --}}







{{--  page 8  --}}
<div class="page">
    <div class="row">
        <div class="col-lg-12" style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
            <h2 class="chart-title text-center">ASSESSMENT SCORES VISUALIZATIONS</h2>
            <div style="text-align: center; width: 100%;">
                <!-- The graph image is placed here -->
            </div>
        </div>
    </div>
</div>
<div class="page-break"></div>
{{--  end of page 8  --}}


{{--  page 8 contd  --}}
<div class="page">
    <div class="row">
        <div class="col-lg-12" style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
            <h2 class="chart-title text-center">KEY FOCUS AREAS FOR K-12 SCHOOL SAFETY AND SECURITY: EXPANDING ACTIVE SHOOTER PREVENTION</h2>
            <div style="text-align: center; width: 100%;">
                <!-- The graph image is placed here -->
            </div>
            <p style="text-align: justify;  margin: 0 auto;">
                This pie chart illustrates the distribution of school shooting incidents across different school levels within the K-12 education system. It highlights the proportion of incidents occurring at high schools, elementary schools, middle schools, junior high schools, and combined K-8 institutions. These insights are crucial for developing targeted strategies for prevention and preparedness, aimed at enhancing safety and security across all educational environments.
            </p>
            <ul>
                <li><strong>High Schools:</strong> The data underscores the acute vulnerability of high schools to shooting incidents. Schools at this level may benefit from enhanced security measures, student support services, and threat assessment programs.</li>
                <li><strong>Elementary Schools:</strong> While less frequent, the impact of such events at elementary levels can be profound, suggesting the need for age-appropriate safety education and crisis intervention strategies.</li>
                <li><strong>Middle and Junior High Schools:</strong> These environments require tailored preventive measures that address the specific developmental stages of their students.</li>
                <li><strong>Comprehensive K-8:</strong> For schools with a K-8 structure, a unified approach to safety that caters to the wide age range of students may be necessary.</li>
            </ul>

            <ul>
                <li><strong>Risk Assessment:</strong> Your school should conduct a detailed risk assessment to identify specific vulnerabilities within their environment.</li>
                <li><strong>Safety Education:</strong> Regular drills and safety education for students and staff can prepare them for emergency situations without causing undue alarm.</li>
                <li><strong>Community Engagement:</strong> Involvement of parents and local community in safety measures can provide a broader support system for prevention efforts.</li>
                <li><strong>Mental Health Resources:</strong> Provision of mental health resources is critical to address potential issues before they escalate into violence.</li>
                <li><strong>Policy Review:</strong> A regular review of safety policies and procedures to ensure they are up to date and in line with the best practices is recommended.</li>
            </ul>
        </div>
    </div>
</div>
<div class="page-break"></div>
{{--  end of page 8  contd --}}




{{--  page 8ii contd  --}}
<div class="page">
    <div class="row">
        <div class="col-lg-12" style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
            <h2 class="chart-title text-center">KEY FOCUS AREAS FOR K-12 SCHOOL SAFETY AND SECURITY: EXPANDING ACTIVE SHOOTER PREVENTION</h2>
            <div style="text-align: center; width: 100%;">
                <!-- The graph image is placed here -->
            </div>
            <p>This pie chart provides insights into the relationship between the shooter and the school in shooting incidents. For your school's assessment and safety planning, here's an interpretation of the data:</p>

            <ul>
                <li><strong>Nonstudent:</strong> The largest segment at 26.1% suggests that the majority of shooters are not current students, highlighting the need for security measures that address external threats.</li>
                <li><strong>Former Student:</strong> 13.9% of shooters are former students, which underscores the importance of alumni tracking and awareness as part of your school's security strategy.</li>
                <li><strong>Student:</strong> Current students account for 6.2% of shooters, emphasizing the need for in-school behavioral monitoring and support systems.</li>
                <li><strong>Police Officer/SRO:</strong> A small 3.7% portion of incidents involve a school resource officer or police, which may reflect instances of response to an incident.</li>
                <li><strong>Other Staff:</strong> Other school staff are involved in 2.3% of shooting incidents, indicating a need for thorough staff screening and security training.</li>
                <li><strong>Parent:</strong> Parents are involved in 1.7% of the incidents, which could point to the necessity of secure visitor management protocols.</li>
                <li><strong>Nonstudent Using Athletic Fields:</strong> Shooters using athletic fields who are not students represent 0.8% of the incidents, suggesting the need for perimeter security and management of sports facilities.</li>
                <li><strong>Unknown:</strong> There is a 3.0% rate of incidents where the shooter's relation to the school is unknown, which highlights the need for preparedness in uncertain situations.</li>
                <li><strong>No Relation:</strong> Lastly, a notable 3.0% of shooters have no relation to the school, reinforcing the need for comprehensive security measures that cover all possible threat vectors.</li>
            </ul>

            <p>Your school might use this data to review and strengthen the security measures to protect against threats both internal and external, ensuring a safe environment for students, staff, and visitors.</p>

        </div>
    </div>
</div>
<div class="page-break"></div>
{{--  end of page 8ii contd --}}



--



{{--  page 8iii contd  --}}
<div class="page">
    <div class="row">
        <div class="col-lg-12" style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
            <h2 class="chart-title text-center">KEY FOCUS AREAS FOR K-12 SCHOOL SAFETY AND SECURITY: EXPANDING ACTIVE SHOOTER PREVENTION</h2>
            <div style="text-align: center; width: 100%;">
                <!-- The graph image is placed here -->
            </div>
                <p>The chart categorizes school shooting incidents into various time periods, showing the frequency of events during these intervals. Notably:</p>

                <ul>
                    <li><strong>Morning Classes:</strong> This time frame has the highest number of incidents, with 431 reported shootings. It indicates a critical need for heightened vigilance and preventive measures during the morning hours when classes are typically in session.</li>
                    <li><strong>After School:</strong> The next most common period for shootings, with 321 incidents, occurs after school hours. This suggests that after-school activities and times when students may be lingering on campus are significant risk periods.</li>
                    <li><strong>Class Change:</strong> The transition between classes is also a notable risk period, with 272 incidents. This could be due to the movement of students and less structured environments.</li>
                    <li><strong>Lunchtime:</strong> There are 280 incidents reported during lunch hours, which is a time when students are gathered in large numbers and supervision might be more challenging.</li>
                    <li><strong>Evening Events:</strong> Evening activities at the school account for 162 incidents, which may include sports events, meetings, or other school functions.</li>
                    <li><strong>During Class:</strong> Shootings that occur specifically during class sessions number at 150, underscoring the need for in-classroom security protocols.</li>
                    <li><strong>Night:</strong> The least number of incidents, 166, happen at night, suggesting that when the school is generally assumed to be empty or during night events, there is still a risk present.</li>
                    <li><strong>Before School:</strong> There are 153 incidents reported in the time before classes begin, indicating that early morning hours when students start arriving are also vulnerable.</li>
                    <li><strong>No School:</strong> Incidents occurring when school is not in session, such as during weekends or holidays, amount to 100, which reminds us that off-hours campus security is still important.</li>
                </ul>

                <p>Actionable Insights for Your School</p>
                <ul>
                    <li><strong>Enhanced Monitoring During High-Risk Times:</strong> Given that the morning classes and after-school periods are the highest risk times, your school may benefit from increased surveillance and staff presence during these windows.</li>
                    <li><strong>Structured Class Change Protocols:</strong> Implementing structured supervision during class changes can help mitigate the associated risks.</li>
                    <li><strong>Lunchtime Vigilance:</strong> Reinforcing lunchtime security measures, potentially with additional staff or monitored entry and exit points, could be beneficial.</li>
                    <li><strong>Evening Event Planning:</strong> For events held in the evening, consider specific security plans that include crowd control and exit strategies.</li>
                    <li><strong>Classroom Safety Measures:</strong> Regular drills and classroom-specific safety protocols could be critical during class sessions.</li>
                    <li><strong>After-Hours Security:</strong> Despite lower incident numbers at night and before school, maintaining security measures during these times is crucial.</li>
                    <li><strong>Off-Hours Campus Access:</strong> Limiting access to the school during non-school hours and securing the campus can help prevent incidents during these times.</li>
                </ul>
        </div>
    </div>
</div>
<div class="page-break"></div>
{{--  end of page 8iii contd --}}




{{--  page 8iv contd  --}}
<div class="page">
    <div class="row">
        <div class="col-lg-12" style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
            <h2 class="chart-title text-center">KEY FOCUS AREAS FOR K-12 SCHOOL SAFETY AND SECURITY: EXPANDING ACTIVE SHOOTER PREVENTION</h2>
            <div style="text-align: center; width: 100%;">
                <!-- The graph image is placed here -->
            </div>
            <p>This pie chart presents the distribution of shooting incidents by school level. For your school, the interpretation of this data would be as follows:</p>

            <ul>
                <li><strong>High School:</strong> Representing the highest proportion at 30%, it suggests that high schools are the most common settings for such incidents, indicating a need for robust safety protocols at this level.</li>
                <li><strong>College:</strong> With 25% of incidents, colleges also constitute a significant portion, emphasizing the need for advanced security measures in higher education institutions.</li>
                <li><strong>Middle School:</strong> Account for 20% of the incidents, suggesting that schools serving this age group should also be vigilant and proactive in their safety measures.</li>
                <li><strong>Elementary:</strong> Elementary schools, while less affected with 15%, still face considerable risk, highlighting the importance of age-appropriate security measures.</li>
                <li><strong>Other:</strong> 10% of incidents occur in settings categorized as 'Other,' which may include alternative or special education institutions, pointing towards the need for inclusive safety strategies that address diverse educational environments.</li>
            </ul>

            <p>Your school can use this information to benchmark and potentially enhance your current safety and preparedness initiatives in alignment with the trends indicated by the data.</p>

        </div>
    </div>
</div>
<div class="page-break"></div>
{{--  end of page 8iv contd --}}
























{{--  page 9  --}}

<div class="page">
    <div class="container my-4 scoring-section">
        <h2 class="text-center scoring-title">ENHANCING SCHOOL SAFETY: SCORING ACTIVE SHOOTER MEASURES</h2>
        <p class="scoring-text">
 A total overall assessment score is calculated for each facility postassessment. In addition, the SITE|SAFETYNET℠ App scores each of the Three (3) Levels from 0 and 100 in the Top Priorities Chart, with 100 representing a school with ideal security. The
scores are calculated using our analytic t e a m’ s assessment test, a well-established decision support method. In general, a grade
of 90-100 represents a facility that offers optimal security, a grade of 80-89 represents a facility that meets most security standards, a
grade of 60-79 represents a facility that is lacking in significant areas of security, and a grade of < 60 represents a facility that is in
serious need of critical security updates. The scoring methodology allows for effectively comparing all types of schools on the same
scale to provide a school district with an overall picture of its portfolio’s needs. Even though there are different types of
schools and supporting facilities, all facilities are graded on a similar set of factors and performance ratings using each school
demography. In addition to a total overall score, facilities receive a subtotal score in each of the three (3) Levels. This enables comparisons between school facilities in these areas to determine consistency or priority throughout the district.

        </p>
    </div>

</div>
<div class="page-break"></div>
{{--  end of page 9  --}}






{{--  page 10  --}}

<div class="page">
    <div class="container my-4">
        <div class="complete-recommendations-section">
            <h2 class="text-center title">COMPLETE SCHOOL RECOMMENDATIONS WILL APPEAR - HERE</h2>
            <p class="intro-text">Based on our survey and score, we have outlined the following steps that should be taken to increase students’ safety.</p>

            <div class="score-section">
                <p class="score-range">90 – 100%</p>
                <p class="action-required">Refer to Recommendations Manual</p>

                <p class="score-range">80 – 89%</p>
                <p class="action-required">Refer to Recommendations Manual</p>

                <p class="score-range">60 – 79%</p>
                <p class="action-required">Refer to Recommendations Manual</p>

                <p class="score-range less-than-sixty"> <60%</p>
            </div>

            <p class="report-credit">REPORT Provided by Protecting Our Students, Inc. Analytics Team.</p>
        </div>
    </div>

</div>
<div class="page-break"></div>
{{--  end of page 10  --}}




{{--  page 11  --}}

<div class="page">
    <div class="container my-4">
        <div class="about-section">
            <h2 class="about-title">ABOUT PROTECTING OUR STUDENTS</h2>
            <p class="about-text">Protecting Our Students, Inc. is a School Gun Safety Partner Coalition. Our mission is straightforward: To help reduce and end K-12 school shootings. Getting there takes work, but we're dedicated to implementing our d i g i t a l SITE|SAFETYNET℠ mobile "Risk Assessment" app in every school nationwide. We build partnerships with educational institutions, public and private consultants, including Certified School Safety Professionals, School Security & Crises Preparedness Specialist, Law Enforcement, and Government Agencies.</p>
            <p class="contact-info">(888) 500-3393<br>
                info@protectingourstudents.org<br>
                <a href="https://www.protectingourstudents.org/" class="website-link">www.protectingourstudents.org</a>
            </p>
        </div>
    </div>

</div>
{{--  end of page 11  --}}

<!-- Include Bootstrap JS and its dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
