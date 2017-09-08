<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">
        <title>TodoApp</title>
    </head>
    <body>
        <section class="task_lists">
            <p class="task_list_headings">To Do List:</p>
                @foreach ($tasks as $task)
                    @if(!$task['done'] == 1)
                        @include('taskpartial')
                    @endif
                @endforeach
        </section>
        <section class="task_lists">
            <p class="task_list_headings">Completed Tasks:</p>
                @foreach ($tasks as $task)
                    @if($task['done'] == 1)
                        @include('taskpartial')
                    @endif
                @endforeach
                <form action="/" class="delete_allcompleted" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="control_buttons">Delete all completed tasks</button>
                </form>
        </section>
        <section class="task_lists">
            <p class="task_list_headings">Add a New Task:</p>
            <form action="/task" class="submit_newtask" method="POST">
                {{ csrf_field() }}
                <input type="text" name="name" id="task-name" class="task_input">
                <button class="control_buttons" type="submit">Add Task</button>
            </form>
        </section>
    </body>
</html>