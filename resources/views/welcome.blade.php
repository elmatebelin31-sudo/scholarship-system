<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Scholarship Management System</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    /* Simple, clean, minimalist CSS */
    :root{
      --accent:#111;
      --muted:#6b7280;
      --bg:#dfdfe1;
      --card:#ffffff;
      --accent-2:#e11d48;
      --max-width:980px;
      --radius:12px;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    html,body{height:100% auto;}
    body{
      margin:0;
      background:linear-gradient(180deg, #fff 0%, var(--bg) 100%);
      color:var(--accent);
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      line-height:1.45;
    }
    .container{
      max-width:var(--max-width);
      margin:0 auto;
      padding:28px;
    }

    header{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:16px;
      padding:12px 0;
    }

    /* Logo */
    .logo{
      display:flex;
      align-items:center;
      gap:10px;
      text-decoration:none;
      color:inherit;
    }
    .logo svg{width:44px;height:44px;display:block;}
    .brand{
      font-weight:700;
      font-size:18px;
      letter-spacing:0.2px;
    }
    nav{display:flex; gap:12px; align-items:center;}
    .nav-links a{
      text-decoration:none;
      color:var(--muted);
      padding:8px 10px;
      border-radius:8px;
      font-size:15px;
      font-weight: bold;
    }
    .nav-links a:hover{
      color:#7c1c1c; 
      background:rgba(0,0,0,0.02);
    }

    .cta{
      display:flex; gap:8px;
      align-items:center;
    }
    .btn{
      appearance:none;
      border:1px solid transparent;
      padding:8px 12px;
      border-radius:10px;
      cursor:pointer;
      font-weight:600;
      font-size:14px;
      background:var(--card);
    }
    .btn:hover{
        color: white;
    }
    .btn-outline{
      background:#f5b700;
      border:1px solid #e6e6e6;
      color:var(--accent);
      text-decoration: none;
    }
    .btn-outline:hover{
        background-color:#f4c537;
        color: white;
    }
    .btn-primary{
      background:rgb(119, 20, 20);
      color:#fff;
      border-radius:12px;
      padding:10px 14px;
      text-decoration: none;
      border: none;
    }
    .btn-primary:hover{
    background-color: #a12727;
    }

    /* HERO */
    .hero{
      display:grid;
      grid-template-columns:1fr;
      gap:25px;
      align-items:center;
      margin-top:28px;
    }
    .hero-card{
      background:var(--card);
      border-radius:var(--radius);
      padding:28px;
      box-shadow:0 6px 18px rgba(12,13,14,0.06);
    }
    h1{font-size:28px;margin:0 0 8px 100px;}
    p.lead{color:var(--muted);margin:50px 0 18px 100px;font-size:16px;}

    .see-btn{
      display:inline-block;
      margin-top:12px;
      text-decoration:none;
      font-weight:700;
      padding:10px 14px;
      border-radius:10px;
      border:1px solid rgba(0,0,0,0.06);
      background:#fff;
    }
    .see-btn:hover{
        background-color: #064e3b;
        color: white;
    }

    /* Info section */
    .info{
      margin-top:18px;
      color:var(--muted);
      font-size:15px;
      line-height:1.6;
    }

    section{
      margin-top:34px;
    }
    .grid-2{display:grid; grid-template-columns:1fr 1fr; gap:20px;}
    .card{background:var(--card); border-radius:12px; padding:20px; box-shadow:0 6px 18px rgba(12,13,14,0.04);}

    /* Form */
    form .row{
    display:flex; 
    gap:12px;
   }
    label{
      display:block;
      font-size:13px;
      color:var(--muted);
      margin-bottom:6px;
      margin-left: 10px;
    }
    input[type="text"], input[type="email"],input[type="number"], input[type="date"], input[type="password"], select, textarea{
      width:97%;
      padding:10px 12px;
      border-radius:8px;
      border:1px solid #e6e6e6;
      font-size:14px;
      background:transparent;
      text-transform: capitalize;
    }
    .form-actions{
      display:flex; 
      gap:10px; 
      justify-content:flex-end; 
      margin-top:12px;
    }
    .small{
      font-size:13px;
      color:var(--muted);
    }
    .print-modal{
    position:fixed;
    inset:0;
    display:none;
    align-items:center;
    justify-content:center;
    background:rgba(0,0,0,0.45);
    z-index:9999;
}

.print-modal.open{
    display:flex;
}

.print-sheet{
    width:850px;
    max-width:95%;
    background:#fff;
    padding:30px 40px;
    border-radius:12px;
    box-shadow:0 20px 60px rgba(0,0,0,0.4);
    font-family: 'Inter', sans-serif;
    font-size:14px;
    color:#111;
}

.print-sheet h2{
    margin:0;
    font-size:20px;
}

.print-sheet h3{
    font-size:16px;
    margin-bottom:8px;
    border-bottom:1px solid #ccc;
    padding-bottom:4px;
}

.form-section{
    margin-bottom:20px;
}

.form-table{
    width:100%;
    border-collapse:collapse;
}

.form-table td{
    padding:6px 10px;
    vertical-align: top;
}
.form-table td:first-child{
    width:150px;
    font-weight:600;
}


    /* responsive */
    @media (max-width:900px){
      .hero{grid-template-columns:1fr;}
      .grid-2{grid-template-columns:1fr;}
      header{
        flex-direction:column; 
        align-items:flex-start; 
        gap:12px;
      }
    }

    /* Print styles - only when user prints the modal content */
    @media print {
      body *{
        visibility:hidden;
      }
      .print-sheet, .print-sheet *{
        visibility:visible;
      }
      .print-sheet{
        position:fixed; 
        left:0; 
        top:0; 
        width:100%; 
        box-shadow:none; 
        border-radius:0; 
        padding:12mm;
      }
    }
    .print{
      color:white;
      width: 80px;
      height: 30px;
      border-radius: 5px;
      letter-spacing: 2px;
      margin-right: 10px;
      background:#7c1c1c;
      border:none;
    }
    .print:hover{
    background-color: #a12727;
    }
    .apply{
      color:#000;
      width: 80px;
      height: 30px;
      border-radius: 5px;
      letter-spacing: 2px;
      background:#f5b700;
      margin-right: 25px;
      border: none;
    }
    .apply:hover{
        background-color:#f4c537;
    }
  </style>
</head>
<body>
  
{{-- Notification container --}}
<div id="notifications" style="position: fixed; top: 20px; right: 20px; z-index: 9999; margin-top:665px; margin-right:-15px;"></div>
  <div class="container">
    <header>
      <a href="#home" class="logo" onclick="scrollToAnchor('#home')">
        <!-- Minimalist logo: circle + S monogram -->
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
          <defs>
            <linearGradient id="g" x1="0" x2="1">
              <stop offset="0" stop-color="#e11d48"/>
              <stop offset="1" stop-color="#8b5cf6"/>
            </linearGradient>
          </defs>
          <rect width="100" height="100" rx="22" fill="#111" />
          <path d="M30 36c6-6 24-6 24 6 0 8-12 12-18 16-7 4-10 12-6 18" fill="none" stroke="url(#g)" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div>
          <div class="brand">Scholarship Management System</div>
          <div style="font-size:12px;color:var(--muted)">Care • Support • Learn</div>
        </div>
      </a>

      <nav>
        <div class="nav-links">
          <a href="#container" onclick="scrollToAnchor('#apply')">Apply</a>
          <a href="#benefits" onclick="scrollToAnchor('#benefits')">Benefits</a>
          <a href="#requirements" onclick="scrollToAnchor('#requirements')">Requirements</a>
          <a href="#eligibility" onclick="scrollToAnchor('#eligibility')">Eligibility</a>
        </div>

        <div class="cta">
          <a class="btn btn-outline" href="{{ route('student.login') }}"   style="font-size: 14px;">Student Login</a>
          <a class="btn btn-primary" href="{{ route('student.register') }}"   style="font-size: 12px;">Student Sign Up</a>
        </div>
      </nav>
    </header>
    

    <main id="home">
      <div class="hero">
        <div class="hero-card">
          <h1>Empowering Students<br/><span style="color:#0c3b5c">One Scholarship</span><br/> At a time</h1>
          <p class="lead">Access scholarships designed to support your education and future.
 </br> Discover available opportunities!</p> 
          

          <div class="info" style="margin-top:50px; margin-left:30px;">
            <strong>Scholarship Management System</strong> has helped thousands of students pursue their college education by providing scholarships to eligible applicants. We believe that education empowers you to achieve a brighter future and contribute positively to society.
            <br/><br/>
            Tertiary education can be expensive, but with our scholarships, you can focus on your studies without financial worries.
          </div>
        </div>

        <div style="display:flex;flex-direction:column;gap:12px;">

          <div class="card small">
            <strong style="margin-left:450px;">Contact</strong>
            <p class="small" style="margin-top:8px; margin-left:400px;">Need help applying? Email: <br/><a href="mailto:scholarship@example.com">scholarship@example.com</a></p>
          </div>
              @if(auth()->check() && auth()->user()->is_admin)
<section id="admin-actions" class="card" style="margin-top:20px; text-align:center;">
  <h2 style="margin-top: 0;">Admin Actions</h2>
  <div style="display:flex; justify-content:center; gap:25px; flex-wrap:wrap; margin-top:15px;">
    <a class="btn btn-outline" href="/scholarships">Add Scholarship</a>
    <a class="btn btn-outline" href="{{ route('admin.create') }}">Add Admin</a>
    <a class="btn btn-outline" href="{{ route('admin.login') }}">Admin Login</a>
    <a class="btn btn-outline" href="{{ route('admin.applications') }}">View Applications</a>
  </div>
</section>
@endif
        </div>
      </div>
      

      <!-- ELIGIBILITY -->
      <section id="eligibility" class="card" style="margin-top:28px;">
        <h2 style="margin-left:50px;">Eligibility</h2>
        <p class="small" style="margin-left: 100px;">To apply for the scholarship program you need to follow the general eligibility criteria:</p>
        <ul style="margin-left: 100px;">
          <li>The applicant must be a Filipino citizen</li>
          <li>Must not be expelled from any Higher Education Institutions</li>
          <li>Must be enrolled in any SUCs or Private Colleges</li>
          <li>Must maintain good academic standing</li>
          <li>Must have a high school education or equivalent qualification</li>
        </ul>

        <h3 style="margin-top:12px; margin-left:50px;">Documentary Requirements</h3>
        <p class="small" style="margin-left: 100px;">To apply for the scholarship you must submit the following documents:</p>
        <ul style="margin-left: 100px;">
          <li>Certificate of Registration or Enrollment</li>
          <li>Certificate of Indigency</li>
          <li>Income Tax return or Proof of Household Income</li>
          <li>Certificate of Residency (For private no SUC/LUC category)</li>
          <li>PWD ID - if applicable</li>
          <li>Assessment of Fees</li>
        </ul>
      </section>

      <!-- BENEFITS -->
      <section id="benefits" class="card" style="margin-top:18px; text-align:center;">
        <h2 style="margin-left: 50px;">Benefits</h2>

        <div class="grid-2" style="margin-top:12px;">
          <div class="card" style="margin-left: 50px;">
            <strong>For SUCs and LUCs</strong>
            <p class="small" style="margin-top:8px;">Php 20,000 Per Semester<br/>Php 40,000 Per Academic Year</p>
          </div>
          <div class="card" style="width:380px;">
            <strong>For Private HEIs</strong>
            <p class="small" style="margin-top:8px;">Php 30,000 Per Semester<br/>Php 60,000 Per Academic Year</p>
          </div>
        </div>

        <div style="margin-top:14px; margin-left:250px; width:300px;" class="card">
          <strong>Additional Benefits for PWD students</strong>
          <p class="small" style="margin-top:8px;">Php 5,000 Per Semester<br/>Php 10,000 Per Academic Year</p>
        </div>
      </section>

      <!-- REQUIREMENTS (duplicate anchor) -->
      <section id="requirements" class="card" style="margin-top:18px;">
        <h2 style="margin-left: 50px;">Requirements</h2>
        <p class="small"style="margin-left:100px;">Please prepare the following documents before applying:</p>
        <ul style="margin-left: 100px;">
          <li>Certificate of Registration/Enrollment</li>
          <li>Certificate of Indigency</li>
          <li>Proof of Income/ITR</li>
          <li>Certificate of Residency (if applicable)</li>
          <li>Disability(if applicable)</li>
          <li>Student ID</li>
        </ul>
      </section>

     <div class="container" id="container" style="background:#fff; width:auto; height:auto; border-radius:12px; box-shadow:0 6px 18px rgba(12,13,14,0.04); margin-top:20px;">
      <label style="text-align: center;" disabled>Filling out this form allows you to apply for scholarship and it automatically creates your login using your email and preferred password.</label>
      <li style="margin-left:30px;">Please upload maximum of 2mb file size of your profile picture.</li>
      <li style="margin-left:30px;">Phone number is limited to minimum of 11 digits only.</li>
      <li style="margin-left:30px;">Put N/A if you don't have disability.</li>
      <h2 style="margin-left: 30%;">Scholarship Application Form</h2>

<form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" id="applicationForm">
@csrf


<div class="form-row" style="display:flex; gap:15px;">
<div class="form-group" style="flex:1;">
<label for="first_name">First Name</label>
<input type="text" name="first_name" style="width: 90%;" required>
</div>
<div class="form-group" style="flex:1;">
<label for="middle_name">Middle Name</label>
<input type="text" name="middle_name" style="width: 90%;">
</div>
<div class="form-group" style="flex:1;">
<label for="last_name">Last Name</label>
<input type="text" name="last_name" style="width: 90%;" required>
</div>
</div>

<div class="form-group" style="flex:1;">
  <label for="dob">Date of Birth</label>
  <input type="date" name="dob" style="width: 97%; color:grey; text-transform: Uppercase;">
</div>


<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" style="text-transform: none;" required>
</div>


<div class="form-group">
<label for="phone">Phone Number</label>
<input type="number" name="phone" required>
</div>


<div class="form-group">
<label for="address">Address</label>
<textarea name="address" rows="3" style="text-transform: capitalize;" required></textarea>
</div>


<div class="form-group">
  <label for="school">School Type</label>
  <select name="school" id="school" style="width: 100%; color:grey;" required>
    <option value="">Select your school type</option>
    <option value="SUC / LUC">SUC / LUC</option>
    <option value="Private HEI">Private HEI</option>
  </select>
</div>



<div class="form-group">
  <label for="course" style="margin-top:10px;">Course</label>
  <select name="course" id="course" style="width: 100%; color:grey; margin-top:5px;" required>
    <option value="">Select course</option>
    <option value="BSCS">BSCS</option>
    <option value="BSIS">BSIS</option>
    <option value="BSIT">BSIT</option>
  </select>
</div>


<div class="form-group">
<label for="disability" style="margin-top: 10px;">Disability (if applicable)</label>
<input type="text" name="disability" placeholder="N/A">
</div>

<div class="form-group">
<label for="password" style="margin-top: 10px;">Password</label>
<input type="password" name="password" placeholder="Password">
</div>

<div class="form-group">
<label for="password" style="margin-top: 10px;">Password</label>
<input type="password" name="password_confirmation" placeholder="Confirm Password" required>
</div>

<div class="form-group">
<label for="profile_picture" style="margin-left: 10px; margin-top:20px;">Upload Profile Picture</label>
<input type="file" name="profile_picture" accept="image/*" style="margin-left:10px;" required>
</div>


<div style="display:flex; gap:10px; justify-content:flex-end; margin-top:25px;">
<button type="button" class="print" onclick="printForm()">Print</button>
<button type="submit" class="apply" onclick="submit()">Submit</button>
</div>
</form>







<div id="printArea" style="display:none; background:#fff; padding:20px;"></div>
</div>
</div>
      </section>

      <!-- Print modal -->
<div id="printModal" class="print-modal" role="dialog" aria-hidden="true">
    <div class="print-sheet" id="printSheet">
        <!-- Header -->
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:60px; height:60px;">
            </div>
            <div style="text-align:center;">
                <h2 style="margin:0;">Scholarship Management System</h2>
                <div class="small">Care • Support • Learn</div>
            </div>
            <div style="text-align:right;">
                <div class="small">Date: <span id="printDate"></span></div>
            </div>
        </div>

        <!-- Applicant Profile Picture -->
        <div style="text-align:center; margin-bottom:20px;">
            <img id="p_profile_picture" src="" alt="Profile Picture" style="width:120px; height:120px; border-radius:50%; object-fit:cover; border:2px solid #333;">
        </div>

        <!-- Applicant Details -->
        <div class="form-section">
            <h3>Personal Information</h3>
            <table class="form-table">
                <tr>
                    <td><strong>Full Name:</strong></td>
                    <td><span id="p_name"></span></td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td><span id="p_email"></span></td>
                </tr>
                <tr>
                    <td><strong>Phone:</strong></td>
                    <td><span id="p_phone"></span></td>
                </tr>
                <tr>
                    <td><strong>Address:</strong></td>
                    <td><span id="p_address"></span></td>
                </tr>
            </table>
        </div>

        <div class="form-section">
    <h3>Education</h3>
    <table class="form-table">
        <tr>
            <td><strong>School Type:</strong></td>
            <td><span id="p_school"></span></td>
        </tr>
        <tr>
            <td><strong>Course / Program:</strong></td>
            <td><span id="p_program"></span></td>
        </tr>
        <tr>
            <td><strong>Disability:</strong></td>
            <td><span id="p_pwd"></span></td>
        </tr>
    </table>
</div>

<!-- Buttons inside modal -->
<div style="display:flex; gap:10px; justify-content:flex-end; margin-top:25px;">
    <button class="btn btn-primary" onclick="window.print()">Print</button>
    <button class="btn btn-outline" onclick="closePrintablePreview()">Close</button>
</div>

    </main>

    <footer style="margin-top:34px; text-align:center; color:var(--muted); font-size:13px;">
      © {{ date('Y') }} Scholarship Management System — your Study Buddy.
    </footer>
  </div>

 <script>

// File size validation
const fileInput = document.querySelector('input[name="profile_picture"]');
fileInput.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    const maxSize = 2 * 1024 * 1024; // 2MB
    if (file.size > maxSize) {
        alert('File too large! Please upload an image smaller than 2MB.');
        this.value = '';
    }
});

