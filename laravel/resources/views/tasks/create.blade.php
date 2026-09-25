<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task - Personal Task Manager</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #fdfbf2;
            font-family: 'Georgia', 'Times New Roman', serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-card {
            background-color: #94c973;
            border-radius: 16px;
            width: 100%;
            max-width: 580px;
            padding: 35px 45px;
            box-shadow: 0 8px 25px rgba(148, 201, 115, 0.3);
            color: #ffffff;
        }

        .back-link {
            display: inline-block;
            color: #000000;
            text-decoration: none;
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 25px;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 20px;
            margin-bottom: 8px;
            color: #ffffff;
        }

        .form-control {
            width: 100%;
            background-color: #ffffff;
            border: 1px solid #94c973;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 16px;
            font-family: sans-serif;
            color: #333333;
            outline: none;
        }

        .form-control:focus {
            border-color: #588b35;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.4);
        }

        textarea.form-control {
            resize: vertical;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%202d4263' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 18px;
            cursor: pointer;
        }

        .submit-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn-submit {
            background-color: #ffffff;
            color: #1a1a1a;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 16px;
            font-family: 'Georgia', serif;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #f4f7ff;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

<div class="form-card">
    <a href="{{ route('tasks.index') }}" class="back-link">&#10094; Back</a>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="task_name">Task Name:</label>
            <input type="text" id="task_name" name="task_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" rows="2"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date:</label>
            <input type="date" id="due_date" name="due_date" class="form-control">
        </div>

        <div class="submit-container">
            <button type="submit" class="btn-submit">+ Add task</button>
        </div>
    </form>
</div>

</body>
</html>