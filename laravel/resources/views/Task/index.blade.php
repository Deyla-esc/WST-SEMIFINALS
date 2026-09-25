<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        .btn { padding: 6px 12px; text-decoration: none; color: white; border-radius: 4px; border: none; cursor: pointer; }
        .btn-add { background-color: #28a745; display: inline-block; margin-bottom: 15px; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; }
        .btn-status { background-color: #17a2b8; }
        .alert { padding: 10px; background-color: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 15px; }
        .badge-pending { background-color: #ffc107; padding: 4px 8px; border-radius: 4px; font-size: 12px; }
        .badge-completed { background-color: #28a745; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Personal Task Manager</h1>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <a href="{{ route('tasks.create') }}" class="btn btn-add">+ Add New Task</a>

        <table>
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td><strong>{{ $task->task_name }}</strong></td>
                        <td>{{ $task->description ?? 'N/A' }}</td>
                        <td>{{ $task->due_date ?? 'No deadline' }}</td>
                        <td>
                            <span class="{{ $task->status === 'Pending' ? 'badge-pending' : 'badge-completed' }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td style="display: flex; gap: 5px;">
                            <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-status">Toggle Status</button>
                            </form>

                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-edit">Edit</a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">No tasks found. Add one above!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>