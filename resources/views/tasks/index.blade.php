<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Minha Lista de Tarefas</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 40px 16px;
            color: #1e293b;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 8px 25px #0000000d;
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 14px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font: inherit;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 10px 14px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .add {
            background: #2563eb;
            color: white;
        }

        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 0;
        }

        .task-info {
            overflow-wrap: anywhere;
        }

        .completed {
            text-decoration: line-through;
            color: #64748b;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .toggle {
            background: #dcfce7;
            color: #166534;
        }

        .delete {
            background: #fee2e2;
            color: #991b1b;
        }

        .success {
            background: #dcfce7;
            padding: 12px;
            border-radius: 7px;
        }

        .error {
            color: #b91c1c;
            font-size: 14px;
        }

        @media (max-width: 520px) {
            .task {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Minha lista de tarefas</h1>
    <p>Organize suas atividades do dia.</p>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <input
                type="text"
                name="title"
                placeholder="Nome da tarefa"
                value="{{ old('title') }}"
                required
            >

            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <textarea
                name="description"
                placeholder="Descrição (opcional)"
                rows="3"
            >{{ old('description') }}</textarea>

            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="add">
            + Adicionar tarefa
        </button>
    </form>

    <hr>

    <h2>Minhas tarefas ({{ $tasks->count() }})</h2>

    @forelse ($tasks as $task)
        <div class="task">
            <div class="task-info">
                <strong class="{{ $task->completed ? 'completed' : '' }}">
                    {{ $task->title }}
                </strong>

                @if ($task->description)
                    <p>{{ $task->description }}</p>
                @endif

                <small>
                    {{ $task->completed ? 'Concluída' : 'Pendente' }}
                </small>
            </div>

            <div class="actions">
                <form
                    action="{{ route('tasks.toggle', $task) }}"
                    method="POST"
                >
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="toggle">
                        {{ $task->completed ? 'Reabrir' : 'Concluir' }}
                    </button>
                </form>

                <form
                    action="{{ route('tasks.destroy', $task) }}"
                    method="POST"
                    onsubmit="return confirm('Deseja excluir esta tarefa?')"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p>Nenhuma tarefa cadastrada. Comece adicionando uma!</p>
    @endforelse
</div>

</body>
</html>
