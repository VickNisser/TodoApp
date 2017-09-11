<section class="task_display">
    <div>{{ $task->name }}</div>
    <div>Priority Level{{ $task->priority }}</div>
    <p>Options:</p>
    <section class="button_holder">
        <form action="/task/{{$task->id}}/{{$task->done}}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <button class="control_buttons">Complete/Uncomplete</button>
        </form>
        <form action="/task/{{$task->id}}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button class="control_buttons">Delete Task</button>
        </form>
        <form action="/task/{{$task->id}}/{{$task->priority}}" method="POST">
            {{ method_field('PATCH')}}
            {{ csrf_field() }}
            <button class="control_buttons">Raise Priority</button>
        </form>
    </section>
    <div>Created at: {{ $task->created_at }}</div>
</section>