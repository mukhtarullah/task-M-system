<!DOCTYPE html>
<html>
<head>
<title>Create Task</title>
<link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" rows="5" name="description">{{ $task->description }}</textarea>
                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                <label for="status">Status</label>
                <select class="form-select form-select-lg mb-3" name="status" aria-label="Default select example" id="status">
                    <option selected>{{ $task->status }}</option>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    
                </select>
                    
                </div>
                <button type="submit" class="btn-info">Submit</button>
            </form>
        </div>
        
    </div>
</div>

</body>
</html>