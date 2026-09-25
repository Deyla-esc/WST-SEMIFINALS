<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea, select { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Task</h2>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Task Name*</label>
                <input type="text" name="task_name" value="{{ $task->task_name }}" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3">{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Due Date</label>
                <input type="date" name="due_date" value="{{ $task->due_date }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <button type="submit" class="btn">Update Task</button>
            <a href="{{ route('tasks.index') }}" style="margin-left: 10px;">Cancel</a>
        </form>
    </div>
</body>
</html>