// Phone validation + confirmation
document.getElementById('applicationForm').addEventListener('submit', function (e) {
    const phoneInput = document.querySelector('input[name="phone"]');
    const phone = phoneInput.value.replace(/\D/g, '');

    if (phone.length < 11) {
        e.preventDefault();
        alert('Mobile number must be at least 11 digits.');
        phoneInput.focus();
        return false;
    }

    if (!confirm('Are you sure you want to submit your application?')) {
        e.preventDefault();
        return false;
    }
});

document.getElementById('applicationForm').addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        const inputs = Array.from(this.querySelectorAll('input, select, textarea'));
        const index = inputs.indexOf(e.target);
        if (index > -1 && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }
    }
});

  const errors = @json($errors->all());

    document.addEventListener('DOMContentLoaded', function () {
    const box = document.getElementById('error-box');
    if (!box) return;

    const messages = Array.from(box.querySelectorAll('li'));
    let index = 0;
    const duration = 3000; // 3 seconds per error

    function showNextError() {
        if (index >= messages.length) {
            box.style.display = 'none';
            return;
        }

        // Show current message only
        messages.forEach((msg, i) => msg.style.display = i === index ? 'block' : 'none');

        // Reset position & opacity
        box.style.transition = 'none';
        box.style.opacity = 0;
        box.style.transform = 'translateY(0)';
        box.style.display = 'block';

        // Fade in
        setTimeout(() => {
            box.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            box.style.opacity = 1;
        }, 50);

        // Fade out + slide up
        setTimeout(() => {
            box.style.opacity = 0;
            box.style.transform = 'translateY(-20px)'; // moves up 20px
        }, duration - 500);

        index++;
        setTimeout(showNextError, duration);
    }

    showNextError();
});

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('notifications');
    if (!container) return;

    // Collect messages from Laravel session
    const messages = [];

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            messages.push({type: 'error', text: "{{ $error }}"}); 
        @endforeach
    @endif

    @if (session('success'))
        messages.push({type: 'success', text: "{{ session('success') }}"});
    @endif

    // Display messages one by one
    messages.forEach((msg, index) => {
        setTimeout(() => {
            const box = document.createElement('div');
            box.innerText = msg.text;
            box.style.padding = '12px 20px';
            box.style.borderRadius = '8px';
            box.style.marginTop = '10px';
            box.style.minWidth = '250px';
            box.style.color = '#fff';
            box.style.fontWeight = '600';
            box.style.boxShadow = '0 4px 10px rgba(0,0,0,0.1)';
            box.style.opacity = 0;
            box.style.transition = 'opacity 0.5s, transform 0.5s';

            // Background based on type
            if (msg.type === 'success') box.style.background = '#065f46';
            if (msg.type === 'error') box.style.background = '#991b1b';

            container.appendChild(box);

            // Fade in & slide up
            setTimeout(() => {
                box.style.opacity = 1;
                box.style.transform = 'translateY(-10px)';
            }, 50);

            // Fade out after 3 seconds
            setTimeout(() => {
                box.style.opacity = 0;
                box.style.transform = 'translateY(-30px)';
                setTimeout(() => box.remove(), 500);
            }, 3000);

        }, index * 800); // stagger each message by 0.8s
    });
});

function printForm() {
    const f = document.getElementById('applicationForm');

    document.getElementById('p_name').innerText = f.first_name.value + " " + f.middle_name.value + " " + f.last_name.value;
    document.getElementById('p_email').innerText = f.email.value;
    document.getElementById('p_phone').innerText = f.phone.value;
    document.getElementById('p_address').innerText = f.address.value;
    document.getElementById('p_school').innerText = f.school.value;
    document.getElementById('p_program').innerText = f.course.value;
    document.getElementById('p_pwd').innerText = f.disability.value;

    // Show profile picture
    const fileInput = f.profile_picture;
    const img = document.getElementById('p_profile_picture');
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
        }
        reader.readAsDataURL(fileInput.files[0]);
    } else {
        img.src = ''; // clear if no file
    }

    // Show modal
    const modal = document.getElementById('printModal');
    modal.classList.add('open');

    // Set current date
    document.getElementById('printDate').innerText = new Date().toLocaleDateString();
}

function closePrintablePreview() {
    const modal = document.getElementById('printModal');
    modal.classList.remove('open');
}


</script>

</body>
</html>
