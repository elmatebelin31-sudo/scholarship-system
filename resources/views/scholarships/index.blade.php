<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Add Scholarship - Scholarship Management System</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    :root{
      --accent:#111;
      --muted:#6b7280;
      --bg:#f7f7f8;
      --card:#ffffff;
      --accent-2:#e11d48;
      --max-width:980px;
      --radius:12px;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    body{
      margin:0;
      background:var(--bg);
      color:var(--accent);
      line-height:1.45;
    }
    .container{
      max-width:var(--max-width);
      margin:0 auto;
      padding:28px;
    }

    h2{
      text-align:center;
      margin-bottom:24px;
      font-size:24px;
      color:var(--accent-2);
    }

    .card{
      background:var(--card);
      border-radius:var(--radius);
      padding:28px;
      box-shadow:0 6px 18px rgba(12,13,14,0.06);
      margin-top:20px;
    }

    label{
      display:block;
      font-size:13px;
      color:var(--muted);
      margin-bottom:6px;
      margin-left: 10px;
    }

    input[type="text"], input[type="number"], textarea{
      width:97%;
      padding:10px 12px;
      border-radius:8px;
      border:1px solid #e6e6e6;
      font-size:14px;
      background:transparent;
      margin-bottom:15px;
    }

    textarea{resize:vertical;}

    .form-actions{
      display:flex;
      gap:10px;
      justify-content:flex-end;
      margin-top:12px;
    }

    .btn-primary{
      background:rgb(119,20,20);
      color:#fff;
      border-radius:12px;
      padding:10px 14px;
      border:none;
      cursor:pointer;
    }
    .btn-primary:hover{
      background-color:#a12727;
    }

    .btn-outline{
      background:#f5b700;
      color:#000;
      border-radius:10px;
      padding:10px 14px;
      border:none;
      cursor:pointer;
    }
    .btn-outline:hover{
      background-color:#f4c537;
      color:#111;
    }

    .success{
      background:#ecfdf5;
      color:#065f46;
      padding:12px;
      border-radius:8px;
      margin-bottom:15px;
    }

    .errors{
      background:#fef2f2;
      color:#991b1b;
      padding:12px;
      border-radius:8px;
      margin-bottom:15px;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h2>Add New Scholarship</h2>

      {{-- SUCCESS MESSAGE --}}
      @if (session('success'))
          <div class="success">{{ session('success') }}</div>
      @endif

      {{-- ERROR MESSAGES --}}
      @if ($errors->any())
          <div class="errors">
              <ul style="margin:0; padding-left:18px;">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="{{ route('scholarships.store') }}" method="POST">
        @csrf
        <label for="title">Scholarship Title</label>
        <input type="text" name="title" value="{{ old('title') }}" required>

        <label for="description">Description</label>
        <textarea name="description" rows="4" required>{{ old('description') }}</textarea>

        <label for="amount">Amount (PHP)</label>
        <input type="number" name="amount" step="0.01" value="{{ old('amount') }}" required>

        <div class="form-actions">
          <button type="submit" class="btn-primary">Add Scholarship</button>
          <button type="reset" class="btn-outline">Reset</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
